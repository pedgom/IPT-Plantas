<?php
/**
 *
 * @var $formaArbustoAtributo \App\Models\FormaArbustoAtributo
 * @var $errors Illuminate\View\Middleware\ShareErrorsFromSession
 */
view()->share('pageTitle', $formaArbustoAtributo->id);
view()->share('hideSubHeader', true);
?>
<x-base-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('formaArbustoAtributos.edit', $formaArbustoAtributo) }}
    @endsection
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                {{ $formaArbustoAtributo->id }}
            </h3>
        </div>
        {!! Form::model($formaArbustoAtributo, ['route' => ['forma-arbusto-atributos.update', $formaArbustoAtributo], 'method' => 'patch', 'enctype'=>"multipart/form-data", 'class' => "form"]) !!}
            <div class="card-body">
                @include('forma_arbusto_atributos.fields')
             </div>
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <!--<button type="reset" class="btn btn-light btn-active-light-primary me-2">{{ __('Cancel') }}</button>-->
                <button type="submit" class="btn btn-primary" >{{ __('Save') }}</button>
            </div>
        {!! Form::close() !!}
    </div>
</x-base-layout>
