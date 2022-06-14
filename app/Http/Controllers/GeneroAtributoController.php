<?php

namespace App\Http\Controllers;

use App\DataTables\GeneroAtributoDataTable;
use Illuminate\Http\Request;
//use App\Http\Requests\CreateGeneroAtributoRequest;
//use App\Http\Requests\UpdateGeneroAtributoRequest;
use App\Models\GeneroAtributo;
//use Flash;
//use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;

class GeneroAtributoController extends Controller
{
    /**
     * Display a listing of the GeneroAtributo.
     *
     * @param GeneroAtributoDataTable $generoAtributoDataTable
     * @return Response
     */
    public function index(GeneroAtributoDataTable $generoAtributoDataTable)
    {
        return $generoAtributoDataTable->render('genero_atributos.index');
    }

    /**
     * Show the form for creating a new GeneroAtributo.
     *
     * @return Response
     */
    public function create()
    {
        $generoAtributo = new GeneroAtributo();
        $generoAtributo->loadDefaultValues();
        return view('genero_atributos.create', compact('generoAtributo'));
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

        if(($model = GeneroAtributo::create($validatedAttributes)) ) {
            //flash(Genero Atributo saved successfully.');
            //Flash::success('Genero Atributo saved successfully.');
            return redirect(route('genero-atributos.show', $model));
        }else
            return redirect()->back();
    }

    /**
     * Display the specified GeneroAtributo.
     *
     * @param  GeneroAtributo  $generoAtributo
     * @return Response
     */
    public function show(GeneroAtributo $generoAtributo)
    {
        return view('genero_atributos.show', compact('generoAtributo'));
    }

    /**
     * Show the form for editing the specified GeneroAtributo.
     *
     * @param  GeneroAtributo $generoAtributo
     * @return Response
     */
    public function edit(GeneroAtributo $generoAtributo)
    {
        return view('genero_atributos.edit', compact('generoAtributo'));
    }

    /**
     * Update the specified GeneroAtributo in storage.
     *
     * @param  Request  $request
     * @param  GeneroAtributo $generoAtributo
     * @return Response
     */
    public function update(Request $request, GeneroAtributo $generoAtributo)
    {
        $validatedAttributes = $this->validateForm($request, $generoAtributo);
        $generoAtributo->fill($validatedAttributes);
        if($generoAtributo->save()) {
            //flash('Genero Atributo updated successfully.');
            //Flash::success('Genero Atributo updated successfully.');
            return redirect(route('genero-atributos.show', $generoAtributo));
        }else{
            return redirect()->back();
        }
    }

     /**
      * Remove the specified GeneroAtributo from storage.
      *
      * @param  \App\Models\GeneroAtributo  $generoAtributo
      * @return Response
      */
    public function destroy(GeneroAtributo $generoAtributo)
    {
        $generoAtributo->delete();
        //Flash::success('Genero Atributo deleted successfully.');

        return redirect(route('genero-atributos.index'));
    }

    /**
     * @return array
     */
    public function validateForm(Request $request, GeneroAtributo $model = null): array
    {

        $rules = GeneroAtributo::rules();

        return $request->validate($rules, [], GeneroAtributo::attributeLabels());
    }
}
