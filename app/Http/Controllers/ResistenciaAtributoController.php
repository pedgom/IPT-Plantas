<?php

namespace App\Http\Controllers;

use App\DataTables\ResistenciaAtributoDataTable;
use Illuminate\Http\Request;
//use App\Http\Requests\CreateResistenciaAtributoRequest;
//use App\Http\Requests\UpdateResistenciaAtributoRequest;
use App\Models\ResistenciaAtributo;
//use Flash;
//use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;

class ResistenciaAtributoController extends Controller
{
    /**
     * Display a listing of the ResistenciaAtributo.
     *
     * @param ResistenciaAtributoDataTable $resistenciaAtributoDataTable
     * @return Response
     */
    public function index(ResistenciaAtributoDataTable $resistenciaAtributoDataTable)
    {
        return $resistenciaAtributoDataTable->render('resistencia_atributos.index');
    }

    /**
     * Show the form for creating a new ResistenciaAtributo.
     *
     * @return Response
     */
    public function create()
    {
        $resistenciaAtributo = new ResistenciaAtributo();
        $resistenciaAtributo->loadDefaultValues();
        return view('resistencia_atributos.create', compact('resistenciaAtributo'));
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

        if(($model = ResistenciaAtributo::create($validatedAttributes)) ) {
            //flash(Resistencia Atributo saved successfully.');
            //Flash::success('Resistencia Atributo saved successfully.');
            return redirect(route('resistencia-atributos.show', $model));
        }else
            return redirect()->back();
    }

    /**
     * Display the specified ResistenciaAtributo.
     *
     * @param  ResistenciaAtributo  $resistenciaAtributo
     * @return Response
     */
    public function show(ResistenciaAtributo $resistenciaAtributo)
    {
        return view('resistencia_atributos.show', compact('resistenciaAtributo'));
    }

    /**
     * Show the form for editing the specified ResistenciaAtributo.
     *
     * @param  ResistenciaAtributo $resistenciaAtributo
     * @return Response
     */
    public function edit(ResistenciaAtributo $resistenciaAtributo)
    {
        return view('resistencia_atributos.edit', compact('resistenciaAtributo'));
    }

    /**
     * Update the specified ResistenciaAtributo in storage.
     *
     * @param  Request  $request
     * @param  ResistenciaAtributo $resistenciaAtributo
     * @return Response
     */
    public function update(Request $request, ResistenciaAtributo $resistenciaAtributo)
    {
        $validatedAttributes = $this->validateForm($request, $resistenciaAtributo);
        $resistenciaAtributo->fill($validatedAttributes);
        if($resistenciaAtributo->save()) {
            //flash('Resistencia Atributo updated successfully.');
            //Flash::success('Resistencia Atributo updated successfully.');
            return redirect(route('resistencia-atributos.show', $resistenciaAtributo));
        }else{
            return redirect()->back();
        }
    }

     /**
      * Remove the specified ResistenciaAtributo from storage.
      *
      * @param  \App\Models\ResistenciaAtributo  $resistenciaAtributo
      * @return Response
      */
    public function destroy(ResistenciaAtributo $resistenciaAtributo)
    {
        $resistenciaAtributo->delete();
        //Flash::success('Resistencia Atributo deleted successfully.');

        return redirect(route('resistencia-atributos.index'));
    }

    /**
     * @return array
     */
    public function validateForm(Request $request, ResistenciaAtributo $model = null): array
    {

        $rules = ResistenciaAtributo::rules();

        return $request->validate($rules, [], ResistenciaAtributo::attributeLabels());
    }
}
