<?php

namespace App\Http\Controllers;

use App\DataTables\OrigemAtributoDataTable;
use Illuminate\Http\Request;
//use App\Http\Requests\CreateOrigemAtributoRequest;
//use App\Http\Requests\UpdateOrigemAtributoRequest;
use App\Models\OrigemAtributo;
//use Flash;
//use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;

class OrigemAtributoController extends Controller
{
    /**
     * Display a listing of the OrigemAtributo.
     *
     * @param OrigemAtributoDataTable $origemAtributoDataTable
     * @return Response
     */
    public function index(OrigemAtributoDataTable $origemAtributoDataTable)
    {
        return $origemAtributoDataTable->render('origem_atributos.index');
    }

    /**
     * Show the form for creating a new OrigemAtributo.
     *
     * @return Response
     */
    public function create()
    {
        $origemAtributo = new OrigemAtributo();
        $origemAtributo->loadDefaultValues();
        return view('origem_atributos.create', compact('origemAtributo'));
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

        if(($model = OrigemAtributo::create($validatedAttributes)) ) {
            //flash(Origem Atributo saved successfully.');
            //Flash::success('Origem Atributo saved successfully.');
            return redirect(route('origem-atributos.show', $model));
        }else
            return redirect()->back();
    }

    /**
     * Display the specified OrigemAtributo.
     *
     * @param  OrigemAtributo  $origemAtributo
     * @return Response
     */
    public function show(OrigemAtributo $origemAtributo)
    {
        return view('origem_atributos.show', compact('origemAtributo'));
    }

    /**
     * Show the form for editing the specified OrigemAtributo.
     *
     * @param  OrigemAtributo $origemAtributo
     * @return Response
     */
    public function edit(OrigemAtributo $origemAtributo)
    {
        return view('origem_atributos.edit', compact('origemAtributo'));
    }

    /**
     * Update the specified OrigemAtributo in storage.
     *
     * @param  Request  $request
     * @param  OrigemAtributo $origemAtributo
     * @return Response
     */
    public function update(Request $request, OrigemAtributo $origemAtributo)
    {
        $validatedAttributes = $this->validateForm($request, $origemAtributo);
        $origemAtributo->fill($validatedAttributes);
        if($origemAtributo->save()) {
            //flash('Origem Atributo updated successfully.');
            //Flash::success('Origem Atributo updated successfully.');
            return redirect(route('origem-atributos.show', $origemAtributo));
        }else{
            return redirect()->back();
        }
    }

     /**
      * Remove the specified OrigemAtributo from storage.
      *
      * @param  \App\Models\OrigemAtributo  $origemAtributo
      * @return Response
      */
    public function destroy(OrigemAtributo $origemAtributo)
    {
        $origemAtributo->delete();
        //Flash::success('Origem Atributo deleted successfully.');

        return redirect(route('origem-atributos.index'));
    }

    /**
     * @return array
     */
    public function validateForm(Request $request, OrigemAtributo $model = null): array
    {

        $rules = OrigemAtributo::rules();

        return $request->validate($rules, [], OrigemAtributo::attributeLabels());
    }
}
