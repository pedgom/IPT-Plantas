<?php
/**
 *
 * @var $user \App\Models\User
 */
view()->share('pageTitle', $user->name);
view()->share('hideSubHeader', true);
?>

<x-base-layout>
    @section('breadcrumbs')
        @can('manageUsers')
            {{ Breadcrumbs::render('users.show', $user) }}
        @else
            {{ Breadcrumbs::render('users.own_show', $user) }}
        @endcan
    @endsection


    <!--begin::Card-->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ $user->name }}</h3>
            <div class="card-toolbar">
                <a href="{{ route('users.edit', $user) }}" class="btn btn-sm btn-flex btn-light-primary">
                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                    {!! theme()->getSvgIcon("icons/duotune/art/art005.svg", "svg-icon-3") !!}
                    <!--end::Svg Icon-->
                    {{ __('Update') }}
                </a>
            </div>
        </div>
        <div class="card-body">
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">{{ __('Image') }}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800"><img src="{{ $user->getFirstMediaUrl('avatar') }}" width="120"></span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">{{ __('Name') }}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $user->name }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">{{ __('Email') }}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800"><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">{{ __('Roles') }}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $user->roles_label }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">{{ __('Override Permissions') }}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $user->permissions_label }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">{{ __('Email verified at') }}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $user->email_verified_at }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">{{ __('Created at') }}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $user->created_at }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
            <!--begin::Row-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-bold text-muted">{{ __('Updated at') }}</label>
                <!--end::Label-->
                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bolder fs-6 text-gray-800">{{ $user->updated_at }}</span>
                </div>
                <!--end::Col-->
            </div>
        </div>
    </div>
    <!--end::Card-->

</x-base-layout>
