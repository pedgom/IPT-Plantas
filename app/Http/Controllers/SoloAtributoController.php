<?php

namespace App\Http\Controllers;

use App\DataTables\SoloAtributoDataTable;
use Illuminate\Http\Request;
//use App\Http\Requests\CreateSoloAtributoRequest;
//use App\Http\Requests\UpdateSoloAtributoRequest;
use App\Models\SoloAtributo;
//use Flash;
//use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;

class SoloAtributoController extends Controller
{
    /**
     * Display a listing of the SoloAtributo.
     *
     * @param SoloAtributoDataTable $soloAtributoDataTable
     * @return Response
     */
    public function index(SoloAtributoDataTable $soloAtributoDataTable)
    {
        return $soloAtributoDataTable->render('solo_atributos.index');
    }

    /**
     * Show the form for creating a new SoloAtributo.
     *
     * @return Response
     */
    public function create()
    {
        $soloAtributo = new SoloAtributo();
        $soloAtributo->loadDefaultValues();
        return view('solo_atributos.create', compact('soloAtributo'));
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

        if(($model = SoloAtributo::create($validatedAttributes)) ) {
            //flash(Solo Atributo saved successfully.');
            //Flash::success('Solo Atributo saved successfully.');
            return redirect(route('solo-atributos.show', $model));
        }else
            return redirect()->back();
    }

    /**
     * Display the specified SoloAtributo.
     *
     * @param  SoloAtributo  $soloAtributo
     * @return Response
     */
    public function show(SoloAtributo $soloAtributo)
    {
        return view('solo_atributos.show', compact('soloAtributo'));
    }

    /**
     * Show the form for editing the specified SoloAtributo.
     *
     * @param  SoloAtributo $soloAtributo
     * @return Response
     */
    public function edit(SoloAtributo $soloAtributo)
    {
        return view('solo_atributos.edit', compact('soloAtributo'));
    }

    /**
     * Update the specified SoloAtributo in storage.
     *
     * @param  Request  $request
     * @param  SoloAtributo $soloAtributo
     * @return Response
     */
    public function update(Request $request, SoloAtributo $soloAtributo)
    {
        $validatedAttributes = $this->validateForm($request, $soloAtributo);
        $soloAtributo->fill($validatedAttributes);
        if($soloAtributo->save()) {
            //flash('Solo Atributo updated successfully.');
            //Flash::success('Solo Atributo updated successfully.');
            return redirect(route('solo-atributos.show', $soloAtributo));
        }else{
            return redirect()->back();
        }
    }

     /**
      * Remove the specified SoloAtributo from storage.
      *
      * @param  \App\Models\SoloAtributo  $soloAtributo
      * @return Response
      */
    public function destroy(SoloAtributo $soloAtributo)
    {
        $soloAtributo->delete();
        //Flash::success('Solo Atributo deleted successfully.');

        return redirect(route('solo-atributos.index'));
    }

    /**
     * @return array
     */
    public function validateForm(Request $request, SoloAtributo $model = null): array
    {

        $rules = SoloAtributo::rules();

        return $request->validate($rules, [], SoloAtributo::attributeLabels());
    }
}
