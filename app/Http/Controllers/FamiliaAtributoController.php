<?php

namespace App\Http\Controllers;

use App\DataTables\FamiliaAtributoDataTable;
use Illuminate\Http\Request;
//use App\Http\Requests\CreateFamiliaAtributoRequest;
//use App\Http\Requests\UpdateFamiliaAtributoRequest;
use App\Models\FamiliaAtributo;
//use Flash;
//use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;

class FamiliaAtributoController extends Controller
{
    /**
     * Display a listing of the FamiliaAtributo.
     *
     * @param FamiliaAtributoDataTable $familiaAtributoDataTable
     * @return Response
     */
    public function index(FamiliaAtributoDataTable $familiaAtributoDataTable)
    {
        return $familiaAtributoDataTable->render('familia_atributos.index');
    }

    /**
     * Show the form for creating a new FamiliaAtributo.
     *
     * @return Response
     */
    public function create()
    {
        $familiaAtributo = new FamiliaAtributo();
        $familiaAtributo->loadDefaultValues();
        return view('familia_atributos.create', compact('familiaAtributo'));
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

        if(($model = FamiliaAtributo::create($validatedAttributes)) ) {
            //flash(Familia Atributo saved successfully.');
            //Flash::success('Familia Atributo saved successfully.');
            return redirect(route('familiaAtributos.show', $model));
        }else
            return redirect()->back();
    }

    /**
     * Display the specified FamiliaAtributo.
     *
     * @param  FamiliaAtributo  $familiaAtributo
     * @return Response
     */
    public function show(FamiliaAtributo $familiaAtributo)
    {
        return view('familia_atributos.show', compact('familiaAtributo'));
    }

    /**
     * Show the form for editing the specified FamiliaAtributo.
     *
     * @param  FamiliaAtributo $familiaAtributo
     * @return Response
     */
    public function edit(FamiliaAtributo $familiaAtributo)
    {
        return view('familia_atributos.edit', compact('familiaAtributo'));
    }

    /**
     * Update the specified FamiliaAtributo in storage.
     *
     * @param  Request  $request
     * @param  FamiliaAtributo $familiaAtributo
     * @return Response
     */
    public function update(Request $request, FamiliaAtributo $familiaAtributo)
    {
        $validatedAttributes = $this->validateForm($request, $familiaAtributo);
        $familiaAtributo->fill($validatedAttributes);
        if($familiaAtributo->save()) {
            //flash('Familia Atributo updated successfully.');
            //Flash::success('Familia Atributo updated successfully.');
            return redirect(route('familia-atributos.show', $familiaAtributo));
        }else{
            return redirect()->back();
        }
    }

     /**
      * Remove the specified FamiliaAtributo from storage.
      *
      * @param  \App\Models\FamiliaAtributo  $familiaAtributo
      * @return Response
      */
    public function destroy(FamiliaAtributo $familiaAtributo)
    {
        $familiaAtributo->delete();
        //Flash::success('Familia Atributo deleted successfully.');

        return redirect(route('familia-atributos.index'));
    }

    /**
     * @return array
     */
    public function validateForm(Request $request, FamiliaAtributo $model = null): array
    {

        $rules = FamiliaAtributo::rules();

        return $request->validate($rules, [], FamiliaAtributo::attributeLabels());
    }
}
