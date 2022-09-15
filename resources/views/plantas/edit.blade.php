<?php
/**
 *
 * @var $planta \App\Models\Planta
 * @var $errors Illuminate\View\Middleware\ShareErrorsFromSession
 */
view()->share('pageTitle',  $planta->nome_comum);
view()->share('hideSubHeader', true);
?>
<x-base-layout >

    @section('breadcrumbs')
        {{ Breadcrumbs::render('plantas.edit', $planta) }}
    @endsection
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                {{ $planta->id }}
            </h3>
        </div>
        {!! Form::model($planta, ['route' => ['plantas.update', $planta], 'method' => 'patch', 'enctype'=>"multipart/form-data", 'class' => "form"]) !!}
            <div class="card-body">
                @include('plantas.fields')
             </div>
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <!--<button type="reset" class="btn btn-light btn-active-light-primary me-2">{{ __('Cancel') }}</button>-->
                <button type="submit" class="btn btn-primary" >{{ __('Save') }}</button>
            </div>
        {!! Form::close() !!}
    </div>
</x-base-layout>
