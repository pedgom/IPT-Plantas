<?php
/**
 *
 * @var $diametroAtributoPlanta \App\Models\DiametroAtributoPlanta
 * @var $errors Illuminate\View\Middleware\ShareErrorsFromSession
 */
view()->share('pageTitle', $diametroAtributoPlanta->id);
view()->share('hideSubHeader', true);
?>
<x-base-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('diametro-atributo-plantas.edit', $diametroAtributoPlanta) }}
    @endsection
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                {{ $diametroAtributoPlanta->id }}
            </h3>
        </div>
        {!! Form::model($diametroAtributoPlanta, ['route' => ['diametro-atributo-plantas.update', $diametroAtributoPlanta], 'method' => 'patch', 'enctype'=>"multipart/form-data", 'class' => "form"]) !!}
            <div class="card-body">
                @include('diametro_atributo_plantas.fields')
             </div>
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <!--<button type="reset" class="btn btn-light btn-active-light-primary me-2">{{ __('Cancel') }}</button>-->
                <button type="submit" class="btn btn-primary" >{{ __('Save') }}</button>
            </div>
        {!! Form::close() !!}
    </div>
</x-base-layout>
