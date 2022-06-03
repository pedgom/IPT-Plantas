<?php

namespace App\Http\Controllers;

use App\DataTables\AlturaAtributoPlantaDataTable;
use Illuminate\Http\Request;
//use App\Http\Requests\CreateAlturaAtributoPlantaRequest;
//use App\Http\Requests\UpdateAlturaAtributoPlantaRequest;
use App\Models\AlturaAtributoPlanta;
//use Flash;
//use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;

class AlturaAtributoPlantaController extends Controller
{
    /**
     * Display a listing of the AlturaAtributoPlanta.
     *
     * @param AlturaAtributoPlantaDataTable $alturaAtributoPlantaDataTable
     * @return Response
     */
    public function index(AlturaAtributoPlantaDataTable $alturaAtributoPlantaDataTable)
    {
        return $alturaAtributoPlantaDataTable->render('altura_atributo_plantas.index');
    }

    /**
     * Show the form for creating a new AlturaAtributoPlanta.
     *
     * @return Response
     */
    public function create()
    {
        $alturaAtributoPlanta = new AlturaAtributoPlanta();
        $alturaAtributoPlanta->loadDefaultValues();
        return view('altura_atributo_plantas.create', compact('alturaAtributoPlanta'));
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

        if(($model = AlturaAtributoPlanta::create($validatedAttributes)) ) {
            //flash(Altura Atributo Planta saved successfully.');
            //Flash::success('Altura Atributo Planta saved successfully.');
            return redirect(route('altura-atributo-plantas.show', $model));
        }else
            return redirect()->back();
    }

    /**
     * Display the specified AlturaAtributoPlanta.
     *
     * @param  AlturaAtributoPlanta  $alturaAtributoPlanta
     * @return Response
     */
    public function show(AlturaAtributoPlanta $alturaAtributoPlanta)
    {
        return view('altura_atributo_plantas.show', compact('alturaAtributoPlanta'));
    }

    /**
     * Show the form for editing the specified AlturaAtributoPlanta.
     *
     * @param  AlturaAtributoPlanta $alturaAtributoPlanta
     * @return Response
     */
    public function edit(AlturaAtributoPlanta $alturaAtributoPlanta)
    {
        return view('altura_atributo_plantas.edit', compact('alturaAtributoPlanta'));
    }

    /**
     * Update the specified AlturaAtributoPlanta in storage.
     *
     * @param  Request  $request
     * @param  AlturaAtributoPlanta $alturaAtributoPlanta
     * @return Response
     */
    public function update(Request $request, AlturaAtributoPlanta $alturaAtributoPlanta)
    {
        $validatedAttributes = $this->validateForm($request, $alturaAtributoPlanta);
        $alturaAtributoPlanta->fill($validatedAttributes);
        if($alturaAtributoPlanta->save()) {
            //flash('Altura Atributo Planta updated successfully.');
            //Flash::success('Altura Atributo Planta updated successfully.');
            return redirect(route('altura-atributo-plantas.show', $alturaAtributoPlanta));
        }else{
            return redirect()->back();
        }
    }

     /**
      * Remove the specified AlturaAtributoPlanta from storage.
      *
      * @param  \App\Models\AlturaAtributoPlanta  $alturaAtributoPlanta
      * @return Response
      */
    public function destroy(AlturaAtributoPlanta $alturaAtributoPlanta)
    {
        $alturaAtributoPlanta->delete();
        //Flash::success('Altura Atributo Planta deleted successfully.');

        return redirect(route('altura-atributo-plantas.index'));
    }

    /**
     * @return array
     */
    public function validateForm(Request $request, AlturaAtributoPlanta $model = null): array
    {

        $rules = AlturaAtributoPlanta::rules();

        return $request->validate($rules, [], AlturaAtributoPlanta::attributeLabels());
    }
}
