<?php

namespace App\Http\Controllers;

use App\DataTables\SituacaoEcologicaAtributoDataTable;
use Illuminate\Http\Request;
//use App\Http\Requests\CreateSituacaoEcologicaAtributoRequest;
//use App\Http\Requests\UpdateSituacaoEcologicaAtributoRequest;
use App\Models\SituacaoEcologicaAtributo;
//use Flash;
//use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;

class SituacaoEcologicaAtributoController extends Controller
{
    /**
     * Display a listing of the SituacaoEcologicaAtributo.
     *
     * @param SituacaoEcologicaAtributoDataTable $situacaoEcologicaAtributoDataTable
     * @return Response
     */
    public function index(SituacaoEcologicaAtributoDataTable $situacaoEcologicaAtributoDataTable)
    {
        return $situacaoEcologicaAtributoDataTable->render('situacao_ecologica_atributos.index');
    }

    /**
     * Show the form for creating a new SituacaoEcologicaAtributo.
     *
     * @return Response
     */
    public function create()
    {
        $situacaoEcologicaAtributo = new SituacaoEcologicaAtributo();
        $situacaoEcologicaAtributo->loadDefaultValues();
        return view('situacao_ecologica_atributos.create', compact('situacaoEcologicaAtributo'));
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

        if(($model = SituacaoEcologicaAtributo::create($validatedAttributes)) ) {
            //flash(Situacao Ecologica Atributo saved successfully.');
            //Flash::success('Situacao Ecologica Atributo saved successfully.');
            return redirect(route('situacao-ecologica-atributos.show', $model));
        }else
            return redirect()->back();
    }

    /**
     * Display the specified SituacaoEcologicaAtributo.
     *
     * @param  SituacaoEcologicaAtributo  $situacaoEcologicaAtributo
     * @return Response
     */
    public function show(SituacaoEcologicaAtributo $situacaoEcologicaAtributo)
    {
        return view('situacao_ecologica_atributos.show', compact('situacaoEcologicaAtributo'));
    }

    /**
     * Show the form for editing the specified SituacaoEcologicaAtributo.
     *
     * @param  SituacaoEcologicaAtributo $situacaoEcologicaAtributo
     * @return Response
     */
    public function edit(SituacaoEcologicaAtributo $situacaoEcologicaAtributo)
    {
        return view('situacao_ecologica_atributos.edit', compact('situacaoEcologicaAtributo'));
    }

    /**
     * Update the specified SituacaoEcologicaAtributo in storage.
     *
     * @param  Request  $request
     * @param  SituacaoEcologicaAtributo $situacaoEcologicaAtributo
     * @return Response
     */
    public function update(Request $request, SituacaoEcologicaAtributo $situacaoEcologicaAtributo)
    {
        $validatedAttributes = $this->validateForm($request, $situacaoEcologicaAtributo);
        $situacaoEcologicaAtributo->fill($validatedAttributes);
        if($situacaoEcologicaAtributo->save()) {
            //flash('Situacao Ecologica Atributo updated successfully.');
            //Flash::success('Situacao Ecologica Atributo updated successfully.');
            return redirect(route('situacao-ecologica-atributos.show', $situacaoEcologicaAtributo));
        }else{
            return redirect()->back();
        }
    }

     /**
      * Remove the specified SituacaoEcologicaAtributo from storage.
      *
      * @param  \App\Models\SituacaoEcologicaAtributo  $situacaoEcologicaAtributo
      * @return Response
      */
    public function destroy(SituacaoEcologicaAtributo $situacaoEcologicaAtributo)
    {
        $situacaoEcologicaAtributo->delete();
        //Flash::success('Situacao Ecologica Atributo deleted successfully.');

        return redirect(route('situacao-ecologica-atributos.index'));
    }

    /**
     * @return array
     */
    public function validateForm(Request $request, SituacaoEcologicaAtributo $model = null): array
    {

        $rules = SituacaoEcologicaAtributo::rules();

        return $request->validate($rules, [], SituacaoEcologicaAtributo::attributeLabels());
    }
}
