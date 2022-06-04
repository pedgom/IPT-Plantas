<?php

namespace App\Http\Controllers;

use App\DataTables\CategoriaAtributoPlantaDataTable;
use Illuminate\Http\Request;
//use App\Http\Requests\CreateCategoriaAtributoPlantaRequest;
//use App\Http\Requests\UpdateCategoriaAtributoPlantaRequest;
use App\Models\CategoriaAtributoPlanta;
//use Flash;
//use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;

class CategoriaAtributoPlantaController extends Controller
{
    /**
     * Display a listing of the CategoriaAtributoPlanta.
     *
     * @param CategoriaAtributoPlantaDataTable $categoriaAtributoPlantaDataTable
     * @return Response
     */
    public function index(CategoriaAtributoPlantaDataTable $categoriaAtributoPlantaDataTable)
    {
        return $categoriaAtributoPlantaDataTable->render('categoria_atributo_plantas.index');
    }

    /**
     * Show the form for creating a new CategoriaAtributoPlanta.
     *
     * @return Response
     */
    public function create()
    {
        $categoriaAtributoPlanta = new CategoriaAtributoPlanta();
        $categoriaAtributoPlanta->loadDefaultValues();
        return view('categoria_atributo_plantas.create', compact('categoriaAtributoPlanta'));
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

        if(($model = CategoriaAtributoPlanta::create($validatedAttributes)) ) {
            //flash(Categoria Atributo Planta saved successfully.');
            //Flash::success('Categoria Atributo Planta saved successfully.');
            return redirect(route('categoria-atributo-plantas.show', $model));
        }else
            return redirect()->back();
    }

    /**
     * Display the specified CategoriaAtributoPlanta.
     *
     * @param  CategoriaAtributoPlanta  $categoriaAtributoPlanta
     * @return Response
     */
    public function show(CategoriaAtributoPlanta $categoriaAtributoPlanta)
    {
        return view('categoria_atributo_plantas.show', compact('categoriaAtributoPlanta'));
    }

    /**
     * Show the form for editing the specified CategoriaAtributoPlanta.
     *
     * @param  CategoriaAtributoPlanta $categoriaAtributoPlanta
     * @return Response
     */
    public function edit(CategoriaAtributoPlanta $categoriaAtributoPlanta)
    {
        return view('categoria_atributo_plantas.edit', compact('categoriaAtributoPlanta'));
    }

    /**
     * Update the specified CategoriaAtributoPlanta in storage.
     *
     * @param  Request  $request
     * @param  CategoriaAtributoPlanta $categoriaAtributoPlanta
     * @return Response
     */
    public function update(Request $request, CategoriaAtributoPlanta $categoriaAtributoPlanta)
    {
        $validatedAttributes = $this->validateForm($request, $categoriaAtributoPlanta);
        $categoriaAtributoPlanta->fill($validatedAttributes);
        if($categoriaAtributoPlanta->save()) {
            //flash('Categoria Atributo Planta updated successfully.');
            //Flash::success('Categoria Atributo Planta updated successfully.');
            return redirect(route('categoria-atributo-plantas.show', $categoriaAtributoPlanta));
        }else{
            return redirect()->back();
        }
    }

     /**
      * Remove the specified CategoriaAtributoPlanta from storage.
      *
      * @param  \App\Models\CategoriaAtributoPlanta  $categoriaAtributoPlanta
      * @return Response
      */
    public function destroy(CategoriaAtributoPlanta $categoriaAtributoPlanta)
    {
        $categoriaAtributoPlanta->delete();
        //Flash::success('Categoria Atributo Planta deleted successfully.');

        return redirect(route('categoria-atributo-plantas.index'));
    }

    /**
     * @return array
     */
    public function validateForm(Request $request, CategoriaAtributoPlanta $model = null): array
    {

        $rules = CategoriaAtributoPlanta::rules();

        return $request->validate($rules, [], CategoriaAtributoPlanta::attributeLabels());
    }
}
