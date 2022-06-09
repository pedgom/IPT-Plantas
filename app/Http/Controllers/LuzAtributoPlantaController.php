<?php

namespace App\Http\Controllers;

use App\DataTables\LuzAtributoPlantaDataTable;
use Illuminate\Http\Request;
//use App\Http\Requests\CreateLuzAtributoPlantaRequest;
//use App\Http\Requests\UpdateLuzAtributoPlantaRequest;
use App\Models\LuzAtributoPlanta;
//use Flash;
//use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;

class LuzAtributoPlantaController extends Controller
{
    /**
     * Display a listing of the LuzAtributoPlanta.
     *
     * @param LuzAtributoPlantaDataTable $luzAtributoPlantaDataTable
     * @return Response
     */
    public function index(LuzAtributoPlantaDataTable $luzAtributoPlantaDataTable)
    {
        return $luzAtributoPlantaDataTable->render('luz_atributo_plantas.index');
    }

    /**
     * Show the form for creating a new LuzAtributoPlanta.
     *
     * @return Response
     */
    public function create()
    {
        $luzAtributoPlanta = new LuzAtributoPlanta();
        $luzAtributoPlanta->loadDefaultValues();
        return view('luz_atributo_plantas.create', compact('luzAtributoPlanta'));
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

        if(($model = LuzAtributoPlanta::create($validatedAttributes)) ) {
            //flash(Luz Atributo Planta saved successfully.');
            //Flash::success('Luz Atributo Planta saved successfully.');
            return redirect(route('luz-atributo-plantas.show', $model));
        }else
            return redirect()->back();
    }

    /**
     * Display the specified LuzAtributoPlanta.
     *
     * @param  LuzAtributoPlanta  $luzAtributoPlanta
     * @return Response
     */
    public function show(LuzAtributoPlanta $luzAtributoPlanta)
    {
        return view('luz_atributo_plantas.show', compact('luzAtributoPlanta'));
    }

    /**
     * Show the form for editing the specified LuzAtributoPlanta.
     *
     * @param  LuzAtributoPlanta $luzAtributoPlanta
     * @return Response
     */
    public function edit(LuzAtributoPlanta $luzAtributoPlanta)
    {
        return view('luz_atributo_plantas.edit', compact('luzAtributoPlanta'));
    }

    /**
     * Update the specified LuzAtributoPlanta in storage.
     *
     * @param  Request  $request
     * @param  LuzAtributoPlanta $luzAtributoPlanta
     * @return Response
     */
    public function update(Request $request, LuzAtributoPlanta $luzAtributoPlanta)
    {
        $validatedAttributes = $this->validateForm($request, $luzAtributoPlanta);
        $luzAtributoPlanta->fill($validatedAttributes);
        if($luzAtributoPlanta->save()) {
            //flash('Luz Atributo Planta updated successfully.');
            //Flash::success('Luz Atributo Planta updated successfully.');
            return redirect(route('luz-atributo-plantas.show', $luzAtributoPlanta));
        }else{
            return redirect()->back();
        }
    }

     /**
      * Remove the specified LuzAtributoPlanta from storage.
      *
      * @param  \App\Models\LuzAtributoPlanta  $luzAtributoPlanta
      * @return Response
      */
    public function destroy(LuzAtributoPlanta $luzAtributoPlanta)
    {
        $luzAtributoPlanta->delete();
        //Flash::success('Luz Atributo Planta deleted successfully.');

        return redirect(route('luz-atributo-plantas.index'));
    }

    /**
     * @return array
     */
    public function validateForm(Request $request, LuzAtributoPlanta $model = null): array
    {

        $rules = LuzAtributoPlanta::rules();

        return $request->validate($rules, [], LuzAtributoPlanta::attributeLabels());
    }
}
