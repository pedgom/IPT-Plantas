<?php

namespace App\Http\Controllers;

use App\DataTables\CorSinteseAtributoDataTable;
use Illuminate\Http\Request;
//use App\Http\Requests\CreateCorSinteseAtributoRequest;
//use App\Http\Requests\UpdateCorSinteseAtributoRequest;
use App\Models\CorSinteseAtributo;
//use Flash;
//use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;

class CorSinteseAtributoController extends Controller
{
    /**
     * Display a listing of the CorSinteseAtributo.
     *
     * @param CorSinteseAtributoDataTable $corSinteseAtributoDataTable
     * @return Response
     */
    public function index(CorSinteseAtributoDataTable $corSinteseAtributoDataTable)
    {
        return $corSinteseAtributoDataTable->render('cor_sintese_atributos.index');
    }

    /**
     * Show the form for creating a new CorSinteseAtributo.
     *
     * @return Response
     */
    public function create()
    {
        $corSinteseAtributo = new CorSinteseAtributo();
        $corSinteseAtributo->loadDefaultValues();
        return view('cor_sintese_atributos.create', compact('corSinteseAtributo'));
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

        if(($model = CorSinteseAtributo::create($validatedAttributes)) ) {
            //flash(Cor Sintese Atributo saved successfully.');
            //Flash::success('Cor Sintese Atributo saved successfully.');
            return redirect(route('cor-sintese-atributos.show', $model));
        }else
            return redirect()->back();
    }

    /**
     * Display the specified CorSinteseAtributo.
     *
     * @param  CorSinteseAtributo  $corSinteseAtributo
     * @return Response
     */
    public function show(CorSinteseAtributo $corSinteseAtributo)
    {
        return view('cor_sintese_atributos.show', compact('corSinteseAtributo'));
    }

    /**
     * Show the form for editing the specified CorSinteseAtributo.
     *
     * @param  CorSinteseAtributo $corSinteseAtributo
     * @return Response
     */
    public function edit(CorSinteseAtributo $corSinteseAtributo)
    {
        return view('cor_sintese_atributos.edit', compact('corSinteseAtributo'));
    }

    /**
     * Update the specified CorSinteseAtributo in storage.
     *
     * @param  Request  $request
     * @param  CorSinteseAtributo $corSinteseAtributo
     * @return Response
     */
    public function update(Request $request, CorSinteseAtributo $corSinteseAtributo)
    {
        $validatedAttributes = $this->validateForm($request, $corSinteseAtributo);
        $corSinteseAtributo->fill($validatedAttributes);
        if($corSinteseAtributo->save()) {
            //flash('Cor Sintese Atributo updated successfully.');
            //Flash::success('Cor Sintese Atributo updated successfully.');
            return redirect(route('cor-sintese-atributos.show', $corSinteseAtributo));
        }else{
            return redirect()->back();
        }
    }

     /**
      * Remove the specified CorSinteseAtributo from storage.
      *
      * @param  \App\Models\CorSinteseAtributo  $corSinteseAtributo
      * @return Response
      */
    public function destroy(CorSinteseAtributo $corSinteseAtributo)
    {
        $corSinteseAtributo->delete();
        //Flash::success('Cor Sintese Atributo deleted successfully.');

        return redirect(route('cor-sintese-atributos.index'));
    }

    /**
     * @return array
     */
    public function validateForm(Request $request, CorSinteseAtributo $model = null): array
    {

        $rules = CorSinteseAtributo::rules();

        return $request->validate($rules, [], CorSinteseAtributo::attributeLabels());
    }
}
