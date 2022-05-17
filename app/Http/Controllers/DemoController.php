<?php

namespace App\Http\Controllers;

use App\DataTables\DemoDataTable;
use App\Models\Lock;
use Illuminate\Http\Request;
//use App\Http\Requests\CreateDemoRequest;
//use App\Http\Requests\UpdateDemoRequest;
use App\Models\Demo;
//use Flash;
//use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;

class DemoController extends Controller
{
    /**
     * Display a listing of the Demo.
     *
     * @param DemoDataTable $demoDataTable
     * @return Response
     */
    public function index(DemoDataTable $demoDataTable)
    {
        return $demoDataTable->render('demos.index');
    }

    /**
     * Show the form for creating a new Demo.
     *
     * @return Response
     */
    public function create()
    {
        $demo = new Demo();
        $demo->loadDefaultValues();
        return view('demos.create', compact('demo'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedAttributes = $this->validateForm($request);

        if(($model = Demo::create($validatedAttributes)) ) {
            if ($request->hasFile('cover') && $request->file('cover')->isValid()) {
                $model->addMediaFromRequest('image')->toMediaCollection('cover');
            }
            foreach ($request->input('file', []) as $index => $file) {
                $model->addMedia(storage_path( "app/" . $file))
                    ->usingName($request->input('file_original_name',[])[$index])//get the media original name at the same index as the media item
                    ->toMediaCollection('files');
            }
            if (!empty($request->input('template'))) {
                $model->addMedia(storage_path("app/" . $request->input('template')))
                    ->usingName($request->input('template_original_name'))//get the media original name at the same index as the media item
                    ->toMediaCollection('template');
            }
            //flash(Demo saved successfully.');
            //Flash::success('Demo saved successfully.');
            return redirect(route('demos.show', $model));
        }else
            return redirect()->back();
    }

    /**
     * Display the specified Demo.
     *
     * @param  Demo  $demo
     * @return Response
     */
    public function show(Demo $demo)
    {
        return view('demos.show', compact('demo'));
    }

    /**
     * Show the form for editing the specified Demo.
     *
     * @param  Demo $demo
     * @return Response
     */
    public function edit(Demo $demo)
    {
        if(Lock::setLockOrReject($demo)){
            return view('demos.edit', compact('demo'));
        }else{
            flash(__('This process is being accessed by :name', ['name' => !empty($demo->lock->user->name) ? $demo->lock->user->name : __('unknown')]))->overlay()->warning();
            return redirect()->back();
        }
    }

    /**
     * Update the specified Demo in storage.
     *
     * @param  Request  $request
     * @param  Demo $demo
     * @return Response
     */
    public function update(Request $request, Demo $demo)
    {
        $validatedAttributes = $this->validateForm($request, $demo);
        $demo->fill($validatedAttributes);
        if($demo->save()) {
            //flash('Demo updated successfully.');
            //Flash::success('Demo updated successfully.');
            if($request->hasFile('cover') && $request->file('cover')->isValid()){
                $demo->addMediaFromRequest('cover')->toMediaCollection('cover');
            }elseif($request->filled('delete_cover') && $request->boolean('delete_cover')){ // if the image was replaced above it will automatically delete this so don't run again
                $demo->getFirstMedia('cover')->delete();
            }
            //remove the file from server, this should be called before the code to save the files
            foreach ($request->input('file_delete', []) as $file_id) {
                if(!empty($demo->getMedia('files')->where('id', $file_id)->first())){
                    $demo->getMedia('files')->where('id', $file_id)->first()->delete();
                }

            }
            foreach ($request->input('file', []) as $index => $file) {
                $demo->addMedia(storage_path( "app/" . $file))
                    ->usingName($request->input('file_original_name',[])[$index])//get the media original name at the same index as the media item
                    ->toMediaCollection('files');
            }
            if (!empty($request->input('template_delete'))) {
                $demo->getMedia('template')->where('id', $request->input('template_delete'))->first()->delete();
            }
            if (!empty($request->input('template'))) {
                $demo->addMedia(storage_path("app/" . $request->input('template')))
                    ->usingName($request->input('template_original_name'))//get the media original name at the same index as the media item
                    ->toMediaCollection('template');
            }
            return redirect(route('demos.show', $demo));
        }else{
            return redirect()->back();
        }
    }

     /**
      * Remove the specified Demo from storage.
      *
      * @param  \App\Models\Demo  $demo
      * @return Response
      */
    public function destroy(Demo $demo)
    {
        $demo->delete();
        //Flash::success('Demo deleted successfully.');

        return redirect(route('demos.index'));
    }

    /**
     * Return the Demos in json format
     * @param type $q
     * @return type
     */
    public function getDemos(Request $request) {
        $q = $request->q ?? null;
        $out = ['results' => ['id' => '', 'text' => '']];
        $results = [];
        if (!empty($q)) {
            $demos = Demo::where('name', 'like', "%$q%")->limit(40)->orderBy('name', 'asc')->get();
        }else{
            $demos = Demo::limit(40)->orderBy('name', 'asc')->get();
        }

        foreach($demos as $demo){
            $results [] =  ['id' => $demo->id, 'text' => $demo->name];
        }
        if(empty($results))
            return $out;
        else{
            $out = ['results' => $results];
            return $out;
        }
    }

    /**
     * @return array
     */
    public function validateForm(Request $request, Demo $model = null): array
    {

        $rules = Demo::rules();

        return $request->validate($rules, [], Demo::attributeLabels());
    }
}
