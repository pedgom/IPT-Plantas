<!--begin::Header-->
<div id="kt_header" style="" class="header {{ theme()->printHtmlClasses('header', false) }}" {{ theme()->printHtmlAttributes('header') }}
    data-kt-sticky="true"
     data-kt-sticky-name="header"
     data-kt-sticky-offset="{default: '200px', lg: '300px'}">

    <!--begin::Header top-->
    <div class="header-top d-flex align-items-stretch flex-grow-1">
        <!--begin::Container-->
        <div class="d-flex container-xxl align-items-stretch">
            <!--begin::Brand-->
            <div class="d-flex align-items-center align-items-lg-stretch me-5 flex-row-fluid">
                <!--begin::Heaeder navs toggle-->
                <button class="d-lg-none btn btn-icon btn-color-white bg-hover-white bg-hover-opacity-10 w-35px h-35px h-md-40px w-md-40px ms-n2 me-2" id="kt_header_navs_toggle">
                    <!--begin::Svg Icon | path:  icons/duotune/abstract/abs015.svg-->
                    {!! theme()->getSvgIcon("icons/duotune/abstract/abs015.svg", "svg-icon-2") !!}
                    <!--end::Svg Icon-->
                </button>
                <!--end::Heaeder navs toggle-->
                <!--begin::Logo-->
                <a href="/" class="d-flex align-items-center">
                    <img alt="Logo" src="{{ asset(theme()->getMediaUrlPath() . 'logos/logo-demo20.svg') }}" class="h-25px h-lg-30px" />
                </a>
                <!--end::Logo-->
                <!--begin::Tabs wrapper-->
                <div class="align-self-end overflow-auto" id="kt_brand_tabs">
                    <!--begin::Header tabs wrapper-->
                    <div class="header-tabs overflow-auto mx-4 ms-lg-10 mb-5 mb-lg-0" id="kt_header_tabs" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_header_navs_wrapper', lg: '#kt_brand_tabs'}">
                        <!--begin::Header tabs-->
                        <ul class="nav flex-nowrap text-nowrap">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('home') || request()->routeIs('users.*') || request()->routeIs('demos.*')  ? "active" : "" }}" data-bs-toggle="tab" href="#kt_header_navs_tab_1">{{ __('General') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('settings.*')  ? "active" : "" }}" data-bs-toggle="tab" href="#kt_header_navs_tab_2">{{ __('Configurations') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/docs">{{ __('Documentation') }}</a>
                            </li>
                            <!--<li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#kt_header_navs_tab_4">Reports</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#kt_header_navs_tab_5"> {{ __('Documentation') }} </a>
                            </li>-->
                        </ul>
                        <!--begin::Header tabs-->
                    </div>
                    <!--end::Header tabs wrapper-->
                </div>
                <!--end::Tabs wrapper-->
            </div>
            <!--end::Brand-->
            {{ theme()->getView('layout/header/_topbar') }}
        </div>
        <!--end::Container-->
    </div>
    <!--end::Header top-->
    <!--begin::Header navs-->
    <div class="header-navs d-flex align-items-stretch flex-stack h-lg-70px w-100 py-5 py-lg-0" id="kt_header_navs" data-kt-drawer="true" data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_header_navs_toggle" data-kt-swapper="true" data-kt-swapper-mode="append" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header'}">
        <!--begin::Container-->
        <div class="d-lg-flex container-xxl w-100">
            <!--begin::Wrapper-->
            <div class="d-lg-flex flex-column justify-content-lg-center w-100" id="kt_header_navs_wrapper">
                <!--begin::Header tab content-->
                <div class="tab-content" data-kt-scroll="true" data-kt-scroll-activate="{default: true, lg: false}" data-kt-scroll-height="auto" data-kt-scroll-offset="70px">
                    <!--begin::Tab panel-->
                    <div class="tab-pane fade {{ request()->routeIs('home') || request()->routeIs('users.*') || request()->routeIs('demos.*')   ? "active show" : "" }}" id="kt_header_navs_tab_1">
                        <!--begin::Menu wrapper-->
                        <div class="header-menu flex-column align-items-stretch flex-lg-row">
                            <!--begin::Menu-->
                            <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold align-items-stretch flex-grow-1" id="#kt_header_menu" data-kt-menu="true">
                                <div class="menu-item me-lg-1 {{ request()->routeIs('home') ? "here show" : "" }}">
                                    <a class="menu-link py-3" href="{{ route('home') }}">
                                        <span class="menu-title">{{ __('Dashboard') }}</span>
                                        <span class="menu-arrow d-lg-none"></span>
                                    </a>
                                </div>
                                <div class="menu-item me-lg-1 {{ request()->routeIs('users.*') ? "here show" : "" }}">
                                    <a class="menu-link py-3" href="{{ route('users.index') }}">
                                        <span class="menu-title">{{ __('Users') }}</span>
                                        <span class="menu-arrow d-lg-none"></span>
                                    </a>
                                </div>
                                <div data-kt-menu-trigger="click" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion me-lg-1 {{ request()->routeIs('demos.*') ? "here show" : "" }}">
                                    <span class="menu-link py-3">
                                        <span class="menu-title">{{ __('Demos') }}</span>
                                        <span class="menu-arrow d-lg-none"></span>
                                    </span>
                                    <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown menu-rounded-0 py-lg-4 w-lg-225px">
                                        <div class="menu-item">
                                            <a class="menu-link py-3 {{ request()->routeIs('demos.index') ? "active" : "" }}" href="{{ route('demos.index') }}" title="{{ __('List demos') }}" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                                <span class="menu-icon">
                                                    <!--begin::Svg Icon | path:  icons/duotune/general/gen059.svg-->
                                                    {!! theme()->getSvgIcon("icons/duotune/general/gen059.svg", "svg-icon-2") !!}
                                                    <!--end::Svg Icon-->
                                                </span>
                                                <span class="menu-title">{{ __('List demos') }}</span>
                                            </a>
                                        </div>
                                        <div class="menu-item">
                                            <a class="menu-link py-3 {{ request()->routeIs('demos.create') ? "active" : "" }}" href="{{ route('demos.create') }}" title="{{ __('Create demo') }}" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                                                <span class="menu-icon">
                                                    <!--begin::Svg Icon | path:  icons/duotune/arrows/arr017.svg-->
                                                    {!! theme()->getSvgIcon("icons/duotune/arrows/arr017.svg", "svg-icon-2") !!}
                                                <!--end::Svg Icon-->
                                                </span>
                                                <span class="menu-title">{{ __('Create demo') }}</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Menu-->
                        </div>
                        <!--end::Menu wrapper-->
                    </div>
                    <!--end::Tab panel-->
                    @can('adminApp')
                        <!--begin::Tab panel-->
                        <div class="tab-pane fade {{ request()->routeIs('settings.*')  ? "active show" : "" }}" id="kt_header_navs_tab_2">
                            <!--begin::Wrapper-->
                            <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold align-items-stretch flex-grow-1">
                                <div class="d-flex flex-column flex-lg-row gap-2">
                                    <div  class="menu-item me-lg-1 {{ request()->routeIs('settings.*') ? "here show" : "" }}">
                                        <a class="menu-link py-3" href="{{ route('settings.index') }}">
                                            <span class="menu-title">{{ __('Settings') }}</span>
                                            <span class="menu-arrow d-lg-none"></span>
                                        </a>
                                    </div>
                                    <!--<a class="btn btn-muted btn-active-light btn-active-color-primary fs-base menu-link {{ request()->routeIs('settings.*') ? "text-primary active" : "text-gray-700" }}" href="{{ route('settings.index') }}">{{ __('Settings') }}</a>-->
                                    <!--<a class=" menu-link {{ request()->routeIs('settings.*') ? "active" : "" }}" href="{{ route('settings.index') }}">{{ __('Settings') }}</a>
                                    <div class="menu-item here show menu-lg-down-accordion me-lg-1 {{ request()->routeIs('settings.*') ? "active" : "" }}">
                                        <span class="menu-link py-3">
                                            <span class="menu-title">{{ __('Settings') }}</span>
                                            <span class="menu-arrow d-lg-none"></span>
                                        </span>
                                    </div>-->
                                    @can('adminFullApp')
                                        <div  class="menu-item me-lg-1 {{ request()->routeIs('translations.*') ? "here show" : "" }}">
                                            <a class="menu-link py-3" href="/translations">
                                                <span class="menu-title">{{ __('Translations') }}</span>
                                                <span class="menu-arrow d-lg-none"></span>
                                            </a>
                                        </div>
                                        <!--<a class="btn btn-muted btn-active-light btn-active-color-primary text-gray-700 fs-base menu-link {{ request()->routeIs('translations.*') ? "text-primary active" : "text-gray-700" }}" href="/translations">{{ __('Translations') }}</a>-->
                                    @endcan
                                </div>
                                @if(false)
                                    <div class="d-flex flex-column flex-lg-row gap-2">
                                        <a class="btn btn-sm btn-light-info fw-bolder" href="../../demo20/dist/documentation/forms/autosize.html">More Components</a>
                                    </div>
                                @endif
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Tab panel-->
                    @endcan
                </div>
                <!--end::Header tab content-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Header navs-->
</div>
<!--end::Header-->
