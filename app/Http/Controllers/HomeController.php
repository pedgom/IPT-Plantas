<?php

namespace App\Http\Controllers;

use App\Models\Lock;
use App\Models\Planta;
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
        $search=$request->search ?? null;
        $altura=$request->altura ?? null;
        $agua=$request->agua ?? null;
        $categoria=$request->categoria ?? null;
        $luz=$request->luz ?? null;
        $solo=$request->solo ?? null;
        $estacao=$request->estacao ?? null;
        $corSintese=$request->cor_sintese ?? null;
        $familia=$request->familia ?? null;
        $genero=$request->genero ?? null;
        $ordem=$request->ordem ?? null;
        $plantas = [];
        $planta = new Planta();
        $planta->loadDefaultValues();
        $query= new \App\Models\Planta;

        if(!empty($search)){
                $query=$query->where(function($q) use($search){
                $q->where('nome_comum','like', '%'.$search.'%')
                    ->orWhere('nome_botanico','like', '%'.$search.'%')
                    ->orWhere('abreviatura','like', '%'.$search.'%');
            });

        }
        if(!empty($altura)){
            $query=$query->whereHas('alturaAtributos',function($q) use($altura){
            $q->whereIn('altura_atributos.id',$altura);
            });
        }


        if(!empty($agua)){
            $query=$query->whereHas('aguaAtributos',function($q) use($agua){
                $q->whereIn('agua_atributos.id',$agua);
            });
        }

        if(!empty($categoria)){
            $query=$query->whereHas('categoriaAtributos',function($q) use($categoria){
                $q->whereIn('categoria_atributos.id',$categoria);
            });
        }

        if(!empty($luz)){
            $query=$query->whereHas('luzAtributos',function($q) use($luz){
                $q->whereIn('luz_atributos.id',$luz);
            });
        }

        if(!empty($solo)){
            $query=$query->whereHas('soloAtributos',function($q) use($solo){
                $q->whereIn('solo_atributos.id',$solo);
            });
        }

        if(!empty($estacao)){
            $query=$query->whereHas('estacaoAtributos',function($q) use($estacao){
                $q->whereIn('estacao_atributos.id',$estacao);
            });
        }


        if(!empty($corSintese)){
            $query=$query->whereHas('corSinteseAtributo',function($q) use($corSintese){
                $q->where('cor_sintese',$corSintese);
            });
        }

        if(!empty($familia)){
            $query=$query->whereHas('familiaAtributo',function($q) use($familia){
                $q->where('familia',$familia);
            });
        }

        if(!empty($genero)){
            $query=$query->whereHas('generoAtributo',function($q) use($genero){
                $q->where('genero',$genero);
            });
        }


        if(!empty($ordem)){
            $query=$query->whereHas('ordemAtributo',function($q) use($ordem){
                $q->where('ordem',$ordem);
            });
        }










        $plantas =$query->orderBy('id', 'desc')->paginate(12);

        return view('home.search', compact('plantas','search','planta'));
    }
}
