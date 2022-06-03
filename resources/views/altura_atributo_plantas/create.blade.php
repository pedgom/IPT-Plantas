<?php
/**
 *
 * @var $alturaAtributoPlanta \App\Models\AlturaAtributoPlanta;
 * @var $errors Illuminate\View\Middleware\ShareErrorsFromSession
 */
view()->share('pageTitle', __('Create Altura Atributo Planta'));
view()->share('hideSubHeader', true);
?>
<x-base-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('altura-atributo-plantas.create') }}
    @endsection

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                {{ __('Create Altura Atributo Planta') }}
            </h3>
        </div>
        {!! Form::model($alturaAtributoPlanta, ['route' => ['altura-atributo-plantas.store'], 'method' => 'post', 'enctype'=>"multipart/form-data", 'class' => "form"]) !!}
            <div class="card-body">
                @include('altura_atributo_plantas.fields')
             </div>
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <!--<button type="reset" class="btn btn-light btn-active-light-primary me-2">{{ __('Cancel') }}</button>-->
                <button type="submit" class="btn btn-primary" >{{ __('Save') }}</button>
            </div>
        {!! Form::close() !!}
    </div>
</x-base-layout>
