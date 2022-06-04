<?php
/**
 *
 * @var $categoriaAtributoPlanta \App\Models\CategoriaAtributoPlanta
 * @var $errors Illuminate\View\Middleware\ShareErrorsFromSession
 */
view()->share('pageTitle', $categoriaAtributoPlanta->id);
view()->share('hideSubHeader', true);
?>
<x-base-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('categoria-atributo-plantas.edit', $categoriaAtributoPlanta) }}
    @endsection
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                {{ $categoriaAtributoPlanta->id }}
            </h3>
        </div>
        {!! Form::model($categoriaAtributoPlanta, ['route' => ['categoria-atributo-plantas.update', $categoriaAtributoPlanta], 'method' => 'patch', 'enctype'=>"multipart/form-data", 'class' => "form"]) !!}
            <div class="card-body">
                @include('categoria_atributo_plantas.fields')
             </div>
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <!--<button type="reset" class="btn btn-light btn-active-light-primary me-2">{{ __('Cancel') }}</button>-->
                <button type="submit" class="btn btn-primary" >{{ __('Save') }}</button>
            </div>
        {!! Form::close() !!}
    </div>
</x-base-layout>
