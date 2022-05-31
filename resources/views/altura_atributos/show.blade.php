<?php
/**
 *
 * @var $alturaAtributo \App\Models\AlturaAtributo
 */
view()->share('pageTitle', $alturaAtributo->id);
view()->share('hideSubHeader', true);
?>
<x-base-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('altura-atributos.show', $alturaAtributo) }}
    @endsection

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                {{ $alturaAtributo->id }}
            </h3>
            <div class="card-toolbar">
                <a href="{{ route('altura-atributos.edit', $alturaAtributo) }}" class="btn btn-sm btn-flex btn-light-primary me-2">
                    {!! theme()->getSvgIcon("icons/duotune/art/art005.svg", "svg-icon-3") !!}
                    {{ __('Update') }}
                </a>
                <button class="btn btn-sm btn-flex btn-light-danger" onclick="destroyConfirmation(this)">
                    {!! theme()->getSvgIcon("icons/duotune/general/gen027.svg", "svg-icon-3") !!}
                    {{ __('Delete') }}
                </button>
                {!! Form::open(['route' => ['altura-atributos.destroy', $alturaAtributo], 'method' => 'delete', 'class'=>"d-none", 'id' => 'delete-form']) !!}
                {!! Form::close() !!}
            </div>
        </div>
        <div class="card-body">
            @include('altura_atributos.show_fields')
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
