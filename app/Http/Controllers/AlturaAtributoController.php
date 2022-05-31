<?php

namespace App\Http\Controllers;

use App\DataTables\AlturaAtributoDataTable;
use Illuminate\Http\Request;
//use App\Http\Requests\CreateAlturaAtributoRequest;
//use App\Http\Requests\UpdateAlturaAtributoRequest;
use App\Models\AlturaAtributo;
//use Flash;
//use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;

class AlturaAtributoController extends Controller
{
    /**
     * Display a listing of the AlturaAtributo.
     *
     * @param AlturaAtributoDataTable $alturaAtributoDataTable
     * @return Response
     */
    public function index(AlturaAtributoDataTable $alturaAtributoDataTable)
    {
        return $alturaAtributoDataTable->render('altura_atributos.index');
    }

    /**
     * Show the form for creating a new AlturaAtributo.
     *
     * @return Response
     */
    public function create()
    {
        $alturaAtributo = new AlturaAtributo();
        $alturaAtributo->loadDefaultValues();
        return view('altura_atributos.create', compact('alturaAtributo'));
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

        if(($model = AlturaAtributo::create($validatedAttributes)) ) {
            //flash(Altura Atributo saved successfully.');
            //Flash::success('Altura Atributo saved successfully.');
            return redirect(route('altura-atributos.show', $model));
        }else
            return redirect()->back();
    }

    /**
     * Display the specified AlturaAtributo.
     *
     * @param  AlturaAtributo  $alturaAtributo
     * @return Response
     */
    public function show(AlturaAtributo $alturaAtributo)
    {
        return view('altura_atributos.show', compact('alturaAtributo'));
    }

    /**
     * Show the form for editing the specified AlturaAtributo.
     *
     * @param  AlturaAtributo $alturaAtributo
     * @return Response
     */
    public function edit(AlturaAtributo $alturaAtributo)
    {
        return view('altura_atributos.edit', compact('alturaAtributo'));
    }

    /**
     * Update the specified AlturaAtributo in storage.
     *
     * @param  Request  $request
     * @param  AlturaAtributo $alturaAtributo
     * @return Response
     */
    public function update(Request $request, AlturaAtributo $alturaAtributo)
    {
        $validatedAttributes = $this->validateForm($request, $alturaAtributo);
        $alturaAtributo->fill($validatedAttributes);
        if($alturaAtributo->save()) {
            //flash('Altura Atributo updated successfully.');
            //Flash::success('Altura Atributo updated successfully.');
            return redirect(route('altura-atributos.show', $alturaAtributo));
        }else{
            return redirect()->back();
        }
    }

     /**
      * Remove the specified AlturaAtributo from storage.
      *
      * @param  \App\Models\AlturaAtributo  $alturaAtributo
      * @return Response
      */
    public function destroy(AlturaAtributo $alturaAtributo)
    {
        $alturaAtributo->delete();
        //Flash::success('Altura Atributo deleted successfully.');

        return redirect(route('altura-atributos.index'));
    }

    /**
     * @return array
     */
    public function validateForm(Request $request, AlturaAtributo $model = null): array
    {

        $rules = AlturaAtributo::rules();

        return $request->validate($rules, [], AlturaAtributo::attributeLabels());
    }
}
