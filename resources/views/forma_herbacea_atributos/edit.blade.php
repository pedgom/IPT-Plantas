<?php
/**
 *
 * @var $formaHerbaceaAtributo \App\Models\FormaHerbaceaAtributo
 * @var $errors Illuminate\View\Middleware\ShareErrorsFromSession
 */
view()->share('pageTitle', $formaHerbaceaAtributo->id);
view()->share('hideSubHeader', true);
?>
<x-base-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('formaHerbaceaAtributos.edit', $formaHerbaceaAtributo) }}
    @endsection
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                {{ $formaHerbaceaAtributo->id }}
            </h3>
        </div>
        {!! Form::model($formaHerbaceaAtributo, ['route' => ['formaHerbaceaAtributos.update', $formaHerbaceaAtributo], 'method' => 'patch', 'enctype'=>"multipart/form-data", 'class' => "form"]) !!}
            <div class="card-body">
                @include('forma_herbacea_atributos.fields')
             </div>
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <!--<button type="reset" class="btn btn-light btn-active-light-primary me-2">{{ __('Cancel') }}</button>-->
                <button type="submit" class="btn btn-primary" >{{ __('Save') }}</button>
            </div>
        {!! Form::close() !!}
    </div>
</x-base-layout>
