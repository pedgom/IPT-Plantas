<?php

namespace App\Http\Controllers;

use App\DataTables\PlantaDataTable;
use App\Imports\PlantasImport;
use Illuminate\Http\Request;
//use App\Http\Requests\CreatePlantaRequest;
//use App\Http\Requests\UpdatePlantaRequest;
use App\Models\Planta;
//use Flash;
//use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;

class PlantaController extends Controller
{
    /**
     * Display a listing of the Planta.
     *
     * @param PlantaDataTable $plantaDataTable
     * @return Response
     */
    public function index(PlantaDataTable $plantaDataTable)
    {
        return $plantaDataTable->render('plantas.index');
    }

    /**
     * Show the form for creating a new Planta.
     *
     * @return Response
     */
    public function create()
    {
        $planta = new Planta();
        $planta->loadDefaultValues();
        return view('plantas.create', compact('planta'));
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
        $validatedAttributes['persistencia_atributo_id']= $validatedAttributes['persistencia'];
        unset($validatedAttributes['persistencia']);

        $validatedAttributes['ordem_atributo_id']= $validatedAttributes['ordem'];
        unset($validatedAttributes['ordem']);

        $validatedAttributes['familia_atributo_id']= $validatedAttributes['familia'];
        unset($validatedAttributes['familia']);


        $validatedAttributes['genero_atributo_id']= $validatedAttributes['genero'];
        unset($validatedAttributes['genero']);

        $validatedAttributes['forma_arbusto_atributo_id']= $validatedAttributes['forma_arbusto'];
        unset($validatedAttributes['forma_arbusto']);

        $validatedAttributes['uso_atributo_id']= $validatedAttributes['uso'];
        unset($validatedAttributes['uso']);

        $validatedAttributes['origem_relacao_atributo_id']= $validatedAttributes['origem_relacao'];
        unset($validatedAttributes['origem_relacao']);

        $validatedAttributes['forma_arvore_atributo_id']= $validatedAttributes['forma_arvore'];
        unset($validatedAttributes['forma_arvore']);

        $validatedAttributes['colecao_atributo_id']= $validatedAttributes['colecao'];
        unset($validatedAttributes['colecao']);


        $validatedAttributes['forma_herbacea_atributo_id']= $validatedAttributes['forma_herbacea'];
        unset($validatedAttributes['forma_herbacea']);

        $validatedAttributes['cor_sintese_atributo_id']= $validatedAttributes['cor_sintese'];
        unset($validatedAttributes['cor_sintese']);








        if(($model = Planta::create($validatedAttributes)) ) {
            $model->alturaAtributos()->sync($validatedAttributes['altura']);
            $model->categoriaAtributos()->sync($validatedAttributes['categoria']);
            $model->luzAtributos()->sync($validatedAttributes['luz']);
            $model->diametroAtributos()->sync($validatedAttributes['diametro']);
            $model->densidadeAtributos()->sync($validatedAttributes['densidade']);
            $model->aguaAtributos()->sync($validatedAttributes['agua']);
            $model->resistenciaAtributos()->sync($validatedAttributes['resistencia']);
            $model->soloAtributos()->sync($validatedAttributes['solo']);
            $model->phSoloAtributos()->sync($validatedAttributes['ph_solo']);
            $model->estacaoAtributos()->sync($validatedAttributes['estacao']);

            if ($request->hasFile('imagem_principal') && $request->file('imagem_principal')->isValid()) {
                $model->addMediaFromRequest('imagem_principal')->toMediaCollection('imagem_principal');
            }

            if ($request->hasFile('imagem_zoomin') && $request->file('imagem_zoomin')->isValid()) {
                $model->addMediaFromRequest('imagem_zoomin')->toMediaCollection('imagem_zoomin');
            }

            if ($request->hasFile('imagem_zoomout') && $request->file('imagem_zoomout')->isValid()) {
                $model->addMediaFromRequest('imagem_zoomout')->toMediaCollection('imagem_zoomout');
            }

            if ($request->hasFile('imagem_tronco') && $request->file('imagem_tronco')->isValid()) {
                $model->addMediaFromRequest('imagem_tronco')->toMediaCollection('imagem_tronco');
            }

            if ($request->hasFile('imagem_folha') && $request->file('imagem_folha')->isValid()) {
                $model->addMediaFromRequest('imagem_folha')->toMediaCollection('imagem_folha');
            }

            if ($request->hasFile('imagem_fruto') && $request->file('imagem_fruto')->isValid()) {
                $model->addMediaFromRequest('imagem_fruto')->toMediaCollection('imagem_fruto');
            }

            if ($request->hasFile('imagem_flor') && $request->file('imagem_flor')->isValid()) {
                $model->addMediaFromRequest('imagem_flor')->toMediaCollection('imagem_flor');
            }








            //$model->persistencia_atributo_id = $validatedAttributes['persistencia'];
            //flash(Planta saved successfully.');
            //Flash::success('Planta saved successfully.');
            return redirect(route('plantas.show', $model));
        }else
            return redirect()->back();
    }

    /**
     * Display the specified Planta.
     *
     * @param  Planta  $planta
     * @return Response
     */
    public function show(Planta $planta)
    {
        return view('plantas.show', compact('planta'));
    }

    /**
     * Show the form for editing the specified Planta.
     *
     * @param  Planta $planta
     * @return Response
     */
    public function edit(Planta $planta)
    {
        $planta->altura=$planta->alturaAtributos()->pluck( 'altura_atributos.id')->toArray();
        $planta->categoria=$planta->categoriaAtributos()->pluck( 'categoria_atributos.id')->toArray();
        $planta->luz=$planta->luzAtributos()->pluck( 'luz_atributos.id')->toArray();
        $planta->diametro=$planta->diametroAtributos()->pluck( 'diametro_atributos.id')->toArray();
        $planta->densidade=$planta->densidadeAtributos()->pluck( 'densidade_atributos.id')->toArray();
        $planta->agua=$planta->aguaAtributos()->pluck( 'agua_atributos.id')->toArray();
        $planta->resistencia=$planta->resistenciaAtributos()->pluck( 'resistencia_atributos.id')->toArray();
        $planta->solo=$planta->soloAtributos()->pluck( 'solo_atributos.id')->toArray();
        $planta->ph_solo=$planta->phSoloAtributos()->pluck( 'ph_solo_atributos.id')->toArray();
        $planta->estacao=$planta->estacaoAtributos()->pluck( 'estacao_atributos.id')->toArray();
        return view('plantas.edit', compact('planta'));
    }

    /**
     * Update the specified Planta in storage.
     *
     * @param  Request  $request
     * @param  Planta $planta
     * @return Response
     */
    public function update(Request $request, Planta $planta)
    {
        $validatedAttributes = $this->validateForm($request, $planta);
        $planta->fill($validatedAttributes);
        if($planta->save()) {
            //flash('Planta updated successfully.');
            //Flash::success('Planta updated successfully.');

            $planta->alturaAtributos()->sync($validatedAttributes['altura']);
            $planta->categoriaAtributos()->sync($validatedAttributes['categoria']);
            $planta->luzAtributos()->sync($validatedAttributes['luz']);
            $planta->diametroAtributos()->sync($validatedAttributes['diametro']);
            $planta->densidadeAtributos()->sync($validatedAttributes['densidade']);
            $planta->aguaAtributos()->sync($validatedAttributes['agua']);
            $planta->resistenciaAtributos()->sync($validatedAttributes['resistencia']);
            $planta->soloAtributos()->sync($validatedAttributes['solo']);
            $planta->phSoloAtributos()->sync($validatedAttributes['ph_solo']);
            $planta->estacaoAtributos()->sync($validatedAttributes['estacao']);

            if($request->hasFile('imagem_principal') && $request->file('imagem_principal')->isValid()){
                $planta->addMediaFromRequest('imagem_principal')->toMediaCollection('imagem_principal');
            }elseif($request->filled('delete_imagem_principal') && $request->boolean('delete_imagem_principal')){ // if the image was replaced above it will automatically delete this so don't run again
                $planta->getFirstMedia('imagem_principal')->delete();
            }


            if($request->hasFile('imagem_zoomin') && $request->file('imagem_zoomin')->isValid()){
                $planta->addMediaFromRequest('imagem_zoomin')->toMediaCollection('imagem_zoomin');
            }elseif($request->filled('delete_iimagem_zoomin') && $request->boolean('delete_imagem_zoomin')){ // if the image was replaced above it will automatically delete this so don't run again
                $planta->getFirstMedia('imagem_zoomin')->delete();
            }

            if($request->hasFile('imagem_zoomout') && $request->file('imagem_zoomout')->isValid()){
                $planta->addMediaFromRequest('imagem_zoomout')->toMediaCollection('imagem_zoomout');
            }elseif($request->filled('delete_imagem_zoomout') && $request->boolean('delete_imagem_zoomout')){ // if the image was replaced above it will automatically delete this so don't run again
                $planta->getFirstMedia('imagem_zoomout')->delete();
            }


            if($request->hasFile('imagem_tronco') && $request->file('imagem_tronco')->isValid()){
                $planta->addMediaFromRequest('imagem_tronco')->toMediaCollection('imagem_tronco');
            }elseif($request->filled('delete_imagem_tronco') && $request->boolean('delete_imagem_tronco')){ // if the image was replaced above it will automatically delete this so don't run again
                $planta->getFirstMedia('imagem_tronco')->delete();
            }

            if($request->hasFile('imagem_folha') && $request->file('imagem_folha')->isValid()){
                $planta->addMediaFromRequest('imagem_folha')->toMediaCollection('imagem_folha');
            }elseif($request->filled('delete_imagem_folha') && $request->boolean('delete_imagem_folha')){ // if the image was replaced above it will automatically delete this so don't run again
                $planta->getFirstMedia('imagem_folha')->delete();
            }


            if($request->hasFile('imagem_fruto') && $request->file('imagem_fruto')->isValid()){
                $planta->addMediaFromRequest('imagem_fruto')->toMediaCollection('imagem_fruto');
            }elseif($request->filled('delete_imagem_fruto') && $request->boolean('delete_imagem_fruto')){ // if the image was replaced above it will automatically delete this so don't run again
                $planta->getFirstMedia('imagem_fruto')->delete();
            }


            if($request->hasFile('imagem_flor') && $request->file('imagem_flor')->isValid()){
                $planta->addMediaFromRequest('imagem_flor')->toMediaCollection('imagem_flor');
            }elseif($request->filled('delete_imagem_flor') && $request->boolean('delete_imagem_flor')){ // if the image was replaced above it will automatically delete this so don't run again
                $planta->getFirstMedia('imagem_flor')->delete();
            }



            return redirect(route('plantas.show', $planta));
        }else{
            return redirect()->back();
        }
    }

     /**
      * Remove the specified Planta from storage.
      *
      * @param  \App\Models\Planta  $planta
      * @return Response
      */
    public function destroy(Planta $planta)
    {
        $planta->delete();
        //Flash::success('Planta deleted successfully.');

        return redirect(route('plantas.index'));
    }

    /**
     * @return array
     */
    public function validateForm(Request $request, Planta $model = null): array
    {

        $rules = Planta::rules();

        return $request->validate($rules, [], Planta::attributeLabels());
    }

    public function getPlantas(Request $request){

        /**
         * @return array
         */
                $q = $request->q ?? null;

                if (!empty($q)) {
                    $plantas = Planta::where(function ($query) use($q){
                            $query->where('nome_botanico', 'LIKE', '%' . $q . '%')
                                ->orWhere('nome_comum', 'LIKE', '%' . $q . '%')
                                ->orWhere('abreviatura', 'LIKE', '%' . $q . '%');


                        })
                        ->limit(40)
                        ->get();
                } else {
                    $plantas = Planta::orderBy('nome_botanico', 'asc')
                            ->limit(40)
                            ->get();

                }

                foreach ($plantas as $planta) {

                    $plantasArray [] = [
                        'id' => $planta->id,
                        'text' => '['._('Nome Botanico').'] '.$planta->nome_botanico.' ['.('Nome Comum').'] '.$planta->nome_comum.' ['._('Abreviatura').'] '.$planta->abreviatura,

                    ];
                }

                if(!empty($plantasArray)){
                    return ['results' => $plantasArray];
                }else{
                    return ['results' => ['id' => '', 'text' => '']];
                }

        }




    public function importPlantas(){

        return view('plantas.import_plantas');
    }

    public function submitPlantas(Request $request){
        if (!empty($request->input('template'))) {
            $storagePath = storage_path("app/" . $request->input('template'));

                $import = new PlantasImport();
                Excel::import($import, $storagePath);

        }

        return redirect(route('plantas.index'));
    }

}
