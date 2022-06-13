<?php
/**
 *
 * @var $phSoloAtributoPlanta \App\Models\PhSoloAtributoPlanta
 * @var $errors Illuminate\View\Middleware\ShareErrorsFromSession
 */
view()->share('pageTitle', $phSoloAtributoPlanta->id);
view()->share('hideSubHeader', true);
?>
<x-base-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('ph-solo-atributo-plantas.edit', $phSoloAtributoPlanta) }}
    @endsection
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                {{ $phSoloAtributoPlanta->id }}
            </h3>
        </div>
        {!! Form::model($phSoloAtributoPlanta, ['route' => ['ph-solo-atributo-plantas.update', $phSoloAtributoPlanta], 'method' => 'patch', 'enctype'=>"multipart/form-data", 'class' => "form"]) !!}
            <div class="card-body">
                @include('ph_solo_atributo_plantas.fields')
             </div>
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <!--<button type="reset" class="btn btn-light btn-active-light-primary me-2">{{ __('Cancel') }}</button>-->
                <button type="submit" class="btn btn-primary" >{{ __('Save') }}</button>
            </div>
        {!! Form::close() !!}
    </div>
</x-base-layout>
