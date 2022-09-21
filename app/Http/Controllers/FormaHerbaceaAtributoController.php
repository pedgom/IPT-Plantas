<?php

namespace App\Http\Controllers;

use App\DataTables\FormaHerbaceaAtributoDataTable;
use Illuminate\Http\Request;
//use App\Http\Requests\CreateFormaHerbaceaAtributoRequest;
//use App\Http\Requests\UpdateFormaHerbaceaAtributoRequest;
use App\Models\FormaHerbaceaAtributo;
//use Flash;
//use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;

class FormaHerbaceaAtributoController extends Controller
{
    /**
     * Display a listing of the FormaHerbaceaAtributo.
     *
     * @param FormaHerbaceaAtributoDataTable $formaHerbaceaAtributoDataTable
     * @return Response
     */
    public function index(FormaHerbaceaAtributoDataTable $formaHerbaceaAtributoDataTable)
    {
        return $formaHerbaceaAtributoDataTable->render('forma_herbacea_atributos.index');
    }

    /**
     * Show the form for creating a new FormaHerbaceaAtributo.
     *
     * @return Response
     */
    public function create()
    {
        $formaHerbaceaAtributo = new FormaHerbaceaAtributo();
        $formaHerbaceaAtributo->loadDefaultValues();
        return view('forma_herbacea_atributos.create', compact('formaHerbaceaAtributo'));
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

        if(($model = FormaHerbaceaAtributo::create($validatedAttributes)) ) {
            //flash(Forma Herbacea Atributo saved successfully.');
            //Flash::success('Forma Herbacea Atributo saved successfully.');
            return redirect(route('formaHerbaceaAtributos.show', $model));
        }else
            return redirect()->back();
    }

    /**
     * Display the specified FormaHerbaceaAtributo.
     *
     * @param  FormaHerbaceaAtributo  $formaHerbaceaAtributo
     * @return Response
     */
    public function show(FormaHerbaceaAtributo $formaHerbaceaAtributo)
    {
        return view('forma_herbacea_atributos.show', compact('formaHerbaceaAtributo'));
    }

    /**
     * Show the form for editing the specified FormaHerbaceaAtributo.
     *
     * @param  FormaHerbaceaAtributo $formaHerbaceaAtributo
     * @return Response
     */
    public function edit(FormaHerbaceaAtributo $formaHerbaceaAtributo)
    {
        return view('forma_herbacea_atributos.edit', compact('formaHerbaceaAtributo'));
    }

    /**
     * Update the specified FormaHerbaceaAtributo in storage.
     *
     * @param  Request  $request
     * @param  FormaHerbaceaAtributo $formaHerbaceaAtributo
     * @return Response
     */
    public function update(Request $request, FormaHerbaceaAtributo $formaHerbaceaAtributo)
    {
        $validatedAttributes = $this->validateForm($request, $formaHerbaceaAtributo);
        $formaHerbaceaAtributo->fill($validatedAttributes);
        if($formaHerbaceaAtributo->save()) {
            //flash('Forma Herbacea Atributo updated successfully.');
            //Flash::success('Forma Herbacea Atributo updated successfully.');
            return redirect(route('formaHerbaceaAtributos.show', $formaHerbaceaAtributo));
        }else{
            return redirect()->back();
        }
    }

     /**
      * Remove the specified FormaHerbaceaAtributo from storage.
      *
      * @param  \App\Models\FormaHerbaceaAtributo  $formaHerbaceaAtributo
      * @return Response
      */
    public function destroy(FormaHerbaceaAtributo $formaHerbaceaAtributo)
    {
        $formaHerbaceaAtributo->delete();
        //Flash::success('Forma Herbacea Atributo deleted successfully.');

        return redirect(route('formaHerbaceaAtributos.index'));
    }

    /**
     * @return array
     */
    public function validateForm(Request $request, FormaHerbaceaAtributo $model = null): array
    {

        $rules = FormaHerbaceaAtributo::rules();

        return $request->validate($rules, [], FormaHerbaceaAtributo::attributeLabels());
    }
}
