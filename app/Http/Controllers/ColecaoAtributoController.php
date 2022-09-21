<?php

namespace App\Http\Controllers;

use App\DataTables\ColecaoAtributoDataTable;
use Illuminate\Http\Request;
//use App\Http\Requests\CreateColecaoAtributoRequest;
//use App\Http\Requests\UpdateColecaoAtributoRequest;
use App\Models\ColecaoAtributo;
//use Flash;
//use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;

class ColecaoAtributoController extends Controller
{
    /**
     * Display a listing of the ColecaoAtributo.
     *
     * @param ColecaoAtributoDataTable $colecaoAtributoDataTable
     * @return Response
     */
    public function index(ColecaoAtributoDataTable $colecaoAtributoDataTable)
    {
        return $colecaoAtributoDataTable->render('colecao_atributos.index');
    }

    /**
     * Show the form for creating a new ColecaoAtributo.
     *
     * @return Response
     */
    public function create()
    {
        $colecaoAtributo = new ColecaoAtributo();
        $colecaoAtributo->loadDefaultValues();
        return view('colecao_atributos.create', compact('colecaoAtributo'));
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

        if(($model = ColecaoAtributo::create($validatedAttributes)) ) {
            //flash(Colecao Atributo saved successfully.');
            //Flash::success('Colecao Atributo saved successfully.');
            return redirect(route('colecaoAtributos.show', $model));
        }else
            return redirect()->back();
    }

    /**
     * Display the specified ColecaoAtributo.
     *
     * @param  ColecaoAtributo  $colecaoAtributo
     * @return Response
     */
    public function show(ColecaoAtributo $colecaoAtributo)
    {
        return view('colecao_atributos.show', compact('colecaoAtributo'));
    }

    /**
     * Show the form for editing the specified ColecaoAtributo.
     *
     * @param  ColecaoAtributo $colecaoAtributo
     * @return Response
     */
    public function edit(ColecaoAtributo $colecaoAtributo)
    {
        return view('colecao_atributos.edit', compact('colecaoAtributo'));
    }

    /**
     * Update the specified ColecaoAtributo in storage.
     *
     * @param  Request  $request
     * @param  ColecaoAtributo $colecaoAtributo
     * @return Response
     */
    public function update(Request $request, ColecaoAtributo $colecaoAtributo)
    {
        $validatedAttributes = $this->validateForm($request, $colecaoAtributo);
        $colecaoAtributo->fill($validatedAttributes);
        if($colecaoAtributo->save()) {
            //flash('Colecao Atributo updated successfully.');
            //Flash::success('Colecao Atributo updated successfully.');
            return redirect(route('colecaoAtributos.show', $colecaoAtributo));
        }else{
            return redirect()->back();
        }
    }

     /**
      * Remove the specified ColecaoAtributo from storage.
      *
      * @param  \App\Models\ColecaoAtributo  $colecaoAtributo
      * @return Response
      */
    public function destroy(ColecaoAtributo $colecaoAtributo)
    {
        $colecaoAtributo->delete();
        //Flash::success('Colecao Atributo deleted successfully.');

        return redirect(route('colecaoAtributos.index'));
    }

    /**
     * @return array
     */
    public function validateForm(Request $request, ColecaoAtributo $model = null): array
    {

        $rules = ColecaoAtributo::rules();

        return $request->validate($rules, [], ColecaoAtributo::attributeLabels());
    }
}
