{{--begin::Aside Menu--}}
@php
    //$menu = bootstrap()->getAsideMenu();
    //\App\Core\Adapters\Menu::filterMenuPermissions($menu->items);
@endphp

<div
    class="hover-scroll-overlay-y my-5 my-lg-5"
    id="kt_aside_menu_wrapper"
    data-kt-scroll="true"
    data-kt-scroll-activate="{default: false, lg: true}"
    data-kt-scroll-height="auto"
    data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
    data-kt-scroll-wrappers="#kt_aside_menu"
    data-kt-scroll-offset="0"
>
    {{--begin::Menu--}}
    <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">
        {{-- $menu->build() --}}

        <div class="menu-item">
            <a class="menu-link {{ request()->routeIs('home') ? "active" : "" }}" href="{{ route('home') }}">
                <span class="menu-icon">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen008.svg-->
                    {!! theme()->getSvgIcon("icons/duotune/general/gen008.svg", "svg-icon-2") !!}
                    <!--end::Svg Icon-->
                </span>
                <span style="font-size:18px" class="menu-title">{{ __('Home') }}</span>
            </a>
        </div>

        <div class="menu-item">
            <div class="menu-content pt-8 pb-2">
                <span class="menu-section text-muted text-uppercase fs-8 ls-1">{{ __('General') }}</span>
            </div>
        </div>


        @can('manageApp')
            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('users.*') ? "active" : "" }}" href="{{ route('users.index') }}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
                            {!! theme()->getSvgIcon("icons/duotune/communication/com013.svg", "svg-icon-2") !!}
                        <!--end::Svg Icon-->
                    </span>
                    <span style="font-size:18px" class="menu-title">{{ __('Users') }}</span>
                </a>
            </div>
        @endcan





        <div class="menu-item">
            <a class="menu-link {{ request()->routeIs('plantas.*') ? "active" : "" }}" href="{{ route('home.search') }}">
                    <span class="menu-icon">
                        <span class="menu-icon">
                        <img alt="Logo" src="{{asset('images/lupa.svg')}}" class="h-20px logo"/>
                    </span>
                    </span>
                <span style="font-size:18px" class="menu-title">{{ __('Encontrar Plantas') }}</span>
            </a>
        </div>

        @can('manageApp')
        <div class="menu-item">
            <a class="menu-link {{ request()->routeIs('base_dados') ? "active" : "" }}" href="{{ route('base_dados.layout') }}">
                    <span class="menu-icon">
                        <span class="menu-icon">
                        <img alt="Logo" src="{{asset('images/database.svg')}}" class="h-20px logo"/>
                    </span>
                    </span>
                <span style="font-size:18px" class="menu-title">{{ __('Base de Dados') }}</span>
            </a>
        </div>
        @endcan

            @can('manageApp')
        <div class="menu-item">
            <a class="menu-link {{ request()->routeIs('import_plantas') ? "active" : "" }}" href="{{ route('plantas.import_plantas') }}">
                    <span class="menu-icon">
                        <span class="menu-icon">
                        <img alt="Logo" src="{{asset('images/upload_file.svg')}}" class="h-20px logo"/>
                    </span>
                    </span>
                <span style="font-size:18px" class="menu-title">{{ __('Importar Plantas') }}</span>
            </a>
        </div>
            @endcan






        @can('manageApp')

            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('plantas.*') ? "active" : "" }}" href="{{ route('plantas.index') }}">
                    <span class="menu-icon">
                        <span class="menu-icon">
                        <img alt="Logo" src="{{asset('images/create_plant.svg')}}" class="h-20px logo"/>
                    </span>
                    </span>
                    <span style="font-size:18px" class="menu-title">{{ __('Criar Plantas') }}</span>
                </a>
            </div>

        @endcan
        @can('adminApp')
            <div class="menu-item">
                <div class="menu-content pt-8 pb-2">
                    <span class="menu-section text-muted text-uppercase fs-8 ls-1">{{ __('Configurations') }}</span>
                </div>
            </div>
            <div class="menu-item">
                <a class="menu-link {{ request()->routeIs('settings.*') ? "active" : "" }}" href="{{ route('settings.index') }}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotone/general/gen019.svg-->
                            {!! theme()->getSvgIcon("icons/duotune/general/gen019.svg", "svg-icon-2") !!}
                        <!--end::Svg Icon-->
                    </span>
                    <span style="font-size:18px" class="menu-title">{{ __('Settings') }}</span>
                </a>
            </div>
            @can('adminFullApp')
                <div class="menu-item">
                    <a class="menu-link {{ request()->routeIs('translations.*') ? "active" : "" }}" href="/translations">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotone/maps/map004.svg-->
                            {!! theme()->getSvgIcon("icons/duotune/maps/map004.svg", "svg-icon-2") !!}
                        <!--end::Svg Icon-->
                    </span>
                        <span style="font-size:18px" class="menu-title">{{ __('Translations') }}</span>
                    </a>
                </div>
                @if(false)
                    <div data-kt-menu-trigger="click" class="menu-item menu-accordion {{ request()->routeIs('roles.*') ? "here show" : "" }}">
                        <span class="menu-link">
                            <span class="menu-icon">
                                <!--begin::Svg Icon | path: icons/duotone/Interface/Lock.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path opacity="0.25" fill-rule="evenodd" clip-rule="evenodd" d="M3.11117 13.2288C3.27137 11.0124 5.01376 9.29156 7.2315 9.15059C8.55778 9.06629 10.1795 9 12 9C13.8205 9 15.4422 9.06629 16.7685 9.15059C18.9862 9.29156 20.7286 11.0124 20.8888 13.2288C20.9535 14.1234 21 15.085 21 16C21 16.915 20.9535 17.8766 20.8888 18.7712C20.7286 20.9876 18.9862 22.7084 16.7685 22.8494C15.4422 22.9337 13.8205 23 12 23C10.1795 23 8.55778 22.9337 7.23151 22.8494C5.01376 22.7084 3.27137 20.9876 3.11118 18.7712C3.04652 17.8766 3 16.915 3 16C3 15.085 3.04652 14.1234 3.11117 13.2288Z" fill="#12131A" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M13 16.7324C13.5978 16.3866 14 15.7403 14 15C14 13.8954 13.1046 13 12 13C10.8954 13 10 13.8954 10 15C10 15.7403 10.4022 16.3866 11 16.7324V18C11 18.5523 11.4477 19 12 19C12.5523 19 13 18.5523 13 18V16.7324Z" fill="#12131A" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M7 6C7 3.23858 9.23858 1 12 1C14.7614 1 17 3.23858 17 6V10C17 10.5523 16.5523 11 16 11C15.4477 11 15 10.5523 15 10V6C15 4.34315 13.6569 3 12 3C10.3431 3 9 4.34315 9 6V10C9 10.5523 8.55228 11 8 11C7.44772 11 7 10.5523 7 10V6Z" fill="#12131A" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span>
                            <span class="menu-title">{{ __('Roles') }}</span>
                            <span class="menu-arrow"></span>
                        </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            <div class="menu-item {{ request()->routeIs('roles.index') ? "active" : "" }}">
                                <a class="menu-link" href="{{ route('roles.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('List roles') }}</span>
                                </a>
                            </div>
                            <div class="menu-item">
                                <a class="menu-link {{ request()->routeIs('permissions.index') ? "active" : "" }}" href="{{ route('permissions.index') }}">
                                    <span class="menu-bullet">
                                        <span class="bullet bullet-dot"></span>
                                    </span>
                                    <span class="menu-title">{{ __('List permissions') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            @endcan
        @endcan

    </div>
    {{--end::Menu--}}
</div>
{{--end::Aside Menu--}}
