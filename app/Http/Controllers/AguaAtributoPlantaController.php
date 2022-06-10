<?php

namespace App\Http\Controllers;

use App\DataTables\AguaAtributoPlantaDataTable;
use Illuminate\Http\Request;
//use App\Http\Requests\CreateAguaAtributoPlantaRequest;
//use App\Http\Requests\UpdateAguaAtributoPlantaRequest;
use App\Models\AguaAtributoPlanta;
//use Flash;
//use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;

class AguaAtributoPlantaController extends Controller
{
    /**
     * Display a listing of the AguaAtributoPlanta.
     *
     * @param AguaAtributoPlantaDataTable $aguaAtributoPlantaDataTable
     * @return Response
     */
    public function index(AguaAtributoPlantaDataTable $aguaAtributoPlantaDataTable)
    {
        return $aguaAtributoPlantaDataTable->render('agua_atributo_plantas.index');
    }

    /**
     * Show the form for creating a new AguaAtributoPlanta.
     *
     * @return Response
     */
    public function create()
    {
        $aguaAtributoPlanta = new AguaAtributoPlanta();
        $aguaAtributoPlanta->loadDefaultValues();
        return view('agua_atributo_plantas.create', compact('aguaAtributoPlanta'));
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

        if(($model = AguaAtributoPlanta::create($validatedAttributes)) ) {
            //flash(Agua Atributo Planta saved successfully.');
            //Flash::success('Agua Atributo Planta saved successfully.');
            return redirect(route('agua-atributo-plantas.show', $model));
        }else
            return redirect()->back();
    }

    /**
     * Display the specified AguaAtributoPlanta.
     *
     * @param  AguaAtributoPlanta  $aguaAtributoPlanta
     * @return Response
     */
    public function show(AguaAtributoPlanta $aguaAtributoPlanta)
    {
        return view('agua_atributo_plantas.show', compact('aguaAtributoPlanta'));
    }

    /**
     * Show the form for editing the specified AguaAtributoPlanta.
     *
     * @param  AguaAtributoPlanta $aguaAtributoPlanta
     * @return Response
     */
    public function edit(AguaAtributoPlanta $aguaAtributoPlanta)
    {
        return view('agua_atributo_plantas.edit', compact('aguaAtributoPlanta'));
    }

    /**
     * Update the specified AguaAtributoPlanta in storage.
     *
     * @param  Request  $request
     * @param  AguaAtributoPlanta $aguaAtributoPlanta
     * @return Response
     */
    public function update(Request $request, AguaAtributoPlanta $aguaAtributoPlanta)
    {
        $validatedAttributes = $this->validateForm($request, $aguaAtributoPlanta);
        $aguaAtributoPlanta->fill($validatedAttributes);
        if($aguaAtributoPlanta->save()) {
            //flash('Agua Atributo Planta updated successfully.');
            //Flash::success('Agua Atributo Planta updated successfully.');
            return redirect(route('agua-atributo-plantas.show', $aguaAtributoPlanta));
        }else{
            return redirect()->back();
        }
    }

     /**
      * Remove the specified AguaAtributoPlanta from storage.
      *
      * @param  \App\Models\AguaAtributoPlanta  $aguaAtributoPlanta
      * @return Response
      */
    public function destroy(AguaAtributoPlanta $aguaAtributoPlanta)
    {
        $aguaAtributoPlanta->delete();
        //Flash::success('Agua Atributo Planta deleted successfully.');

        return redirect(route('agua-atributo-plantas.index'));
    }

    /**
     * @return array
     */
    public function validateForm(Request $request, AguaAtributoPlanta $model = null): array
    {

        $rules = AguaAtributoPlanta::rules();

        return $request->validate($rules, [], AguaAtributoPlanta::attributeLabels());
    }
}
