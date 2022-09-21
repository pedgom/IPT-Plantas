<?php

namespace App\Http\Controllers;

use App\DataTables\PersistenciaAtributoDataTable;
use Illuminate\Http\Request;
//use App\Http\Requests\CreatePersistenciaAtributoRequest;
//use App\Http\Requests\UpdatePersistenciaAtributoRequest;
use App\Models\PersistenciaAtributo;
//use Flash;
//use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;

class PersistenciaAtributoController extends Controller
{
    /**
     * Display a listing of the PersistenciaAtributo.
     *
     * @param PersistenciaAtributoDataTable $persistenciaAtributoDataTable
     * @return Response
     */
    public function index(PersistenciaAtributoDataTable $persistenciaAtributoDataTable)
    {
        return $persistenciaAtributoDataTable->render('persistencia_atributos.index');
    }

    /**
     * Show the form for creating a new PersistenciaAtributo.
     *
     * @return Response
     */
    public function create()
    {
        $persistenciaAtributo = new PersistenciaAtributo();
        $persistenciaAtributo->loadDefaultValues();
        return view('persistencia_atributos.create', compact('persistenciaAtributo'));
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

        if(($model = PersistenciaAtributo::create($validatedAttributes)) ) {
            //flash(Persistencia Atributo saved successfully.');
            //Flash::success('Persistencia Atributo saved successfully.');
            return redirect(route('persistenciaAtributos.show', $model));
        }else
            return redirect()->back();
    }

    /**
     * Display the specified PersistenciaAtributo.
     *
     * @param  PersistenciaAtributo  $persistenciaAtributo
     * @return Response
     */
    public function show(PersistenciaAtributo $persistenciaAtributo)
    {
        return view('persistencia_atributos.show', compact('persistenciaAtributo'));
    }

    /**
     * Show the form for editing the specified PersistenciaAtributo.
     *
     * @param  PersistenciaAtributo $persistenciaAtributo
     * @return Response
     */
    public function edit(PersistenciaAtributo $persistenciaAtributo)
    {
        return view('persistencia_atributos.edit', compact('persistenciaAtributo'));
    }

    /**
     * Update the specified PersistenciaAtributo in storage.
     *
     * @param  Request  $request
     * @param  PersistenciaAtributo $persistenciaAtributo
     * @return Response
     */
    public function update(Request $request, PersistenciaAtributo $persistenciaAtributo)
    {
        $validatedAttributes = $this->validateForm($request, $persistenciaAtributo);
        $persistenciaAtributo->fill($validatedAttributes);
        if($persistenciaAtributo->save()) {
            //flash('Persistencia Atributo updated successfully.');
            //Flash::success('Persistencia Atributo updated successfully.');
            return redirect(route('persistenciaAtributos.show', $persistenciaAtributo));
        }else{
            return redirect()->back();
        }
    }

     /**
      * Remove the specified PersistenciaAtributo from storage.
      *
      * @param  \App\Models\PersistenciaAtributo  $persistenciaAtributo
      * @return Response
      */
    public function destroy(PersistenciaAtributo $persistenciaAtributo)
    {
        $persistenciaAtributo->delete();
        //Flash::success('Persistencia Atributo deleted successfully.');

        return redirect(route('persistenciaAtributos.index'));
    }

    /**
     * @return array
     */
    public function validateForm(Request $request, PersistenciaAtributo $model = null): array
    {

        $rules = PersistenciaAtributo::rules();

        return $request->validate($rules, [], PersistenciaAtributo::attributeLabels());
    }
}
