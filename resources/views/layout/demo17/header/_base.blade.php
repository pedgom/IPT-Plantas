<!--begin::Header tablet and mobile-->
<div class="header-mobile py-3">
    <!--begin::Container-->
    <div class="container d-flex flex-stack">
        <!--begin::Mobile logo-->
        <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
            <a href="{{ route('home') }}">
                <img alt="Logo" src="{{ asset(theme()->getMediaUrlPath() . 'logos/logo-demo17.svg') }}" class="h-35px" />
            </a>
        </div>
        <!--end::Mobile logo-->
        <!--begin::Aside toggle-->
        <button class="btn btn-icon btn-active-color-primary" id="kt_aside_toggle">
            <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
            {!! theme()->getSvgIcon("icons/duotune/abstract/abs015.svg", "svg-icon-2x me-n1") !!}
            <!--end::Svg Icon-->
        </button>
        <!--end::Aside toggle-->
    </div>
    <!--end::Container-->
</div>
<!--end::Header tablet and mobile-->
<!--begin::Header-->
<div id="kt_header" style="" class="header py-6 py-lg-0 {{ theme()->printHtmlClasses('header', false) }}" {{ theme()->printHtmlAttributes('header') }}
    data-kt-sticky="true"
    data-kt-sticky-name="header"
    data-kt-sticky-offset="{lg: '300px'}">
	<!--begin::Container-->
	<div class="header-container {{ theme()->printHtmlClasses('header-container', false) }}">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-lg-20 py-3 py-lg-0 me-3">
            <!--begin::Heading-->
            <h1 class="d-flex flex-column text-dark fw-bolder my-1">
                <span class="fs-1">
                    @if (!empty($pageTitle))
                        {{ @$pageTitle }}
                    @endif
                </span>
            </h1>
            <!--end::Heading-->
            @yield('breadcrumbs')

        </div>
        <!--end::Page title=-->

        <!--begin::Topbar-->
        {{ theme()->getView('layout/topbar/_base') }}
        <!--end::Topbar-->
    </div>
    <!--end::Container-->
</div>
<!--end::Header-->
