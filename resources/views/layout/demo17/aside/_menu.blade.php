<!--begin::Aside Menu-->
@php
    //$menu = bootstrap()->getAsideMenu();
    //\App\Core\Adapters\Menu::filterMenuPermissions($menu->items);
@endphp

<div
    class="w-100 hover-scroll-overlay-y scroll-ps d-flex"
    id="kt_aside_menu_wrapper"
    data-kt-scroll="true"
    data-kt-scroll-height="auto"
    data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
    data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu"
    data-kt-scroll-offset="0"
>
    <!--begin::Menu-->
    <div class="menu menu-column menu-title-gray-600 menu-state-primary menu-state-icon-primary menu-state-bullet-primary menu-icon-gray-400 menu-arrow-gray-400 fw-bold fs-6" id="#kt_aside_menu" data-kt-menu="true">
        {{-- $menu->build() --}}
        <div class="menu-item py-3">
            <a class="menu-link {{ request()->routeIs('home') ? "active" : "" }}" href="{{ route('home') }}" title="{{ __('Dashboard') }}" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                <span class="menu-icon">
                    <!--begin::Svg Icon | path: assets/media/icons/duotone/Design/PenAndRuller.svg-->
                    <span class="svg-icon svg-icon-2x">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3"></path>
                            <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000"></path>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </span>
            </a>
        </div>
        @can('manageUsers')
            <div class="menu-item py-3">
                <a class="menu-link {{ request()->routeIs('users.*') ? "active" : "" }}" href="{{ route('users.index') }}" title="{{ __('Users') }}" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotone/General/User.svg-->
                        <span class="svg-icon svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                    <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                                </g>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                </a>
            </div>
        @endcan
        @can('adminApp')
            <div class="menu-item py-3">
                <a class="menu-link {{ request()->routeIs('settings.*') ? "active" : "" }}" href="{{ route('settings.index') }}" title="{{ __('Settings') }}" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotone/general/gen019.svg-->
                        {!! theme()->getSvgIcon("icons/duotune/general/gen019.svg", "svg-icon-2x") !!}
                    <!--end::Svg Icon-->
                    </span>
                </a>
            </div>
            @can('adminFullApp')
                <div class="menu-item">
                    <a class="menu-link {{ request()->routeIs('translations.*') ? "active" : "" }}" href="/translations" title="{{ __('Translations') }}" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotone/maps/map004.svg-->
                                {!! theme()->getSvgIcon("icons/duotune/maps/map004.svg", "svg-icon-2") !!}
                            <!--end::Svg Icon-->
                        </span>
                    </a>
                </div>
            @endcan
        @endcan
    </div>
    <!--end::Menu-->
</div>
<!--end::Aside Menu-->
