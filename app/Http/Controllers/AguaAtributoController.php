<?php

namespace App\Http\Controllers;

use App\DataTables\AguaAtributoDataTable;
use Illuminate\Http\Request;
//use App\Http\Requests\CreateAguaAtributoRequest;
//use App\Http\Requests\UpdateAguaAtributoRequest;
use App\Models\AguaAtributo;
//use Flash;
//use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;

class AguaAtributoController extends Controller
{
    /**
     * Display a listing of the AguaAtributo.
     *
     * @param AguaAtributoDataTable $aguaAtributoDataTable
     * @return Response
     */
    public function index(AguaAtributoDataTable $aguaAtributoDataTable)
    {
        return $aguaAtributoDataTable->render('agua_atributos.index');
    }

    /**
     * Show the form for creating a new AguaAtributo.
     *
     * @return Response
     */
    public function create()
    {
        $aguaAtributo = new AguaAtributo();
        $aguaAtributo->loadDefaultValues();
        return view('agua_atributos.create', compact('aguaAtributo'));
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

        if(($model = AguaAtributo::create($validatedAttributes)) ) {
            //flash(Agua Atributo saved successfully.');
            //Flash::success('Agua Atributo saved successfully.');
            return redirect(route('agua-atributos.show', $model));
        }else
            return redirect()->back();
    }

    /**
     * Display the specified AguaAtributo.
     *
     * @param  AguaAtributo  $aguaAtributo
     * @return Response
     */
    public function show(AguaAtributo $aguaAtributo)
    {
        return view('agua_atributos.show', compact('aguaAtributo'));
    }

    /**
     * Show the form for editing the specified AguaAtributo.
     *
     * @param  AguaAtributo $aguaAtributo
     * @return Response
     */
    public function edit(AguaAtributo $aguaAtributo)
    {
        return view('agua_atributos.edit', compact('aguaAtributo'));
    }

    /**
     * Update the specified AguaAtributo in storage.
     *
     * @param  Request  $request
     * @param  AguaAtributo $aguaAtributo
     * @return Response
     */
    public function update(Request $request, AguaAtributo $aguaAtributo)
    {
        $validatedAttributes = $this->validateForm($request, $aguaAtributo);
        $aguaAtributo->fill($validatedAttributes);
        if($aguaAtributo->save()) {
            //flash('Agua Atributo updated successfully.');
            //Flash::success('Agua Atributo updated successfully.');
            return redirect(route('agua-atributos.show', $aguaAtributo));
        }else{
            return redirect()->back();
        }
    }

     /**
      * Remove the specified AguaAtributo from storage.
      *
      * @param  \App\Models\AguaAtributo  $aguaAtributo
      * @return Response
      */
    public function destroy(AguaAtributo $aguaAtributo)
    {
        $aguaAtributo->delete();
        //Flash::success('Agua Atributo deleted successfully.');

        return redirect(route('agua-atributos.index'));
    }

    /**
     * @return array
     */
    public function validateForm(Request $request, AguaAtributo $model = null): array
    {

        $rules = AguaAtributo::rules();

        return $request->validate($rules, [], AguaAtributo::attributeLabels());
    }
}
