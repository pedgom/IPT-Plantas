<?php

namespace App\Http\Controllers;

use App\DataTables\LuzAtributoDataTable;
use Illuminate\Http\Request;
//use App\Http\Requests\CreateLuzAtributoRequest;
//use App\Http\Requests\UpdateLuzAtributoRequest;
use App\Models\LuzAtributo;
//use Flash;
//use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;

class LuzAtributoController extends Controller
{
    /**
     * Display a listing of the LuzAtributo.
     *
     * @param LuzAtributoDataTable $luzAtributoDataTable
     * @return Response
     */
    public function index(LuzAtributoDataTable $luzAtributoDataTable)
    {
        return $luzAtributoDataTable->render('luz_atributos.index');
    }

    /**
     * Show the form for creating a new LuzAtributo.
     *
     * @return Response
     */
    public function create()
    {
        $luzAtributo = new LuzAtributo();
        $luzAtributo->loadDefaultValues();
        return view('luz_atributos.create', compact('luzAtributo'));
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

        if(($model = LuzAtributo::create($validatedAttributes)) ) {
            //flash(Luz Atributo saved successfully.');
            //Flash::success('Luz Atributo saved successfully.');
            return redirect(route('luz-atributos.show', $model));
        }else
            return redirect()->back();
    }

    /**
     * Display the specified LuzAtributo.
     *
     * @param  LuzAtributo  $luzAtributo
     * @return Response
     */
    public function show(LuzAtributo $luzAtributo)
    {
        return view('luz_atributos.show', compact('luzAtributo'));
    }

    /**
     * Show the form for editing the specified LuzAtributo.
     *
     * @param  LuzAtributo $luzAtributo
     * @return Response
     */
    public function edit(LuzAtributo $luzAtributo)
    {
        return view('luz_atributos.edit', compact('luzAtributo'));
    }

    /**
     * Update the specified LuzAtributo in storage.
     *
     * @param  Request  $request
     * @param  LuzAtributo $luzAtributo
     * @return Response
     */
    public function update(Request $request, LuzAtributo $luzAtributo)
    {
        $validatedAttributes = $this->validateForm($request, $luzAtributo);
        $luzAtributo->fill($validatedAttributes);
        if($luzAtributo->save()) {
            //flash('Luz Atributo updated successfully.');
            //Flash::success('Luz Atributo updated successfully.');
            return redirect(route('luz-atributos.show', $luzAtributo));
        }else{
            return redirect()->back();
        }
    }

     /**
      * Remove the specified LuzAtributo from storage.
      *
      * @param  \App\Models\LuzAtributo  $luzAtributo
      * @return Response
      */
    public function destroy(LuzAtributo $luzAtributo)
    {
        $luzAtributo->delete();
        //Flash::success('Luz Atributo deleted successfully.');

        return redirect(route('luz-atributos.index'));
    }

    /**
     * @return array
     */
    public function validateForm(Request $request, LuzAtributo $model = null): array
    {

        $rules = LuzAtributo::rules();

        return $request->validate($rules, [], LuzAtributo::attributeLabels());
    }
}
