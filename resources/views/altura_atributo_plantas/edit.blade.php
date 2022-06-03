<?php
/**
 *
 * @var $alturaAtributoPlanta \App\Models\AlturaAtributoPlanta
 * @var $errors Illuminate\View\Middleware\ShareErrorsFromSession
 */
view()->share('pageTitle', $alturaAtributoPlanta->id);
view()->share('hideSubHeader', true);
?>
<x-base-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('altura-atributo-plantas.edit', $alturaAtributoPlanta) }}
    @endsection
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                {{ $alturaAtributoPlanta->id }}
            </h3>
        </div>
        {!! Form::model($alturaAtributoPlanta, ['route' => ['altura-atributo-plantas.update', $alturaAtributoPlanta], 'method' => 'patch', 'enctype'=>"multipart/form-data", 'class' => "form"]) !!}
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
