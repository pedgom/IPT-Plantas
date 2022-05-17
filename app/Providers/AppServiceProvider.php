<?php

namespace App\Providers;

use App\Core\Adapters\Theme;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Helpers\HelperMethods;
use App\Helpers\Setting;
use Illuminate\Foundation\AliasLoader;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        /*if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }*/

        $this->app->bind('setting',function(){
            return new Setting();
        });
        $this->app->bind('helperMethods',function(){
            return new HelperMethods();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //this is used by metronic to define the demo used
        $theme = theme();

        // Share theme adapter class
        View::share('theme', $theme);

        // Set demo globally
        //$theme->setDemo(request()->input('demo', 'demo1'));
        //TODO select the default demo
        $theme->setDemo('demo1');
        //$theme->setDemo('demo20');

        $theme->initConfig();

        bootstrap()->run();

        if (isRTL()) {
            // RTL html attributes
            Theme::addHtmlAttribute('html', 'dir', 'rtl');
            Theme::addHtmlAttribute('html', 'direction', 'rtl');
            Theme::addHtmlAttribute('html', 'style', 'direction:rtl;');
            Theme::addHtmlAttribute('body', 'direction', 'rtl');
        }

        //override the infyom model generator to add extra informations
        $loader = AliasLoader::getInstance();
        $loader->alias('InfyOm\Generator\Generators\ModelGenerator','App\Overrides\infyomlabs\ModelGenerator');
        $loader->alias('BinaryTorch\LaRecipe\Models\Documentation','App\Overrides\larecipe\Documentation');
    }
}
