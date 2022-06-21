<?php

namespace App\Http\Controllers;

use App\DataTables\AplicacaoAtributoDataTable;
use Illuminate\Http\Request;
//use App\Http\Requests\CreateAplicacaoAtributoRequest;
//use App\Http\Requests\UpdateAplicacaoAtributoRequest;
use App\Models\AplicacaoAtributo;
//use Flash;
//use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;

class AplicacaoAtributoController extends Controller
{
    /**
     * Display a listing of the AplicacaoAtributo.
     *
     * @param AplicacaoAtributoDataTable $aplicacaoAtributoDataTable
     * @return Response
     */
    public function index(AplicacaoAtributoDataTable $aplicacaoAtributoDataTable)
    {
        return $aplicacaoAtributoDataTable->render('aplicacao_atributos.index');
    }

    /**
     * Show the form for creating a new AplicacaoAtributo.
     *
     * @return Response
     */
    public function create()
    {
        $aplicacaoAtributo = new AplicacaoAtributo();
        $aplicacaoAtributo->loadDefaultValues();
        return view('aplicacao_atributos.create', compact('aplicacaoAtributo'));
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

        if(($model = AplicacaoAtributo::create($validatedAttributes)) ) {
            //flash(Aplicacao Atributo saved successfully.');
            //Flash::success('Aplicacao Atributo saved successfully.');
            return redirect(route('aplicacao-atributos.show', $model));
        }else
            return redirect()->back();
    }

    /**
     * Display the specified AplicacaoAtributo.
     *
     * @param  AplicacaoAtributo  $aplicacaoAtributo
     * @return Response
     */
    public function show(AplicacaoAtributo $aplicacaoAtributo)
    {
        return view('aplicacao_atributos.show', compact('aplicacaoAtributo'));
    }

    /**
     * Show the form for editing the specified AplicacaoAtributo.
     *
     * @param  AplicacaoAtributo $aplicacaoAtributo
     * @return Response
     */
    public function edit(AplicacaoAtributo $aplicacaoAtributo)
    {
        return view('aplicacao_atributos.edit', compact('aplicacaoAtributo'));
    }

    /**
     * Update the specified AplicacaoAtributo in storage.
     *
     * @param  Request  $request
     * @param  AplicacaoAtributo $aplicacaoAtributo
     * @return Response
     */
    public function update(Request $request, AplicacaoAtributo $aplicacaoAtributo)
    {
        $validatedAttributes = $this->validateForm($request, $aplicacaoAtributo);
        $aplicacaoAtributo->fill($validatedAttributes);
        if($aplicacaoAtributo->save()) {
            //flash('Aplicacao Atributo updated successfully.');
            //Flash::success('Aplicacao Atributo updated successfully.');
            return redirect(route('aplicacao-atributos.show', $aplicacaoAtributo));
        }else{
            return redirect()->back();
        }
    }

     /**
      * Remove the specified AplicacaoAtributo from storage.
      *
      * @param  \App\Models\AplicacaoAtributo  $aplicacaoAtributo
      * @return Response
      */
    public function destroy(AplicacaoAtributo $aplicacaoAtributo)
    {
        $aplicacaoAtributo->delete();
        //Flash::success('Aplicacao Atributo deleted successfully.');

        return redirect(route('aplicacao-atributos.index'));
    }

    /**
     * @return array
     */
    public function validateForm(Request $request, AplicacaoAtributo $model = null): array
    {

        $rules = AplicacaoAtributo::rules();

        return $request->validate($rules, [], AplicacaoAtributo::attributeLabels());
    }
}
