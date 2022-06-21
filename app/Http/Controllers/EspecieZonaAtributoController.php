<?php

namespace App\Http\Controllers;

use App\DataTables\EspecieZonaAtributoDataTable;
use Illuminate\Http\Request;
//use App\Http\Requests\CreateEspecieZonaAtributoRequest;
//use App\Http\Requests\UpdateEspecieZonaAtributoRequest;
use App\Models\EspecieZonaAtributo;
//use Flash;
//use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;

class EspecieZonaAtributoController extends Controller
{
    /**
     * Display a listing of the EspecieZonaAtributo.
     *
     * @param EspecieZonaAtributoDataTable $especieZonaAtributoDataTable
     * @return Response
     */
    public function index(EspecieZonaAtributoDataTable $especieZonaAtributoDataTable)
    {
        return $especieZonaAtributoDataTable->render('especie_zona_atributos.index');
    }

    /**
     * Show the form for creating a new EspecieZonaAtributo.
     *
     * @return Response
     */
    public function create()
    {
        $especieZonaAtributo = new EspecieZonaAtributo();
        $especieZonaAtributo->loadDefaultValues();
        return view('especie_zona_atributos.create', compact('especieZonaAtributo'));
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

        if(($model = EspecieZonaAtributo::create($validatedAttributes)) ) {
            //flash(Especie Zona Atributo saved successfully.');
            //Flash::success('Especie Zona Atributo saved successfully.');
            return redirect(route('especie-zona-atributos.show', $model));
        }else
            return redirect()->back();
    }

    /**
     * Display the specified EspecieZonaAtributo.
     *
     * @param  EspecieZonaAtributo  $especieZonaAtributo
     * @return Response
     */
    public function show(EspecieZonaAtributo $especieZonaAtributo)
    {
        return view('especie_zona_atributos.show', compact('especieZonaAtributo'));
    }

    /**
     * Show the form for editing the specified EspecieZonaAtributo.
     *
     * @param  EspecieZonaAtributo $especieZonaAtributo
     * @return Response
     */
    public function edit(EspecieZonaAtributo $especieZonaAtributo)
    {
        return view('especie_zona_atributos.edit', compact('especieZonaAtributo'));
    }

    /**
     * Update the specified EspecieZonaAtributo in storage.
     *
     * @param  Request  $request
     * @param  EspecieZonaAtributo $especieZonaAtributo
     * @return Response
     */
    public function update(Request $request, EspecieZonaAtributo $especieZonaAtributo)
    {
        $validatedAttributes = $this->validateForm($request, $especieZonaAtributo);
        $especieZonaAtributo->fill($validatedAttributes);
        if($especieZonaAtributo->save()) {
            //flash('Especie Zona Atributo updated successfully.');
            //Flash::success('Especie Zona Atributo updated successfully.');
            return redirect(route('especie-zona-atributos.show', $especieZonaAtributo));
        }else{
            return redirect()->back();
        }
    }

     /**
      * Remove the specified EspecieZonaAtributo from storage.
      *
      * @param  \App\Models\EspecieZonaAtributo  $especieZonaAtributo
      * @return Response
      */
    public function destroy(EspecieZonaAtributo $especieZonaAtributo)
    {
        $especieZonaAtributo->delete();
        //Flash::success('Especie Zona Atributo deleted successfully.');

        return redirect(route('especie-zona-atributos.index'));
    }

    /**
     * @return array
     */
    public function validateForm(Request $request, EspecieZonaAtributo $model = null): array
    {

        $rules = EspecieZonaAtributo::rules();

        return $request->validate($rules, [], EspecieZonaAtributo::attributeLabels());
    }
}
