<?php

namespace App\Overrides\larecipe;

use BinaryTorch\LaRecipe\Cache;
use Illuminate\Filesystem\Filesystem;
use BinaryTorch\LaRecipe\Traits\Indexable;
use BinaryTorch\LaRecipe\Traits\HasBladeParser;
use BinaryTorch\LaRecipe\Traits\HasMarkdownParser;
use Illuminate\Support\Facades\Auth;

class Documentation
{
    use HasMarkdownParser, HasBladeParser, Indexable;

    /**
     * The filesystem implementation.
     *
     * @var Filesystem
     */
    protected $files;

    /**
     * The cache implementation.
     *
     * @var Cache
     */
    protected $cache;

    /**
     * Create a new documentation instance.
     *
     * @param Filesystem $files
     * @param Cache $cache
     */
    public function __construct(Filesystem $files, Cache $cache)
    {
        $this->files = $files;
        $this->cache = $cache;
    }

    /**
     * Get the documentation index page.
     *
     * @param  string  $version
     * @return string
     */
    public function getIndex($version)
    {
        return $this->cache->remember(function() use($version) {
            /*if(Auth::guest()){
                $path = base_path(config('larecipe.docs.path').'/'.$version.'/guest/index.md');
            }elseif(auth()->user()->can('adminFullApp')){
                $path = base_path(config('larecipe.docs.path').'/'.$version.'/super-admin/index.md');
            }else*/
                //$path = base_path(config('larecipe.docs.path').'/'.$version.'/index.md');
            $path = $this->getRoleBasedPath('index', $version);

            if ($this->files->exists($path)) {
                //Inverte a ordem de fazer as coisas para correr o blade inicialmente e depois tratar só os links finais
                $parsedContent =$this->files->get($path);
                $parsedContent = str_replace("{{route}}", "!!route!!", $parsedContent);
                $parsedContent = str_replace("{{version}}", "!!version!!", $parsedContent);
                $parsedContent = $this->renderBlade($parsedContent);
                $parsedContent = str_replace("!!route!!", "{{route}}", $parsedContent);
                $parsedContent = str_replace("!!version!!", "{{version}}", $parsedContent);
                $parsedContent = $this->parse($parsedContent);

                $parsedContent = $this->replaceLinks($version, $parsedContent);
                return $parsedContent;

                //dd($parsedContent, $this->renderBlade($parsedContent));
                //return $this->renderBlade($parsedContent);
            }

            return null;
        }, 'larecipe.docs.'.$version.'.index');
    }

    /**
     * Get the given documentation page.
     *
     * @param $version
     * @param $page
     * @param array $data
     * @return mixed
     */
    public function get($version, $page, $data = [])
    {
        return $this->cache->remember(function() use($version, $page, $data) {
            //$path = base_path(config('larecipe.docs.path').'/'.$version.'/'.$page.'.md');
            $path = $this->getRoleBasedPath($page, $version);

            if ($this->files->exists($path)) {
                $parsedContent = $this->parse($this->files->get($path));

                $parsedContent = $this->replaceLinks($version, $parsedContent);

                return $this->renderBlade($parsedContent, $data);
            }

            return null;
        }, 'larecipe.docs.'.$version.'.'.$page);
    }

    /**
     * Replace the version and route placeholders.
     *
     * @param  string  $version
     * @param  string  $content
     * @return string
     */
    public static function replaceLinks($version, $content)
    {
        $content = str_replace('{{version}}', $version, $content);

        $content = str_replace('{{route}}', trim(config('larecipe.docs.route'), '/'), $content);

        $content = str_replace('"#', '"'.request()->getRequestUri().'#', $content);

        return $content;
    }

    /**
     * Check if the given section exists.
     *
     * @param  string  $version
     * @param  string  $page
     * @return bool
     */
    public function sectionExists($version, $page)
    {
        return $this->files->exists(
            base_path(config('larecipe.docs.path').'/'.$version.'/'.$page.'.md')
        );
    }

    private function getRoleBasedPath($name, $version){
        if(Auth::guest()){
           $path = base_path(config('larecipe.docs.path').'/'.$version.'/guest/'.$name.'.md');
        }elseif(auth()->user()->can('adminFullApp')){
           $path = base_path(config('larecipe.docs.path').'/'.$version.'/super-admin/'.$name.'.md');
        }elseif(auth()->user()->can('adminApp')){
            $path = base_path(config('larecipe.docs.path').'/'.$version.'/admin/'.$name.'.md');
        }elseif(auth()->user()->can('manageApp')){
            $path = base_path(config('larecipe.docs.path').'/'.$version.'/manager/'.$name.'.md');
        }elseif(auth()->user()->can('accessAsUser')){
            $path = base_path(config('larecipe.docs.path').'/'.$version.'/user/'.$name.'.md');
        }
        return $path;
    }
}
