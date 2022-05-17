@php
    $toolbarButtonMarginClass = "ms-1 ms-lg-3";
    $toolbarButtonHeightClass = "w-30px h-30px w-md-40px h-md-40px";
    $toolbarUserAvatarHeightClass = "symbol-30px symbol-md-40px";
    $toolbarButtonIconSizeClass = "svg-icon-1";
@endphp

<!--begin::Topbar-->
<div class="d-flex align-items-stretch flex-shrink-0">
    @if(false)

        <!--begin::Search-->
        <div class="me-3 py-3 py-lg-0">
            <div class="d-flex align-items-center w-lg-225px ">
                {{ theme()->getView('partials/search/_base', array('search-icon' => '<i class="bi bi-search fs-2"></i>')) }}
            </div>
        </div>
        <!--end::Search-->
    @endif

    <!--begin::Action-->
    <div class="d-flex align-items-center py-3 py-lg-0">
        <!--begin::User-->
        <div class="">
            <div class="btn btn-icon btn-color-gray-700 btn-active-color-primary btn-outline btn-outline-secondary bg-transparent w-30px h-30px w-lg-40px h-lg-40px"
                 data-kt-menu-trigger="click"
                 data-kt-menu-attach="parent"
                 data-kt-menu-placement="bottom-end">
                <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
                {!! theme()->getSvgIcon("icons/duotune/communication/com013.svg", "svg-icon-1") !!}
                <!--end::Svg Icon-->
            </div>
            {{ theme()->getView('partials/topbar/_user-menu') }}
        </div>
        <!--end::User -->
    </div>
    <!--end::Action-->
</div>
<!--end::Topbar-->
