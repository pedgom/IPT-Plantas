<?php
/**
 *
 * @var $diametroAtributo \App\Models\DiametroAtributo;
 * @var $errors Illuminate\View\Middleware\ShareErrorsFromSession
 */
view()->share('pageTitle', __('Create Diametro Atributo'));
view()->share('hideSubHeader', true);
?>
<x-base-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('diametro-atributos.create') }}
    @endsection

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                {{ __('Create Diametro Atributo') }}
            </h3>
        </div>
        {!! Form::model($diametroAtributo, ['route' => ['diametro-atributos.store'], 'method' => 'post', 'enctype'=>"multipart/form-data", 'class' => "form"]) !!}
            <div class="card-body">
                @include('diametro_atributos.fields')
             </div>
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <!--<button type="reset" class="btn btn-light btn-active-light-primary me-2">{{ __('Cancel') }}</button>-->
                <button type="submit" class="btn btn-primary" >{{ __('Save') }}</button>
            </div>
        {!! Form::close() !!}
    </div>
</x-base-layout>
