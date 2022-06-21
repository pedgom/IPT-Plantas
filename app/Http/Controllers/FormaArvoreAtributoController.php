<?php

namespace App\Http\Controllers;

use App\DataTables\FormaArvoreAtributoDataTable;
use Illuminate\Http\Request;
//use App\Http\Requests\CreateFormaArvoreAtributoRequest;
//use App\Http\Requests\UpdateFormaArvoreAtributoRequest;
use App\Models\FormaArvoreAtributo;
//use Flash;
//use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;

class FormaArvoreAtributoController extends Controller
{
    /**
     * Display a listing of the FormaArvoreAtributo.
     *
     * @param FormaArvoreAtributoDataTable $formaArvoreAtributoDataTable
     * @return Response
     */
    public function index(FormaArvoreAtributoDataTable $formaArvoreAtributoDataTable)
    {
        return $formaArvoreAtributoDataTable->render('forma_arvore_atributos.index');
    }

    /**
     * Show the form for creating a new FormaArvoreAtributo.
     *
     * @return Response
     */
    public function create()
    {
        $formaArvoreAtributo = new FormaArvoreAtributo();
        $formaArvoreAtributo->loadDefaultValues();
        return view('forma_arvore_atributos.create', compact('formaArvoreAtributo'));
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

        if(($model = FormaArvoreAtributo::create($validatedAttributes)) ) {
            //flash(Forma Arvore Atributo saved successfully.');
            //Flash::success('Forma Arvore Atributo saved successfully.');
            return redirect(route('forma-arvore-atributos.show', $model));
        }else
            return redirect()->back();
    }

    /**
     * Display the specified FormaArvoreAtributo.
     *
     * @param  FormaArvoreAtributo  $formaArvoreAtributo
     * @return Response
     */
    public function show(FormaArvoreAtributo $formaArvoreAtributo)
    {
        return view('forma_arvore_atributos.show', compact('formaArvoreAtributo'));
    }

    /**
     * Show the form for editing the specified FormaArvoreAtributo.
     *
     * @param  FormaArvoreAtributo $formaArvoreAtributo
     * @return Response
     */
    public function edit(FormaArvoreAtributo $formaArvoreAtributo)
    {
        return view('forma_arvore_atributos.edit', compact('formaArvoreAtributo'));
    }

    /**
     * Update the specified FormaArvoreAtributo in storage.
     *
     * @param  Request  $request
     * @param  FormaArvoreAtributo $formaArvoreAtributo
     * @return Response
     */
    public function update(Request $request, FormaArvoreAtributo $formaArvoreAtributo)
    {
        $validatedAttributes = $this->validateForm($request, $formaArvoreAtributo);
        $formaArvoreAtributo->fill($validatedAttributes);
        if($formaArvoreAtributo->save()) {
            //flash('Forma Arvore Atributo updated successfully.');
            //Flash::success('Forma Arvore Atributo updated successfully.');
            return redirect(route('forma-arvore-atributos.show', $formaArvoreAtributo));
        }else{
            return redirect()->back();
        }
    }

     /**
      * Remove the specified FormaArvoreAtributo from storage.
      *
      * @param  \App\Models\FormaArvoreAtributo  $formaArvoreAtributo
      * @return Response
      */
    public function destroy(FormaArvoreAtributo $formaArvoreAtributo)
    {
        $formaArvoreAtributo->delete();
        //Flash::success('Forma Arvore Atributo deleted successfully.');

        return redirect(route('forma-arvore-atributos.index'));
    }

    /**
     * @return array
     */
    public function validateForm(Request $request, FormaArvoreAtributo $model = null): array
    {

        $rules = FormaArvoreAtributo::rules();

        return $request->validate($rules, [], FormaArvoreAtributo::attributeLabels());
    }
}
