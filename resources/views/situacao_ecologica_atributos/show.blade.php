<?php
/**
 *
 * @var $situacaoEcologicaAtributo \App\Models\SituacaoEcologicaAtributo
 */
view()->share('pageTitle', $situacaoEcologicaAtributo->id);
view()->share('hideSubHeader', true);
?>
<x-base-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('situacaoEcologicaAtributos.show', $situacaoEcologicaAtributo) }}
    @endsection

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                {{ $situacaoEcologicaAtributo->id }}
            </h3>
            <div class="card-toolbar">
                <a href="{{ route('situacao-ecologica-atributos.edit', $situacaoEcologicaAtributo) }}" class="btn btn-sm btn-flex btn-light-primary me-2">
                    {!! theme()->getSvgIcon("icons/duotune/art/art005.svg", "svg-icon-3") !!}
                    {{ __('Update') }}
                </a>
                <button class="btn btn-sm btn-flex btn-light-danger" onclick="destroyConfirmation(this)">
                    {!! theme()->getSvgIcon("icons/duotune/general/gen027.svg", "svg-icon-3") !!}
                    {{ __('Delete') }}
                </button>
                {!! Form::open(['route' => ['situacao-ecologica-atributos.destroy', $situacaoEcologicaAtributo], 'method' => 'delete', 'class'=>"d-none", 'id' => 'delete-form']) !!}
                {!! Form::close() !!}
            </div>
        </div>
        <div class="card-body">
            @include('situacao_ecologica_atributos.show_fields')
        </div>
    </div>
    @push('scripts')
        <script>
            function destroyConfirmation(e){
                swal.fire({
                    title: '{{ __('Are you sure you want to delete this?') }}',
                    text: "{!! __("You won't be able to revert this!") !!}",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: "{{ __('Yes, delete it!') }}"
                }).then(function(result) {
                    if (result.value) {
                        document.getElementById('delete-form').submit();
                    }
                });
            }
        </script>
    @endpush
</x-base-layout>
