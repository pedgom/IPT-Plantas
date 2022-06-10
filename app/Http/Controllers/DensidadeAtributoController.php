<?php

namespace App\Http\Controllers;

use App\DataTables\DensidadeAtributoDataTable;
use Illuminate\Http\Request;
//use App\Http\Requests\CreateDensidadeAtributoRequest;
//use App\Http\Requests\UpdateDensidadeAtributoRequest;
use App\Models\DensidadeAtributo;
//use Flash;
//use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;

class DensidadeAtributoController extends Controller
{
    /**
     * Display a listing of the DensidadeAtributo.
     *
     * @param DensidadeAtributoDataTable $densidadeAtributoDataTable
     * @return Response
     */
    public function index(DensidadeAtributoDataTable $densidadeAtributoDataTable)
    {
        return $densidadeAtributoDataTable->render('densidade_atributos.index');
    }

    /**
     * Show the form for creating a new DensidadeAtributo.
     *
     * @return Response
     */
    public function create()
    {
        $densidadeAtributo = new DensidadeAtributo();
        $densidadeAtributo->loadDefaultValues();
        return view('densidade_atributos.create', compact('densidadeAtributo'));
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

        if(($model = DensidadeAtributo::create($validatedAttributes)) ) {
            //flash(Densidade Atributo saved successfully.');
            //Flash::success('Densidade Atributo saved successfully.');
            return redirect(route('densidade-atributos.show', $model));
        }else
            return redirect()->back();
    }

    /**
     * Display the specified DensidadeAtributo.
     *
     * @param  DensidadeAtributo  $densidadeAtributo
     * @return Response
     */
    public function show(DensidadeAtributo $densidadeAtributo)
    {
        return view('densidade_atributos.show', compact('densidadeAtributo'));
    }

    /**
     * Show the form for editing the specified DensidadeAtributo.
     *
     * @param  DensidadeAtributo $densidadeAtributo
     * @return Response
     */
    public function edit(DensidadeAtributo $densidadeAtributo)
    {
        return view('densidade_atributos.edit', compact('densidadeAtributo'));
    }

    /**
     * Update the specified DensidadeAtributo in storage.
     *
     * @param  Request  $request
     * @param  DensidadeAtributo $densidadeAtributo
     * @return Response
     */
    public function update(Request $request, DensidadeAtributo $densidadeAtributo)
    {
        $validatedAttributes = $this->validateForm($request, $densidadeAtributo);
        $densidadeAtributo->fill($validatedAttributes);
        if($densidadeAtributo->save()) {
            //flash('Densidade Atributo updated successfully.');
            //Flash::success('Densidade Atributo updated successfully.');
            return redirect(route('densidade-atributos.show', $densidadeAtributo));
        }else{
            return redirect()->back();
        }
    }

     /**
      * Remove the specified DensidadeAtributo from storage.
      *
      * @param  \App\Models\DensidadeAtributo  $densidadeAtributo
      * @return Response
      */
    public function destroy(DensidadeAtributo $densidadeAtributo)
    {
        $densidadeAtributo->delete();
        //Flash::success('Densidade Atributo deleted successfully.');

        return redirect(route('densidade-atributos.index'));
    }

    /**
     * @return array
     */
    public function validateForm(Request $request, DensidadeAtributo $model = null): array
    {

        $rules = DensidadeAtributo::rules();

        return $request->validate($rules, [], DensidadeAtributo::attributeLabels());
    }
}
