<?php

namespace App\Http\Controllers;

use App\DataTables\PhSoloAtributoDataTable;
use Illuminate\Http\Request;
//use App\Http\Requests\CreatePhSoloAtributoRequest;
//use App\Http\Requests\UpdatePhSoloAtributoRequest;
use App\Models\PhSoloAtributo;
//use Flash;
//use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;

class PhSoloAtributoController extends Controller
{
    /**
     * Display a listing of the PhSoloAtributo.
     *
     * @param PhSoloAtributoDataTable $phSoloAtributoDataTable
     * @return Response
     */
    public function index(PhSoloAtributoDataTable $phSoloAtributoDataTable)
    {
        return $phSoloAtributoDataTable->render('ph_solo_atributos.index');
    }

    /**
     * Show the form for creating a new PhSoloAtributo.
     *
     * @return Response
     */
    public function create()
    {
        $phSoloAtributo = new PhSoloAtributo();
        $phSoloAtributo->loadDefaultValues();
        return view('ph_solo_atributos.create', compact('phSoloAtributo'));
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

        if(($model = PhSoloAtributo::create($validatedAttributes)) ) {
            //flash(Ph Solo Atributo saved successfully.');
            //Flash::success('Ph Solo Atributo saved successfully.');
            return redirect(route('ph-solo-atributos.show', $model));
        }else
            return redirect()->back();
    }

    /**
     * Display the specified PhSoloAtributo.
     *
     * @param  PhSoloAtributo  $phSoloAtributo
     * @return Response
     */
    public function show(PhSoloAtributo $phSoloAtributo)
    {
        return view('ph_solo_atributos.show', compact('phSoloAtributo'));
    }

    /**
     * Show the form for editing the specified PhSoloAtributo.
     *
     * @param  PhSoloAtributo $phSoloAtributo
     * @return Response
     */
    public function edit(PhSoloAtributo $phSoloAtributo)
    {
        return view('ph_solo_atributos.edit', compact('phSoloAtributo'));
    }

    /**
     * Update the specified PhSoloAtributo in storage.
     *
     * @param  Request  $request
     * @param  PhSoloAtributo $phSoloAtributo
     * @return Response
     */
    public function update(Request $request, PhSoloAtributo $phSoloAtributo)
    {
        $validatedAttributes = $this->validateForm($request, $phSoloAtributo);
        $phSoloAtributo->fill($validatedAttributes);
        if($phSoloAtributo->save()) {
            //flash('Ph Solo Atributo updated successfully.');
            //Flash::success('Ph Solo Atributo updated successfully.');
            return redirect(route('ph-solo-atributos.show', $phSoloAtributo));
        }else{
            return redirect()->back();
        }
    }

     /**
      * Remove the specified PhSoloAtributo from storage.
      *
      * @param  \App\Models\PhSoloAtributo  $phSoloAtributo
      * @return Response
      */
    public function destroy(PhSoloAtributo $phSoloAtributo)
    {
        $phSoloAtributo->delete();
        //Flash::success('Ph Solo Atributo deleted successfully.');

        return redirect(route('ph-solo-atributos.index'));
    }

    /**
     * @return array
     */
    public function validateForm(Request $request, PhSoloAtributo $model = null): array
    {

        $rules = PhSoloAtributo::rules();

        return $request->validate($rules, [], PhSoloAtributo::attributeLabels());
    }
}
