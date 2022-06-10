<?php

namespace App\Http\Controllers;

use App\DataTables\DensidadeAtributoPlantaDataTable;
use Illuminate\Http\Request;
//use App\Http\Requests\CreateDensidadeAtributoPlantaRequest;
//use App\Http\Requests\UpdateDensidadeAtributoPlantaRequest;
use App\Models\DensidadeAtributoPlanta;
//use Flash;
//use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;

class DensidadeAtributoPlantaController extends Controller
{
    /**
     * Display a listing of the DensidadeAtributoPlanta.
     *
     * @param DensidadeAtributoPlantaDataTable $densidadeAtributoPlantaDataTable
     * @return Response
     */
    public function index(DensidadeAtributoPlantaDataTable $densidadeAtributoPlantaDataTable)
    {
        return $densidadeAtributoPlantaDataTable->render('densidade_atributo_plantas.index');
    }

    /**
     * Show the form for creating a new DensidadeAtributoPlanta.
     *
     * @return Response
     */
    public function create()
    {
        $densidadeAtributoPlanta = new DensidadeAtributoPlanta();
        $densidadeAtributoPlanta->loadDefaultValues();
        return view('densidade_atributo_plantas.create', compact('densidadeAtributoPlanta'));
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

        if(($model = DensidadeAtributoPlanta::create($validatedAttributes)) ) {
            //flash(Densidade Atributo Planta saved successfully.');
            //Flash::success('Densidade Atributo Planta saved successfully.');
            return redirect(route('densidade-atributo-plantas.show', $model));
        }else
            return redirect()->back();
    }

    /**
     * Display the specified DensidadeAtributoPlanta.
     *
     * @param  DensidadeAtributoPlanta  $densidadeAtributoPlanta
     * @return Response
     */
    public function show(DensidadeAtributoPlanta $densidadeAtributoPlanta)
    {
        return view('densidade_atributo_plantas.show', compact('densidadeAtributoPlanta'));
    }

    /**
     * Show the form for editing the specified DensidadeAtributoPlanta.
     *
     * @param  DensidadeAtributoPlanta $densidadeAtributoPlanta
     * @return Response
     */
    public function edit(DensidadeAtributoPlanta $densidadeAtributoPlanta)
    {
        return view('densidade_atributo_plantas.edit', compact('densidadeAtributoPlanta'));
    }

    /**
     * Update the specified DensidadeAtributoPlanta in storage.
     *
     * @param  Request  $request
     * @param  DensidadeAtributoPlanta $densidadeAtributoPlanta
     * @return Response
     */
    public function update(Request $request, DensidadeAtributoPlanta $densidadeAtributoPlanta)
    {
        $validatedAttributes = $this->validateForm($request, $densidadeAtributoPlanta);
        $densidadeAtributoPlanta->fill($validatedAttributes);
        if($densidadeAtributoPlanta->save()) {
            //flash('Densidade Atributo Planta updated successfully.');
            //Flash::success('Densidade Atributo Planta updated successfully.');
            return redirect(route('densidade-atributo-plantas.show', $densidadeAtributoPlanta));
        }else{
            return redirect()->back();
        }
    }

     /**
      * Remove the specified DensidadeAtributoPlanta from storage.
      *
      * @param  \App\Models\DensidadeAtributoPlanta  $densidadeAtributoPlanta
      * @return Response
      */
    public function destroy(DensidadeAtributoPlanta $densidadeAtributoPlanta)
    {
        $densidadeAtributoPlanta->delete();
        //Flash::success('Densidade Atributo Planta deleted successfully.');

        return redirect(route('densidade-atributo-plantas.index'));
    }

    /**
     * @return array
     */
    public function validateForm(Request $request, DensidadeAtributoPlanta $model = null): array
    {

        $rules = DensidadeAtributoPlanta::rules();

        return $request->validate($rules, [], DensidadeAtributoPlanta::attributeLabels());
    }
}
