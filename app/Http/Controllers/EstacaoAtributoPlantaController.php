<?php

namespace App\Http\Controllers;

use App\DataTables\EstacaoAtributoPlantaDataTable;
use Illuminate\Http\Request;
//use App\Http\Requests\CreateEstacaoAtributoPlantaRequest;
//use App\Http\Requests\UpdateEstacaoAtributoPlantaRequest;
use App\Models\EstacaoAtributoPlanta;
//use Flash;
//use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;

class EstacaoAtributoPlantaController extends Controller
{
    /**
     * Display a listing of the EstacaoAtributoPlanta.
     *
     * @param EstacaoAtributoPlantaDataTable $estacaoAtributoPlantaDataTable
     * @return Response
     */
    public function index(EstacaoAtributoPlantaDataTable $estacaoAtributoPlantaDataTable)
    {
        return $estacaoAtributoPlantaDataTable->render('estacao_atributo_plantas.index');
    }

    /**
     * Show the form for creating a new EstacaoAtributoPlanta.
     *
     * @return Response
     */
    public function create()
    {
        $estacaoAtributoPlanta = new EstacaoAtributoPlanta();
        $estacaoAtributoPlanta->loadDefaultValues();
        return view('estacao_atributo_plantas.create', compact('estacaoAtributoPlanta'));
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

        if(($model = EstacaoAtributoPlanta::create($validatedAttributes)) ) {
            //flash(Estacao Atributo Planta saved successfully.');
            //Flash::success('Estacao Atributo Planta saved successfully.');
            return redirect(route('estacao-atributo-plantas.show', $model));
        }else
            return redirect()->back();
    }

    /**
     * Display the specified EstacaoAtributoPlanta.
     *
     * @param  EstacaoAtributoPlanta  $estacaoAtributoPlanta
     * @return Response
     */
    public function show(EstacaoAtributoPlanta $estacaoAtributoPlanta)
    {
        return view('estacao_atributo_plantas.show', compact('estacaoAtributoPlanta'));
    }

    /**
     * Show the form for editing the specified EstacaoAtributoPlanta.
     *
     * @param  EstacaoAtributoPlanta $estacaoAtributoPlanta
     * @return Response
     */
    public function edit(EstacaoAtributoPlanta $estacaoAtributoPlanta)
    {
        return view('estacao_atributo_plantas.edit', compact('estacaoAtributoPlanta'));
    }

    /**
     * Update the specified EstacaoAtributoPlanta in storage.
     *
     * @param  Request  $request
     * @param  EstacaoAtributoPlanta $estacaoAtributoPlanta
     * @return Response
     */
    public function update(Request $request, EstacaoAtributoPlanta $estacaoAtributoPlanta)
    {
        $validatedAttributes = $this->validateForm($request, $estacaoAtributoPlanta);
        $estacaoAtributoPlanta->fill($validatedAttributes);
        if($estacaoAtributoPlanta->save()) {
            //flash('Estacao Atributo Planta updated successfully.');
            //Flash::success('Estacao Atributo Planta updated successfully.');
            return redirect(route('estacao-atributo-plantas.show', $estacaoAtributoPlanta));
        }else{
            return redirect()->back();
        }
    }

     /**
      * Remove the specified EstacaoAtributoPlanta from storage.
      *
      * @param  \App\Models\EstacaoAtributoPlanta  $estacaoAtributoPlanta
      * @return Response
      */
    public function destroy(EstacaoAtributoPlanta $estacaoAtributoPlanta)
    {
        $estacaoAtributoPlanta->delete();
        //Flash::success('Estacao Atributo Planta deleted successfully.');

        return redirect(route('estacao-atributo-plantas.index'));
    }

    /**
     * @return array
     */
    public function validateForm(Request $request, EstacaoAtributoPlanta $model = null): array
    {

        $rules = EstacaoAtributoPlanta::rules();

        return $request->validate($rules, [], EstacaoAtributoPlanta::attributeLabels());
    }
}
