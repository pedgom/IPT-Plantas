<?php

namespace App\Http\Controllers;

use App\DataTables\DiametroAtributoPlantaDataTable;
use Illuminate\Http\Request;
//use App\Http\Requests\CreateDiametroAtributoPlantaRequest;
//use App\Http\Requests\UpdateDiametroAtributoPlantaRequest;
use App\Models\DiametroAtributoPlanta;
//use Flash;
//use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;

class DiametroAtributoPlantaController extends Controller
{
    /**
     * Display a listing of the DiametroAtributoPlanta.
     *
     * @param DiametroAtributoPlantaDataTable $diametroAtributoPlantaDataTable
     * @return Response
     */
    public function index(DiametroAtributoPlantaDataTable $diametroAtributoPlantaDataTable)
    {
        return $diametroAtributoPlantaDataTable->render('diametro_atributo_plantas.index');
    }

    /**
     * Show the form for creating a new DiametroAtributoPlanta.
     *
     * @return Response
     */
    public function create()
    {
        $diametroAtributoPlanta = new DiametroAtributoPlanta();
        $diametroAtributoPlanta->loadDefaultValues();
        return view('diametro_atributo_plantas.create', compact('diametroAtributoPlanta'));
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

        if(($model = DiametroAtributoPlanta::create($validatedAttributes)) ) {
            //flash(Diametro Atributo Planta saved successfully.');
            //Flash::success('Diametro Atributo Planta saved successfully.');
            return redirect(route('diametro-atributo-plantas.show', $model));
        }else
            return redirect()->back();
    }

    /**
     * Display the specified DiametroAtributoPlanta.
     *
     * @param  DiametroAtributoPlanta  $diametroAtributoPlanta
     * @return Response
     */
    public function show(DiametroAtributoPlanta $diametroAtributoPlanta)
    {
        return view('diametro_atributo_plantas.show', compact('diametroAtributoPlanta'));
    }

    /**
     * Show the form for editing the specified DiametroAtributoPlanta.
     *
     * @param  DiametroAtributoPlanta $diametroAtributoPlanta
     * @return Response
     */
    public function edit(DiametroAtributoPlanta $diametroAtributoPlanta)
    {
        return view('diametro_atributo_plantas.edit', compact('diametroAtributoPlanta'));
    }

    /**
     * Update the specified DiametroAtributoPlanta in storage.
     *
     * @param  Request  $request
     * @param  DiametroAtributoPlanta $diametroAtributoPlanta
     * @return Response
     */
    public function update(Request $request, DiametroAtributoPlanta $diametroAtributoPlanta)
    {
        $validatedAttributes = $this->validateForm($request, $diametroAtributoPlanta);
        $diametroAtributoPlanta->fill($validatedAttributes);
        if($diametroAtributoPlanta->save()) {
            //flash('Diametro Atributo Planta updated successfully.');
            //Flash::success('Diametro Atributo Planta updated successfully.');
            return redirect(route('diametro-atributo-plantas.show', $diametroAtributoPlanta));
        }else{
            return redirect()->back();
        }
    }

     /**
      * Remove the specified DiametroAtributoPlanta from storage.
      *
      * @param  \App\Models\DiametroAtributoPlanta  $diametroAtributoPlanta
      * @return Response
      */
    public function destroy(DiametroAtributoPlanta $diametroAtributoPlanta)
    {
        $diametroAtributoPlanta->delete();
        //Flash::success('Diametro Atributo Planta deleted successfully.');

        return redirect(route('diametro-atributo-plantas.index'));
    }

    /**
     * @return array
     */
    public function validateForm(Request $request, DiametroAtributoPlanta $model = null): array
    {

        $rules = DiametroAtributoPlanta::rules();

        return $request->validate($rules, [], DiametroAtributoPlanta::attributeLabels());
    }
}
