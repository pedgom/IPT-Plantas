<?php

namespace App\Http\Controllers;

use App\DataTables\FormaArbustoAtributoDataTable;
use Illuminate\Http\Request;
//use App\Http\Requests\CreateFormaArbustoAtributoRequest;
//use App\Http\Requests\UpdateFormaArbustoAtributoRequest;
use App\Models\FormaArbustoAtributo;
//use Flash;
//use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Response;

class FormaArbustoAtributoController extends Controller
{
    /**
     * Display a listing of the FormaArbustoAtributo.
     *
     * @param FormaArbustoAtributoDataTable $formaArbustoAtributoDataTable
     * @return Response
     */
    public function index(FormaArbustoAtributoDataTable $formaArbustoAtributoDataTable)
    {
        return $formaArbustoAtributoDataTable->render('forma_arbusto_atributos.index');
    }

    /**
     * Show the form for creating a new FormaArbustoAtributo.
     *
     * @return Response
     */
    public function create()
    {
        $formaArbustoAtributo = new FormaArbustoAtributo();
        $formaArbustoAtributo->loadDefaultValues();
        return view('forma_arbusto_atributos.create', compact('formaArbustoAtributo'));
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

        if(($model = FormaArbustoAtributo::create($validatedAttributes)) ) {
            //flash(Forma Arbusto Atributo saved successfully.');
            //Flash::success('Forma Arbusto Atributo saved successfully.');
            return redirect(route('formaArbustoAtributos.show', $model));
        }else
            return redirect()->back();
    }

    /**
     * Display the specified FormaArbustoAtributo.
     *
     * @param  FormaArbustoAtributo  $formaArbustoAtributo
     * @return Response
     */
    public function show(FormaArbustoAtributo $formaArbustoAtributo)
    {
        return view('forma_arbusto_atributos.show', compact('formaArbustoAtributo'));
    }

    /**
     * Show the form for editing the specified FormaArbustoAtributo.
     *
     * @param  FormaArbustoAtributo $formaArbustoAtributo
     * @return Response
     */
    public function edit(FormaArbustoAtributo $formaArbustoAtributo)
    {
        return view('forma_arbusto_atributos.edit', compact('formaArbustoAtributo'));
    }

    /**
     * Update the specified FormaArbustoAtributo in storage.
     *
     * @param  Request  $request
     * @param  FormaArbustoAtributo $formaArbustoAtributo
     * @return Response
     */
    public function update(Request $request, FormaArbustoAtributo $formaArbustoAtributo)
    {
        $validatedAttributes = $this->validateForm($request, $formaArbustoAtributo);
        $formaArbustoAtributo->fill($validatedAttributes);
        if($formaArbustoAtributo->save()) {
            //flash('Forma Arbusto Atributo updated successfully.');
            //Flash::success('Forma Arbusto Atributo updated successfully.');
            return redirect(route('forma-arbusto-atributos.show', $formaArbustoAtributo));
        }else{
            return redirect()->back();
        }
    }

     /**
      * Remove the specified FormaArbustoAtributo from storage.
      *
      * @param  \App\Models\FormaArbustoAtributo  $formaArbustoAtributo
      * @return Response
      */
    public function destroy(FormaArbustoAtributo $formaArbustoAtributo)
    {
        $formaArbustoAtributo->delete();
        //Flash::success('Forma Arbusto Atributo deleted successfully.');

        return redirect(route('forma-arbusto-atributos.index'));
    }

    /**
     * @return array
     */
    public function validateForm(Request $request, FormaArbustoAtributo $model = null): array
    {

        $rules = FormaArbustoAtributo::rules();

        return $request->validate($rules, [], FormaArbustoAtributo::attributeLabels());
    }
}
