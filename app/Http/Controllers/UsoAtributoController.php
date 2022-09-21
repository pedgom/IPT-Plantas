<?php

namespace App\Http\Controllers;

use App\DataTables\UsoAtributoDataTable;
use Illuminate\Http\Request;
//use App\Http\Requests\CreateUsoAtributoRequest;
//use App\Http\Requests\UpdateUsoAtributoRequest;
use App\Models\UsoAtributo;
//use Flash;
//use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;

class UsoAtributoController extends Controller
{
    /**
     * Display a listing of the UsoAtributo.
     *
     * @param UsoAtributoDataTable $usoAtributoDataTable
     * @return Response
     */
    public function index(UsoAtributoDataTable $usoAtributoDataTable)
    {
        return $usoAtributoDataTable->render('uso_atributos.index');
    }

    /**
     * Show the form for creating a new UsoAtributo.
     *
     * @return Response
     */
    public function create()
    {
        $usoAtributo = new UsoAtributo();
        $usoAtributo->loadDefaultValues();
        return view('uso_atributos.create', compact('usoAtributo'));
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

        if(($model = UsoAtributo::create($validatedAttributes)) ) {
            //flash(Uso Atributo saved successfully.');
            //Flash::success('Uso Atributo saved successfully.');
            return redirect(route('usoAtributos.show', $model));
        }else
            return redirect()->back();
    }

    /**
     * Display the specified UsoAtributo.
     *
     * @param  UsoAtributo  $usoAtributo
     * @return Response
     */
    public function show(UsoAtributo $usoAtributo)
    {
        return view('uso_atributos.show', compact('usoAtributo'));
    }

    /**
     * Show the form for editing the specified UsoAtributo.
     *
     * @param  UsoAtributo $usoAtributo
     * @return Response
     */
    public function edit(UsoAtributo $usoAtributo)
    {
        return view('uso_atributos.edit', compact('usoAtributo'));
    }

    /**
     * Update the specified UsoAtributo in storage.
     *
     * @param  Request  $request
     * @param  UsoAtributo $usoAtributo
     * @return Response
     */
    public function update(Request $request, UsoAtributo $usoAtributo)
    {
        $validatedAttributes = $this->validateForm($request, $usoAtributo);
        $usoAtributo->fill($validatedAttributes);
        if($usoAtributo->save()) {
            //flash('Uso Atributo updated successfully.');
            //Flash::success('Uso Atributo updated successfully.');
            return redirect(route('usoAtributos.show', $usoAtributo));
        }else{
            return redirect()->back();
        }
    }

     /**
      * Remove the specified UsoAtributo from storage.
      *
      * @param  \App\Models\UsoAtributo  $usoAtributo
      * @return Response
      */
    public function destroy(UsoAtributo $usoAtributo)
    {
        $usoAtributo->delete();
        //Flash::success('Uso Atributo deleted successfully.');

        return redirect(route('usoAtributos.index'));
    }

    /**
     * @return array
     */
    public function validateForm(Request $request, UsoAtributo $model = null): array
    {

        $rules = UsoAtributo::rules();

        return $request->validate($rules, [], UsoAtributo::attributeLabels());
    }
}
