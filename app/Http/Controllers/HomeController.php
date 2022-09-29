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
        $persistencia=$request->persistencia ?? null;
        $forma_arbusto=$request->forma_arbusto ?? null;
        $forma_arvore=$request->forma_arvore ?? null;
        $forma_herbacea=$request->forma_herbacea ?? null;
        $colecao=$request->colecao ?? null;
        $uso=$request->uso ?? null;
        $origem_relacao=$request->origem_relacao ?? null;
        $diametro=$request->diametro ?? null;
        $densidade=$request->densidade ?? null;
        $resistencia=$request->resistencia ?? null;
        $ph_solo=$request->ph_solo ?? null;

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

        if(!empty($diametro)){
            $query=$query->whereHas('diametroAtributos',function($q) use($diametro){
                $q->whereIn('diametro_atributos.id',$diametro);
            });
        }

        if(!empty($densidade)){
            $query=$query->whereHas('densidadeAtributos',function($q) use($densidade){
                $q->whereIn('densidade_atributos.id',$densidade);
            });
        }

        if(!empty($resistencia)){
            $query=$query->whereHas('resistenciaAtributos',function($q) use($resistencia){
                $q->whereIn('resistencia_atributos.id',$resistencia);
            });
        }

        if(!empty($ph_solo)){
            $query=$query->whereHas('phSoloAtributos',function($q) use($ph_solo){
                $q->whereIn('ph_solo_atributos.id',$ph_solo);
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
                $q->where('id',$familia);
            });
        }

        if(!empty($genero)){
            $query=$query->whereHas('generoAtributo',function($q) use($genero){
                $q->where('id',$genero);
            });
        }


        if(!empty($ordem)){
            $query=$query->whereHas('ordemAtributo',function($q) use($ordem){
                $q->where('id',$ordem);
            });
        }

        if(!empty($persistencia)){
            $query=$query->whereHas('persistenciaAtributo',function($q) use($persistencia){
                $q->where('id',$persistencia);
            });
        }

        if(!empty($forma_arbusto)){
            $query=$query->whereHas('formaArbustoAtributo',function($q) use($forma_arbusto){
                $q->where('id',$forma_arbusto);
            });
        }

        if(!empty($forma_arvore)){
            $query=$query->whereHas('formaArvoreAtributo',function($q) use($forma_arvore){
                $q->where('id',$forma_arvore);
            });
        }

        if(!empty($forma_herbacea)){
            $query=$query->whereHas('formaHerbaceaAtributo',function($q) use($forma_herbacea){
                $q->where('id',$forma_herbacea);
            });
        }

        if(!empty($colecao)){
            $query=$query->whereHas('colecaoAtributo',function($q) use($colecao){
                $q->where('id',$colecao);
            });
        }

        if(!empty($uso)){
            $query=$query->whereHas('usoAtributo',function($q) use($uso){
                $q->where('id',$uso);
            });
        }

        if(!empty($origem_relacao)){
            $query=$query->whereHas('origemRelacaoAtributo',function($q) use($origem_relacao){
                $q->where('id',$origem_relacao);
            });
        }










        $plantas =$query->orderBy('id', 'desc')->paginate(12);

        return view('home.search', compact('plantas','search','planta'));
    }


}
