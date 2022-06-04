<?php

namespace App\Http\Controllers;

use App\DataTables\CategoriaAtributoDataTable;
use Illuminate\Http\Request;
//use App\Http\Requests\CreateCategoriaAtributoRequest;
//use App\Http\Requests\UpdateCategoriaAtributoRequest;
use App\Models\CategoriaAtributo;
//use Flash;
//use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;

class CategoriaAtributoController extends Controller
{
    /**
     * Display a listing of the CategoriaAtributo.
     *
     * @param CategoriaAtributoDataTable $categoriaAtributoDataTable
     * @return Response
     */
    public function index(CategoriaAtributoDataTable $categoriaAtributoDataTable)
    {
        return $categoriaAtributoDataTable->render('categoria_atributos.index');
    }

    /**
     * Show the form for creating a new CategoriaAtributo.
     *
     * @return Response
     */
    public function create()
    {
        $categoriaAtributo = new CategoriaAtributo();
        $categoriaAtributo->loadDefaultValues();
        return view('categoria_atributos.create', compact('categoriaAtributo'));
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

        if(($model = CategoriaAtributo::create($validatedAttributes)) ) {
            //flash(Categoria Atributo saved successfully.');
            //Flash::success('Categoria Atributo saved successfully.');
            return redirect(route('categoria-atributos.show', $model));
        }else
            return redirect()->back();
    }

    /**
     * Display the specified CategoriaAtributo.
     *
     * @param  CategoriaAtributo  $categoriaAtributo
     * @return Response
     */
    public function show(CategoriaAtributo $categoriaAtributo)
    {
        return view('categoria_atributos.show', compact('categoriaAtributo'));
    }

    /**
     * Show the form for editing the specified CategoriaAtributo.
     *
     * @param  CategoriaAtributo $categoriaAtributo
     * @return Response
     */
    public function edit(CategoriaAtributo $categoriaAtributo)
    {
        return view('categoria_atributos.edit', compact('categoriaAtributo'));
    }

    /**
     * Update the specified CategoriaAtributo in storage.
     *
     * @param  Request  $request
     * @param  CategoriaAtributo $categoriaAtributo
     * @return Response
     */
    public function update(Request $request, CategoriaAtributo $categoriaAtributo)
    {
        $validatedAttributes = $this->validateForm($request, $categoriaAtributo);
        $categoriaAtributo->fill($validatedAttributes);
        if($categoriaAtributo->save()) {
            //flash('Categoria Atributo updated successfully.');
            //Flash::success('Categoria Atributo updated successfully.');
            return redirect(route('categoria-atributos.show', $categoriaAtributo));
        }else{
            return redirect()->back();
        }
    }

     /**
      * Remove the specified CategoriaAtributo from storage.
      *
      * @param  \App\Models\CategoriaAtributo  $categoriaAtributo
      * @return Response
      */
    public function destroy(CategoriaAtributo $categoriaAtributo)
    {
        $categoriaAtributo->delete();
        //Flash::success('Categoria Atributo deleted successfully.');

        return redirect(route('categoria-atributos.index'));
    }

    /**
     * @return array
     */
    public function validateForm(Request $request, CategoriaAtributo $model = null): array
    {

        $rules = CategoriaAtributo::rules();

        return $request->validate($rules, [], CategoriaAtributo::attributeLabels());
    }
}
