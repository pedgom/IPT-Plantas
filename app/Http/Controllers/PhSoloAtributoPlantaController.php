<?php

namespace App\Http\Controllers;

use App\DataTables\PhSoloAtributoPlantaDataTable;
use Illuminate\Http\Request;
//use App\Http\Requests\CreatePhSoloAtributoPlantaRequest;
//use App\Http\Requests\UpdatePhSoloAtributoPlantaRequest;
use App\Models\PhSoloAtributoPlanta;
//use Flash;
//use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;

class PhSoloAtributoPlantaController extends Controller
{
    /**
     * Display a listing of the PhSoloAtributoPlanta.
     *
     * @param PhSoloAtributoPlantaDataTable $phSoloAtributoPlantaDataTable
     * @return Response
     */
    public function index(PhSoloAtributoPlantaDataTable $phSoloAtributoPlantaDataTable)
    {
        return $phSoloAtributoPlantaDataTable->render('ph_solo_atributo_plantas.index');
    }

    /**
     * Show the form for creating a new PhSoloAtributoPlanta.
     *
     * @return Response
     */
    public function create()
    {
        $phSoloAtributoPlanta = new PhSoloAtributoPlanta();
        $phSoloAtributoPlanta->loadDefaultValues();
        return view('ph_solo_atributo_plantas.create', compact('phSoloAtributoPlanta'));
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

        if(($model = PhSoloAtributoPlanta::create($validatedAttributes)) ) {
            //flash(Ph Solo Atributo Planta saved successfully.');
            //Flash::success('Ph Solo Atributo Planta saved successfully.');
            return redirect(route('ph-solo-atributo-plantas.show', $model));
        }else
            return redirect()->back();
    }

    /**
     * Display the specified PhSoloAtributoPlanta.
     *
     * @param  PhSoloAtributoPlanta  $phSoloAtributoPlanta
     * @return Response
     */
    public function show(PhSoloAtributoPlanta $phSoloAtributoPlanta)
    {
        return view('ph_solo_atributo_plantas.show', compact('phSoloAtributoPlanta'));
    }

    /**
     * Show the form for editing the specified PhSoloAtributoPlanta.
     *
     * @param  PhSoloAtributoPlanta $phSoloAtributoPlanta
     * @return Response
     */
    public function edit(PhSoloAtributoPlanta $phSoloAtributoPlanta)
    {
        return view('ph_solo_atributo_plantas.edit', compact('phSoloAtributoPlanta'));
    }

    /**
     * Update the specified PhSoloAtributoPlanta in storage.
     *
     * @param  Request  $request
     * @param  PhSoloAtributoPlanta $phSoloAtributoPlanta
     * @return Response
     */
    public function update(Request $request, PhSoloAtributoPlanta $phSoloAtributoPlanta)
    {
        $validatedAttributes = $this->validateForm($request, $phSoloAtributoPlanta);
        $phSoloAtributoPlanta->fill($validatedAttributes);
        if($phSoloAtributoPlanta->save()) {
            //flash('Ph Solo Atributo Planta updated successfully.');
            //Flash::success('Ph Solo Atributo Planta updated successfully.');
            return redirect(route('ph-solo-atributo-plantas.show', $phSoloAtributoPlanta));
        }else{
            return redirect()->back();
        }
    }

     /**
      * Remove the specified PhSoloAtributoPlanta from storage.
      *
      * @param  \App\Models\PhSoloAtributoPlanta  $phSoloAtributoPlanta
      * @return Response
      */
    public function destroy(PhSoloAtributoPlanta $phSoloAtributoPlanta)
    {
        $phSoloAtributoPlanta->delete();
        //Flash::success('Ph Solo Atributo Planta deleted successfully.');

        return redirect(route('ph-solo-atributo-plantas.index'));
    }

    /**
     * @return array
     */
    public function validateForm(Request $request, PhSoloAtributoPlanta $model = null): array
    {

        $rules = PhSoloAtributoPlanta::rules();

        return $request->validate($rules, [], PhSoloAtributoPlanta::attributeLabels());
    }
}
