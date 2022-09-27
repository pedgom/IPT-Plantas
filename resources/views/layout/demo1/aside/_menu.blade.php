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


        @can('adminFullApp')
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


    </div>
    {{--end::Menu--}}
</div>
{{--end::Aside Menu--}}
