<?php

namespace App\Http\Controllers;

use App\DataTables\EstacaoAtributoDataTable;
use Illuminate\Http\Request;
//use App\Http\Requests\CreateEstacaoAtributoRequest;
//use App\Http\Requests\UpdateEstacaoAtributoRequest;
use App\Models\EstacaoAtributo;
//use Flash;
//use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;

class EstacaoAtributoController extends Controller
{
    /**
     * Display a listing of the EstacaoAtributo.
     *
     * @param EstacaoAtributoDataTable $estacaoAtributoDataTable
     * @return Response
     */
    public function index(EstacaoAtributoDataTable $estacaoAtributoDataTable)
    {
        return $estacaoAtributoDataTable->render('estacao_atributos.index');
    }

    /**
     * Show the form for creating a new EstacaoAtributo.
     *
     * @return Response
     */
    public function create()
    {
        $estacaoAtributo = new EstacaoAtributo();
        $estacaoAtributo->loadDefaultValues();
        return view('estacao_atributos.create', compact('estacaoAtributo'));
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

        if(($model = EstacaoAtributo::create($validatedAttributes)) ) {
            //flash(Estacao Atributo saved successfully.');
            //Flash::success('Estacao Atributo saved successfully.');
            return redirect(route('estacao-atributos.show', $model));
        }else
            return redirect()->back();
    }

    /**
     * Display the specified EstacaoAtributo.
     *
     * @param  EstacaoAtributo  $estacaoAtributo
     * @return Response
     */
    public function show(EstacaoAtributo $estacaoAtributo)
    {
        return view('estacao_atributos.show', compact('estacaoAtributo'));
    }

    /**
     * Show the form for editing the specified EstacaoAtributo.
     *
     * @param  EstacaoAtributo $estacaoAtributo
     * @return Response
     */
    public function edit(EstacaoAtributo $estacaoAtributo)
    {
        return view('estacao_atributos.edit', compact('estacaoAtributo'));
    }

    /**
     * Update the specified EstacaoAtributo in storage.
     *
     * @param  Request  $request
     * @param  EstacaoAtributo $estacaoAtributo
     * @return Response
     */
    public function update(Request $request, EstacaoAtributo $estacaoAtributo)
    {
        $validatedAttributes = $this->validateForm($request, $estacaoAtributo);
        $estacaoAtributo->fill($validatedAttributes);
        if($estacaoAtributo->save()) {
            //flash('Estacao Atributo updated successfully.');
            //Flash::success('Estacao Atributo updated successfully.');
            return redirect(route('estacao-atributos.show', $estacaoAtributo));
        }else{
            return redirect()->back();
        }
    }

     /**
      * Remove the specified EstacaoAtributo from storage.
      *
      * @param  \App\Models\EstacaoAtributo  $estacaoAtributo
      * @return Response
      */
    public function destroy(EstacaoAtributo $estacaoAtributo)
    {
        $estacaoAtributo->delete();
        //Flash::success('Estacao Atributo deleted successfully.');

        return redirect(route('estacao-atributos.index'));
    }

    /**
     * @return array
     */
    public function validateForm(Request $request, EstacaoAtributo $model = null): array
    {

        $rules = EstacaoAtributo::rules();

        return $request->validate($rules, [], EstacaoAtributo::attributeLabels());
    }
}
