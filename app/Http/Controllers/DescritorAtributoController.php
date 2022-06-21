<?php

namespace App\Http\Controllers;

use App\DataTables\DescritorAtributoDataTable;
use Illuminate\Http\Request;
//use App\Http\Requests\CreateDescritorAtributoRequest;
//use App\Http\Requests\UpdateDescritorAtributoRequest;
use App\Models\DescritorAtributo;
//use Flash;
//use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;

class DescritorAtributoController extends Controller
{
    /**
     * Display a listing of the DescritorAtributo.
     *
     * @param DescritorAtributoDataTable $descritorAtributoDataTable
     * @return Response
     */
    public function index(DescritorAtributoDataTable $descritorAtributoDataTable)
    {
        return $descritorAtributoDataTable->render('descritor_atributos.index');
    }

    /**
     * Show the form for creating a new DescritorAtributo.
     *
     * @return Response
     */
    public function create()
    {
        $descritorAtributo = new DescritorAtributo();
        $descritorAtributo->loadDefaultValues();
        return view('descritor_atributos.create', compact('descritorAtributo'));
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

        if(($model = DescritorAtributo::create($validatedAttributes)) ) {
            //flash(Descritor Atributo saved successfully.');
            //Flash::success('Descritor Atributo saved successfully.');
            return redirect(route('descritor-atributos.show', $model));
        }else
            return redirect()->back();
    }

    /**
     * Display the specified DescritorAtributo.
     *
     * @param  DescritorAtributo  $descritorAtributo
     * @return Response
     */
    public function show(DescritorAtributo $descritorAtributo)
    {
        return view('descritor_atributos.show', compact('descritorAtributo'));
    }

    /**
     * Show the form for editing the specified DescritorAtributo.
     *
     * @param  DescritorAtributo $descritorAtributo
     * @return Response
     */
    public function edit(DescritorAtributo $descritorAtributo)
    {
        return view('descritor_atributos.edit', compact('descritorAtributo'));
    }

    /**
     * Update the specified DescritorAtributo in storage.
     *
     * @param  Request  $request
     * @param  DescritorAtributo $descritorAtributo
     * @return Response
     */
    public function update(Request $request, DescritorAtributo $descritorAtributo)
    {
        $validatedAttributes = $this->validateForm($request, $descritorAtributo);
        $descritorAtributo->fill($validatedAttributes);
        if($descritorAtributo->save()) {
            //flash('Descritor Atributo updated successfully.');
            //Flash::success('Descritor Atributo updated successfully.');
            return redirect(route('descritor-atributos.show', $descritorAtributo));
        }else{
            return redirect()->back();
        }
    }

     /**
      * Remove the specified DescritorAtributo from storage.
      *
      * @param  \App\Models\DescritorAtributo  $descritorAtributo
      * @return Response
      */
    public function destroy(DescritorAtributo $descritorAtributo)
    {
        $descritorAtributo->delete();
        //Flash::success('Descritor Atributo deleted successfully.');

        return redirect(route('descritor-atributos.index'));
    }

    /**
     * @return array
     */
    public function validateForm(Request $request, DescritorAtributo $model = null): array
    {

        $rules = DescritorAtributo::rules();

        return $request->validate($rules, [], DescritorAtributo::attributeLabels());
    }
}
