<?php
/**
 *
 * @var $setting \App\Models\Setting
 */
view()->share('pageTitle', $setting->name);
view()->share('hideSubHeader', true);
?>
<x-base-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('settings.show', $setting) }}
    @endsection

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $setting->name }}</h3>
            <div class="card-toolbar">
                <a href="{{ route('settings.edit', $setting) }}" class="btn btn-sm btn-flex btn-light-primary me-2">
                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                    {!! theme()->getSvgIcon("icons/duotune/art/art005.svg", "svg-icon-3") !!}
                    <!--end::Svg Icon-->
                    {{ __('Update') }}
                </a>

                <button class="btn btn-sm btn-flex btn-light-danger" onclick="destroyConfirmation(this)">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen027.svg-->
                    {!! theme()->getSvgIcon("icons/duotune/general/gen027.svg", "svg-icon-3") !!}
                    <!--end::Svg Icon-->
                    {{ __('Delete') }}
                </button>
                {!! Form::open(['route' => ['settings.destroy', $setting], 'method' => 'delete', 'class'=>"d-none", 'id' => 'delete-form']) !!}
                {!! Form::close() !!}
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-7">
                <label class="col-lg-4 fw-bold text-muted">{{ __('ID') }}</label>
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $setting->id }}</span>
                </div>
            </div>
            <div class="row mb-7">
                <label class="col-lg-4 fw-bold text-muted">{{ __('Type') }}</label>
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $setting->typeLabel }}</span>
                </div>
            </div>
            <div class="row mb-7">
                <label class="col-lg-4 fw-bold text-muted">{{ __('Group') }}</label>
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $setting->group }}</span>
                </div>
            </div>
            <div class="row mb-7">
                <label class="col-lg-4 fw-bold text-muted">{{ __('Name') }}</label>
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $setting->name }}</span>
                </div>
            </div>
            <div class="row mb-7">
                <label class="col-lg-4 fw-bold text-muted">{{ __('Slug') }}</label>
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $setting->slug }}</span>
                </div>
            </div>
            <div class="row mb-7">
                <label class="col-lg-4 fw-bold text-muted">{{ __('Options') }}</label>
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $setting->options }}</span>
                </div>
            </div>
            <div class="row mb-7">
                <label class="col-lg-4 fw-bold text-muted">{{ __('Value') }}</label>
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $setting->value }}</span>
                </div>
            </div>
            <div class="row mb-7">
                <label class="col-lg-4 fw-bold text-muted">{{ __('Created at') }}</label>
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $setting->created_at }}</span>
                </div>
            </div>
            <div class="row mb-7">
                <label class="col-lg-4 fw-bold text-muted">{{ __('Updated at') }}</label>
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $setting->updated_at }}</span>
                </div>
            </div>
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
