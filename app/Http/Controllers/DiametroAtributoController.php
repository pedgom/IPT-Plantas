<?php

namespace App\Http\Controllers;

use App\DataTables\DiametroAtributoDataTable;
use Illuminate\Http\Request;
//use App\Http\Requests\CreateDiametroAtributoRequest;
//use App\Http\Requests\UpdateDiametroAtributoRequest;
use App\Models\DiametroAtributo;
//use Flash;
//use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;

class DiametroAtributoController extends Controller
{
    /**
     * Display a listing of the DiametroAtributo.
     *
     * @param DiametroAtributoDataTable $diametroAtributoDataTable
     * @return Response
     */
    public function index(DiametroAtributoDataTable $diametroAtributoDataTable)
    {
        return $diametroAtributoDataTable->render('diametro_atributos.index');
    }

    /**
     * Show the form for creating a new DiametroAtributo.
     *
     * @return Response
     */
    public function create()
    {
        $diametroAtributo = new DiametroAtributo();
        $diametroAtributo->loadDefaultValues();
        return view('diametro_atributos.create', compact('diametroAtributo'));
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

        if(($model = DiametroAtributo::create($validatedAttributes)) ) {
            //flash(Diametro Atributo saved successfully.');
            //Flash::success('Diametro Atributo saved successfully.');
            return redirect(route('diametro-atributos.show', $model));
        }else
            return redirect()->back();
    }

    /**
     * Display the specified DiametroAtributo.
     *
     * @param  DiametroAtributo  $diametroAtributo
     * @return Response
     */
    public function show(DiametroAtributo $diametroAtributo)
    {
        return view('diametro_atributos.show', compact('diametroAtributo'));
    }

    /**
     * Show the form for editing the specified DiametroAtributo.
     *
     * @param  DiametroAtributo $diametroAtributo
     * @return Response
     */
    public function edit(DiametroAtributo $diametroAtributo)
    {
        return view('diametro_atributos.edit', compact('diametroAtributo'));
    }

    /**
     * Update the specified DiametroAtributo in storage.
     *
     * @param  Request  $request
     * @param  DiametroAtributo $diametroAtributo
     * @return Response
     */
    public function update(Request $request, DiametroAtributo $diametroAtributo)
    {
        $validatedAttributes = $this->validateForm($request, $diametroAtributo);
        $diametroAtributo->fill($validatedAttributes);
        if($diametroAtributo->save()) {
            //flash('Diametro Atributo updated successfully.');
            //Flash::success('Diametro Atributo updated successfully.');
            return redirect(route('diametro-atributos.show', $diametroAtributo));
        }else{
            return redirect()->back();
        }
    }

     /**
      * Remove the specified DiametroAtributo from storage.
      *
      * @param  \App\Models\DiametroAtributo  $diametroAtributo
      * @return Response
      */
    public function destroy(DiametroAtributo $diametroAtributo)
    {
        $diametroAtributo->delete();
        //Flash::success('Diametro Atributo deleted successfully.');

        return redirect(route('diametro-atributos.index'));
    }

    /**
     * @return array
     */
    public function validateForm(Request $request, DiametroAtributo $model = null): array
    {

        $rules = DiametroAtributo::rules();

        return $request->validate($rules, [], DiametroAtributo::attributeLabels());
    }
}
