<?php
/**
 *
 * @var $persistenciaAtributo \App\Models\PersistenciaAtributo
 */
view()->share('pageTitle', $persistenciaAtributo->id);
view()->share('hideSubHeader', true);
?>
<x-base-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('persistencia-atributos.show', $persistenciaAtributo) }}
    @endsection

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                {{ $persistenciaAtributo->id }}
            </h3>
            <div class="card-toolbar">
                <a href="{{ route('persistencia-atributos.edit', $persistenciaAtributo) }}" class="btn btn-sm btn-flex btn-light-primary me-2">
                    {!! theme()->getSvgIcon("icons/duotune/art/art005.svg", "svg-icon-3") !!}
                    {{ __('Update') }}
                </a>
                <button class="btn btn-sm btn-flex btn-light-danger" onclick="destroyConfirmation(this)">
                    {!! theme()->getSvgIcon("icons/duotune/general/gen027.svg", "svg-icon-3") !!}
                    {{ __('Delete') }}
                </button>
                {!! Form::open(['route' => ['persistencia-atributos.destroy', $persistenciaAtributo], 'method' => 'delete', 'class'=>"d-none", 'id' => 'delete-form']) !!}
                {!! Form::close() !!}
            </div>
        </div>
        <div class="card-body">
            @include('persistencia_atributos.show_fields')
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
