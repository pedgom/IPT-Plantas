<?php

namespace App\Http\Controllers;

use App\DataTables\SoloAtributoPlantaDataTable;
use Illuminate\Http\Request;
//use App\Http\Requests\CreateSoloAtributoPlantaRequest;
//use App\Http\Requests\UpdateSoloAtributoPlantaRequest;
use App\Models\SoloAtributoPlanta;
//use Flash;
//use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;

class SoloAtributoPlantaController extends Controller
{
    /**
     * Display a listing of the SoloAtributoPlanta.
     *
     * @param SoloAtributoPlantaDataTable $soloAtributoPlantaDataTable
     * @return Response
     */
    public function index(SoloAtributoPlantaDataTable $soloAtributoPlantaDataTable)
    {
        return $soloAtributoPlantaDataTable->render('solo_atributo_plantas.index');
    }

    /**
     * Show the form for creating a new SoloAtributoPlanta.
     *
     * @return Response
     */
    public function create()
    {
        $soloAtributoPlanta = new SoloAtributoPlanta();
        $soloAtributoPlanta->loadDefaultValues();
        return view('solo_atributo_plantas.create', compact('soloAtributoPlanta'));
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

        if(($model = SoloAtributoPlanta::create($validatedAttributes)) ) {
            //flash(Solo Atributo Planta saved successfully.');
            //Flash::success('Solo Atributo Planta saved successfully.');
            return redirect(route('solo-atributo-plantas.show', $model));
        }else
            return redirect()->back();
    }

    /**
     * Display the specified SoloAtributoPlanta.
     *
     * @param  SoloAtributoPlanta  $soloAtributoPlanta
     * @return Response
     */
    public function show(SoloAtributoPlanta $soloAtributoPlanta)
    {
        return view('solo_atributo_plantas.show', compact('soloAtributoPlanta'));
    }

    /**
     * Show the form for editing the specified SoloAtributoPlanta.
     *
     * @param  SoloAtributoPlanta $soloAtributoPlanta
     * @return Response
     */
    public function edit(SoloAtributoPlanta $soloAtributoPlanta)
    {
        return view('solo_atributo_plantas.edit', compact('soloAtributoPlanta'));
    }

    /**
     * Update the specified SoloAtributoPlanta in storage.
     *
     * @param  Request  $request
     * @param  SoloAtributoPlanta $soloAtributoPlanta
     * @return Response
     */
    public function update(Request $request, SoloAtributoPlanta $soloAtributoPlanta)
    {
        $validatedAttributes = $this->validateForm($request, $soloAtributoPlanta);
        $soloAtributoPlanta->fill($validatedAttributes);
        if($soloAtributoPlanta->save()) {
            //flash('Solo Atributo Planta updated successfully.');
            //Flash::success('Solo Atributo Planta updated successfully.');
            return redirect(route('solo-atributo-plantas.show', $soloAtributoPlanta));
        }else{
            return redirect()->back();
        }
    }

     /**
      * Remove the specified SoloAtributoPlanta from storage.
      *
      * @param  \App\Models\SoloAtributoPlanta  $soloAtributoPlanta
      * @return Response
      */
    public function destroy(SoloAtributoPlanta $soloAtributoPlanta)
    {
        $soloAtributoPlanta->delete();
        //Flash::success('Solo Atributo Planta deleted successfully.');

        return redirect(route('solo-atributo-plantas.index'));
    }

    /**
     * @return array
     */
    public function validateForm(Request $request, SoloAtributoPlanta $model = null): array
    {

        $rules = SoloAtributoPlanta::rules();

        return $request->validate($rules, [], SoloAtributoPlanta::attributeLabels());
    }
}
