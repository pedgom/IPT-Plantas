<?php
/**
 *
 * @var $persistenciaAtributo \App\Models\PersistenciaAtributo;
 * @var $errors Illuminate\View\Middleware\ShareErrorsFromSession
 */
view()->share('pageTitle', __('Create Persistencia Atributo'));
view()->share('hideSubHeader', true);
?>
<x-base-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('persistenciaAtributos.create') }}
    @endsection

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                {{ __('Create Persistencia Atributo') }}
            </h3>
        </div>
        {!! Form::model($persistenciaAtributo, ['route' => ['persistenciaAtributos.store'], 'method' => 'post', 'enctype'=>"multipart/form-data", 'class' => "form"]) !!}
            <div class="card-body">
                @include('persistencia_atributos.fields')
             </div>
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <!--<button type="reset" class="btn btn-light btn-active-light-primary me-2">{{ __('Cancel') }}</button>-->
                <button type="submit" class="btn btn-primary" >{{ __('Save') }}</button>
            </div>
        {!! Form::close() !!}
    </div>
</x-base-layout>
