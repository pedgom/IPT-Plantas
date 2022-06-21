<?php

namespace App\Http\Controllers;

use App\DataTables\OrigemRelacaoAtributoDataTable;
use Illuminate\Http\Request;
//use App\Http\Requests\CreateOrigemRelacaoAtributoRequest;
//use App\Http\Requests\UpdateOrigemRelacaoAtributoRequest;
use App\Models\OrigemRelacaoAtributo;
//use Flash;
//use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;

class OrigemRelacaoAtributoController extends Controller
{
    /**
     * Display a listing of the OrigemRelacaoAtributo.
     *
     * @param OrigemRelacaoAtributoDataTable $origemRelacaoAtributoDataTable
     * @return Response
     */
    public function index(OrigemRelacaoAtributoDataTable $origemRelacaoAtributoDataTable)
    {
        return $origemRelacaoAtributoDataTable->render('origem_relacao_atributos.index');
    }

    /**
     * Show the form for creating a new OrigemRelacaoAtributo.
     *
     * @return Response
     */
    public function create()
    {
        $origemRelacaoAtributo = new OrigemRelacaoAtributo();
        $origemRelacaoAtributo->loadDefaultValues();
        return view('origem_relacao_atributos.create', compact('origemRelacaoAtributo'));
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

        if(($model = OrigemRelacaoAtributo::create($validatedAttributes)) ) {
            //flash(Origem Relacao Atributo saved successfully.');
            //Flash::success('Origem Relacao Atributo saved successfully.');
            return redirect(route('origem-relacao-atributos.show', $model));
        }else
            return redirect()->back();
    }

    /**
     * Display the specified OrigemRelacaoAtributo.
     *
     * @param  OrigemRelacaoAtributo  $origemRelacaoAtributo
     * @return Response
     */
    public function show(OrigemRelacaoAtributo $origemRelacaoAtributo)
    {
        return view('origem_relacao_atributos.show', compact('origemRelacaoAtributo'));
    }

    /**
     * Show the form for editing the specified OrigemRelacaoAtributo.
     *
     * @param  OrigemRelacaoAtributo $origemRelacaoAtributo
     * @return Response
     */
    public function edit(OrigemRelacaoAtributo $origemRelacaoAtributo)
    {
        return view('origem_relacao_atributos.edit', compact('origemRelacaoAtributo'));
    }

    /**
     * Update the specified OrigemRelacaoAtributo in storage.
     *
     * @param  Request  $request
     * @param  OrigemRelacaoAtributo $origemRelacaoAtributo
     * @return Response
     */
    public function update(Request $request, OrigemRelacaoAtributo $origemRelacaoAtributo)
    {
        $validatedAttributes = $this->validateForm($request, $origemRelacaoAtributo);
        $origemRelacaoAtributo->fill($validatedAttributes);
        if($origemRelacaoAtributo->save()) {
            //flash('Origem Relacao Atributo updated successfully.');
            //Flash::success('Origem Relacao Atributo updated successfully.');
            return redirect(route('origem-relacao-atributos.show', $origemRelacaoAtributo));
        }else{
            return redirect()->back();
        }
    }

     /**
      * Remove the specified OrigemRelacaoAtributo from storage.
      *
      * @param  \App\Models\OrigemRelacaoAtributo  $origemRelacaoAtributo
      * @return Response
      */
    public function destroy(OrigemRelacaoAtributo $origemRelacaoAtributo)
    {
        $origemRelacaoAtributo->delete();
        //Flash::success('Origem Relacao Atributo deleted successfully.');

        return redirect(route('origem-relacao-atributos.index'));
    }

    /**
     * @return array
     */
    public function validateForm(Request $request, OrigemRelacaoAtributo $model = null): array
    {

        $rules = OrigemRelacaoAtributo::rules();

        return $request->validate($rules, [], OrigemRelacaoAtributo::attributeLabels());
    }
}
