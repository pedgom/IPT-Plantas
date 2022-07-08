<?php

namespace App\Http\Controllers;

use App\Models\Lock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        //flash('Mensagem no canto superior direito')->overlay()->success();
        //flash('Mensagem de informação no canto superior direito')->overlay()->info();
        //flash('Mensagem fixa COM close button')->error(); // without important() we have the close button
        //flash('Mensagem fixa SEM close button')->warning()->important();// important disable close button
        return view('home.index');
    }

    /**
     * handle the upload of a file
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiUpload(Request $request){

        if($request->get('rules', false)){
            $rules = ['file' =>$request->get('rules', false) ];
        }else{
            $rules = [
                //'file' => 'required|file|max:5120'
                'file' => 'required|file|max:10240'
                //'file' => 'required|file|image|max:10240',
            ];
        }
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), $rules);
        if($validator->fails()){
            $error = $validator->errors()->first('file');
            return response()->json([
                'success' => false,
                'error' => $error,
                //'errors' => $validator->errors()
            ], 300);
        }

        $path = $request->file('file')->store('public/uploads');
        $file = $request->file('file');
        $url = Storage::url($path);

        return response()->json([
            'success' => true,
            'name'          => $path,
            'original_name' => $file->getClientOriginalName(),
            'url' => $url
        ]);
    }

    /**
     * TODO improve security of this endpoint
     * handle the delete of a file temporary uploaded file
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiUploadDelete(Request $request){
        //verify the filename given and if the filename starts with public/uploads to try to enforece the security of this endpoint
        //that is an open endpoint to delete files on the server.
        if(($filename = $request->get('name', false)) != false && str_starts_with($filename, 'public/uploads')) {
            return response()->json([
                'success' => Storage::delete($filename),
            ]);
        }else{
            return response()->json([
                'success' => false,
                'error' => __('File name not provieded'),
                //'errors' => $validator->errors()
            ], 300);
        }
    }

    /**
     * Try to renew the lock on a model
     * @param Request $request
     * @return array
     */
    public function renewModelLock(Request $request){
        $lockStatus = Lock::setLockOrReject(null, $request->get('modelType'), $request->get('modelId'), $request->get('close', null));
        return ['success' => $lockStatus];
    }


    public function search (Request $request){
        return view('home.search');
    }
}
