<?php

namespace App\Http\Controllers;

use App\DataTables\PlantaDataTable;
use Illuminate\Http\Request;
//use App\Http\Requests\CreatePlantaRequest;
//use App\Http\Requests\UpdatePlantaRequest;
use App\Models\Planta;
//use Flash;
//use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;

class PlantaController extends Controller
{
    /**
     * Display a listing of the Planta.
     *
     * @param PlantaDataTable $plantaDataTable
     * @return Response
     */
    public function index(PlantaDataTable $plantaDataTable)
    {
        return $plantaDataTable->render('plantas.index');
    }

    /**
     * Show the form for creating a new Planta.
     *
     * @return Response
     */
    public function create()
    {
        $planta = new Planta();
        $planta->loadDefaultValues();
        return view('plantas.create', compact('planta'));
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

        if(($model = Planta::create($validatedAttributes)) ) {
            //flash(Planta saved successfully.');
            //Flash::success('Planta saved successfully.');
            return redirect(route('plantas.show', $model));
        }else
            return redirect()->back();
    }

    /**
     * Display the specified Planta.
     *
     * @param  Planta  $planta
     * @return Response
     */
    public function show(Planta $planta)
    {
        return view('plantas.show', compact('planta'));
    }

    /**
     * Show the form for editing the specified Planta.
     *
     * @param  Planta $planta
     * @return Response
     */
    public function edit(Planta $planta)
    {
        return view('plantas.edit', compact('planta'));
    }

    /**
     * Update the specified Planta in storage.
     *
     * @param  Request  $request
     * @param  Planta $planta
     * @return Response
     */
    public function update(Request $request, Planta $planta)
    {
        $validatedAttributes = $this->validateForm($request, $planta);
        $planta->fill($validatedAttributes);
        if($planta->save()) {
            //flash('Planta updated successfully.');
            //Flash::success('Planta updated successfully.');
            return redirect(route('plantas.show', $planta));
        }else{
            return redirect()->back();
        }
    }

     /**
      * Remove the specified Planta from storage.
      *
      * @param  \App\Models\Planta  $planta
      * @return Response
      */
    public function destroy(Planta $planta)
    {
        $planta->delete();
        //Flash::success('Planta deleted successfully.');

        return redirect(route('plantas.index'));
    }

    /**
     * @return array
     */
    public function validateForm(Request $request, Planta $model = null): array
    {

        $rules = Planta::rules();

        return $request->validate($rules, [], Planta::attributeLabels());
    }
}
