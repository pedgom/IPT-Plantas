<?php

namespace App\Http\Controllers;

use App\DataTables\OrdemAtributoDataTable;
use Illuminate\Http\Request;
//use App\Http\Requests\CreateOrdemAtributoRequest;
//use App\Http\Requests\UpdateOrdemAtributoRequest;
use App\Models\OrdemAtributo;
//use Flash;
//use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;

class OrdemAtributoController extends Controller
{
    /**
     * Display a listing of the OrdemAtributo.
     *
     * @param OrdemAtributoDataTable $ordemAtributoDataTable
     * @return Response
     */
    public function index(OrdemAtributoDataTable $ordemAtributoDataTable)
    {
        return $ordemAtributoDataTable->render('ordem_atributos.index');
    }

    /**
     * Show the form for creating a new OrdemAtributo.
     *
     * @return Response
     */
    public function create()
    {
        $ordemAtributo = new OrdemAtributo();
        $ordemAtributo->loadDefaultValues();
        return view('ordem_atributos.create', compact('ordemAtributo'));
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

        if(($model = OrdemAtributo::create($validatedAttributes)) ) {
            //flash(Ordem Atributo saved successfully.');
            //Flash::success('Ordem Atributo saved successfully.');
            return redirect(route('ordemAtributos.show', $model));
        }else
            return redirect()->back();
    }

    /**
     * Display the specified OrdemAtributo.
     *
     * @param  OrdemAtributo  $ordemAtributo
     * @return Response
     */
    public function show(OrdemAtributo $ordemAtributo)
    {
        return view('ordem_atributos.show', compact('ordemAtributo'));
    }

    /**
     * Show the form for editing the specified OrdemAtributo.
     *
     * @param  OrdemAtributo $ordemAtributo
     * @return Response
     */
    public function edit(OrdemAtributo $ordemAtributo)
    {
        return view('ordem_atributos.edit', compact('ordemAtributo'));
    }

    /**
     * Update the specified OrdemAtributo in storage.
     *
     * @param  Request  $request
     * @param  OrdemAtributo $ordemAtributo
     * @return Response
     */
    public function update(Request $request, OrdemAtributo $ordemAtributo)
    {
        $validatedAttributes = $this->validateForm($request, $ordemAtributo);
        $ordemAtributo->fill($validatedAttributes);
        if($ordemAtributo->save()) {
            //flash('Ordem Atributo updated successfully.');
            //Flash::success('Ordem Atributo updated successfully.');
            return redirect(route('ordemAtributos.show', $ordemAtributo));
        }else{
            return redirect()->back();
        }
    }

     /**
      * Remove the specified OrdemAtributo from storage.
      *
      * @param  \App\Models\OrdemAtributo  $ordemAtributo
      * @return Response
      */
    public function destroy(OrdemAtributo $ordemAtributo)
    {
        $ordemAtributo->delete();
        //Flash::success('Ordem Atributo deleted successfully.');

        return redirect(route('ordemAtributos.index'));
    }

    /**
     * @return array
     */
    public function validateForm(Request $request, OrdemAtributo $model = null): array
    {

        $rules = OrdemAtributo::rules();

        return $request->validate($rules, [], OrdemAtributo::attributeLabels());
    }
}
