<?php

namespace App\Http\Controllers;

use App\DataTables\EspecieQuercusAtributoDataTable;
use Illuminate\Http\Request;
//use App\Http\Requests\CreateEspecieQuercusAtributoRequest;
//use App\Http\Requests\UpdateEspecieQuercusAtributoRequest;
use App\Models\EspecieQuercusAtributo;
//use Flash;
//use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;

class EspecieQuercusAtributoController extends Controller
{
    /**
     * Display a listing of the EspecieQuercusAtributo.
     *
     * @param EspecieQuercusAtributoDataTable $especieQuercusAtributoDataTable
     * @return Response
     */
    public function index(EspecieQuercusAtributoDataTable $especieQuercusAtributoDataTable)
    {
        return $especieQuercusAtributoDataTable->render('especie_quercus_atributos.index');
    }

    /**
     * Show the form for creating a new EspecieQuercusAtributo.
     *
     * @return Response
     */
    public function create()
    {
        $especieQuercusAtributo = new EspecieQuercusAtributo();
        $especieQuercusAtributo->loadDefaultValues();
        return view('especie_quercus_atributos.create', compact('especieQuercusAtributo'));
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

        if(($model = EspecieQuercusAtributo::create($validatedAttributes)) ) {
            //flash(Especie Quercus Atributo saved successfully.');
            //Flash::success('Especie Quercus Atributo saved successfully.');
            return redirect(route('especie-quercus-atributos.show', $model));
        }else
            return redirect()->back();
    }

    /**
     * Display the specified EspecieQuercusAtributo.
     *
     * @param  EspecieQuercusAtributo  $especieQuercusAtributo
     * @return Response
     */
    public function show(EspecieQuercusAtributo $especieQuercusAtributo)
    {
        return view('especie_quercus_atributos.show', compact('especieQuercusAtributo'));
    }

    /**
     * Show the form for editing the specified EspecieQuercusAtributo.
     *
     * @param  EspecieQuercusAtributo $especieQuercusAtributo
     * @return Response
     */
    public function edit(EspecieQuercusAtributo $especieQuercusAtributo)
    {
        return view('especie_quercus_atributos.edit', compact('especieQuercusAtributo'));
    }

    /**
     * Update the specified EspecieQuercusAtributo in storage.
     *
     * @param  Request  $request
     * @param  EspecieQuercusAtributo $especieQuercusAtributo
     * @return Response
     */
    public function update(Request $request, EspecieQuercusAtributo $especieQuercusAtributo)
    {
        $validatedAttributes = $this->validateForm($request, $especieQuercusAtributo);
        $especieQuercusAtributo->fill($validatedAttributes);
        if($especieQuercusAtributo->save()) {
            //flash('Especie Quercus Atributo updated successfully.');
            //Flash::success('Especie Quercus Atributo updated successfully.');
            return redirect(route('especie-quercus-atributos.show', $especieQuercusAtributo));
        }else{
            return redirect()->back();
        }
    }

     /**
      * Remove the specified EspecieQuercusAtributo from storage.
      *
      * @param  \App\Models\EspecieQuercusAtributo  $especieQuercusAtributo
      * @return Response
      */
    public function destroy(EspecieQuercusAtributo $especieQuercusAtributo)
    {
        $especieQuercusAtributo->delete();
        //Flash::success('Especie Quercus Atributo deleted successfully.');

        return redirect(route('especie-quercus-atributos.index'));
    }

    /**
     * @return array
     */
    public function validateForm(Request $request, EspecieQuercusAtributo $model = null): array
    {

        $rules = EspecieQuercusAtributo::rules();

        return $request->validate($rules, [], EspecieQuercusAtributo::attributeLabels());
    }
}
