<?php

namespace App\Http\Controllers;

use App\DataTables\ResistenciaAtributoPlantaDataTable;
use Illuminate\Http\Request;
//use App\Http\Requests\CreateResistenciaAtributoPlantaRequest;
//use App\Http\Requests\UpdateResistenciaAtributoPlantaRequest;
use App\Models\ResistenciaAtributoPlanta;
//use Flash;
//use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;

class ResistenciaAtributoPlantaController extends Controller
{
    /**
     * Display a listing of the ResistenciaAtributoPlanta.
     *
     * @param ResistenciaAtributoPlantaDataTable $resistenciaAtributoPlantaDataTable
     * @return Response
     */
    public function index(ResistenciaAtributoPlantaDataTable $resistenciaAtributoPlantaDataTable)
    {
        return $resistenciaAtributoPlantaDataTable->render('resistencia_atributo_plantas.index');
    }

    /**
     * Show the form for creating a new ResistenciaAtributoPlanta.
     *
     * @return Response
     */
    public function create()
    {
        $resistenciaAtributoPlanta = new ResistenciaAtributoPlanta();
        $resistenciaAtributoPlanta->loadDefaultValues();
        return view('resistencia_atributo_plantas.create', compact('resistenciaAtributoPlanta'));
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

        if(($model = ResistenciaAtributoPlanta::create($validatedAttributes)) ) {
            //flash(Resistencia Atributo Planta saved successfully.');
            //Flash::success('Resistencia Atributo Planta saved successfully.');
            return redirect(route('resistencia-atributo-plantas.show', $model));
        }else
            return redirect()->back();
    }

    /**
     * Display the specified ResistenciaAtributoPlanta.
     *
     * @param  ResistenciaAtributoPlanta  $resistenciaAtributoPlanta
     * @return Response
     */
    public function show(ResistenciaAtributoPlanta $resistenciaAtributoPlanta)
    {
        return view('resistencia_atributo_plantas.show', compact('resistenciaAtributoPlanta'));
    }

    /**
     * Show the form for editing the specified ResistenciaAtributoPlanta.
     *
     * @param  ResistenciaAtributoPlanta $resistenciaAtributoPlanta
     * @return Response
     */
    public function edit(ResistenciaAtributoPlanta $resistenciaAtributoPlanta)
    {
        return view('resistencia_atributo_plantas.edit', compact('resistenciaAtributoPlanta'));
    }

    /**
     * Update the specified ResistenciaAtributoPlanta in storage.
     *
     * @param  Request  $request
     * @param  ResistenciaAtributoPlanta $resistenciaAtributoPlanta
     * @return Response
     */
    public function update(Request $request, ResistenciaAtributoPlanta $resistenciaAtributoPlanta)
    {
        $validatedAttributes = $this->validateForm($request, $resistenciaAtributoPlanta);
        $resistenciaAtributoPlanta->fill($validatedAttributes);
        if($resistenciaAtributoPlanta->save()) {
            //flash('Resistencia Atributo Planta updated successfully.');
            //Flash::success('Resistencia Atributo Planta updated successfully.');
            return redirect(route('resistencia-atributo-plantas.show', $resistenciaAtributoPlanta));
        }else{
            return redirect()->back();
        }
    }

     /**
      * Remove the specified ResistenciaAtributoPlanta from storage.
      *
      * @param  \App\Models\ResistenciaAtributoPlanta  $resistenciaAtributoPlanta
      * @return Response
      */
    public function destroy(ResistenciaAtributoPlanta $resistenciaAtributoPlanta)
    {
        $resistenciaAtributoPlanta->delete();
        //Flash::success('Resistencia Atributo Planta deleted successfully.');

        return redirect(route('resistencia-atributo-plantas.index'));
    }

    /**
     * @return array
     */
    public function validateForm(Request $request, ResistenciaAtributoPlanta $model = null): array
    {

        $rules = ResistenciaAtributoPlanta::rules();

        return $request->validate($rules, [], ResistenciaAtributoPlanta::attributeLabels());
    }
}
