<?php
/**
 *
 * @var $permission \App\Models\Permission
 * @var $permissions \App\Models\Permission[]
 */
view()->share('pageTitle', $permission->name);
view()->share('hideSubHeader', true);
?>
<x-base-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('permissions.show', $permission) }}
    @endsection

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $permission->name }}</h3>
            <div class="card-toolbar">
                <a href="{{ route('permissions.edit', $permission) }}" class="btn btn-sm btn-flex btn-light-primary me-2">
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
                {!! Form::open(['route' => ['permissions.destroy', $permission], 'method' => 'delete', 'class'=>"d-none", 'id' => 'delete-form']) !!}
                {!! Form::close() !!}
            </div>
        </div>
        <div class="card-body">
            <div class="card-body">
                <div class="row mb-7">
                    <label class="col-lg-4 fw-bold text-muted">{{ __('Name') }}</label>
                    <div class="col-lg-8">
                        <span class="fw-bolder fs-6 text-gray-800">{{ $permission->name }}</span>
                    </div>
                </div>
                <div class="row mb-7">
                    <label class="col-lg-4 fw-bold text-muted">{{ __('Guard name') }}</label>
                    <div class="col-lg-8">
                        <span class="fw-bolder fs-6 text-gray-800">{{ $permission->guard_name }}</span>
                    </div>
                </div>
                <div class="row mb-7">
                    <label class="col-lg-4 fw-bold text-muted">{{ __('Created at') }}</label>
                    <div class="col-lg-8">
                        <span class="fw-bolder fs-6 text-gray-800">{{ $permission->created_at }}</span>
                    </div>
                </div>
                <div class="row mb-7">
                    <label class="col-lg-4 fw-bold text-muted">{{ __('Updated at') }}</label>
                    <div class="col-lg-8">
                        <span class="fw-bolder fs-6 text-gray-800">{{ $permission->updated_at }}</span>
                    </div>
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
