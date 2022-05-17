<!--begin::Aside-->
<div
	id="kt_aside"
	class="aside {{ theme()->printHtmlClasses('aside', false) }}"
    data-kt-drawer="true"
    data-kt-drawer-name="aside"
    data-kt-drawer-activate="{default: true, lg: false}"
    data-kt-drawer-overlay="true"
    data-kt-drawer-width="auto"
    data-kt-drawer-direction="start"
    data-kt-drawer-toggle="#kt_aside_toggle"
	>

    <!--begin::Logo-->
    <div class="aside-logo flex-column-auto py-13" id="kt_aside_logo">
        <a href="{{ route('home') }}">
            <img alt="Logo" src="{{ asset(theme()->getMediaUrlPath() . 'logos/logo-demo17.svg' ) }}" class="h-40px" />
        </a>
    </div>
    <!--end::Logo-->

    <!--begin::Nav-->
    <div class="aside-menu flex-column-fluid pt-0 pb-7 py-lg-10" id="kt_aside_menu">
        {{ theme()->getView('layout/aside/_menu') }}
    </div>
    <!--end::Nav-->


    <!--begin::Footer-->
    <div class="aside-footer flex-column-auto pb-5 pb-lg-10" id="kt_aside_footer">
		<!--begin::Menu-->
        <div class="d-flex flex-center w-100 scroll-px"
             data-bs-toggle="tooltip"
             data-bs-placement="right"
             data-bs-dismiss="click"
             title="{{ __('Documentation') }}">
            <a href="#" class="btn btn-custom">
                {!! theme()->getSvgIcon("icons/duotune/general/gen008.svg", "") !!}
            </a>
        </div>
		<!--end::Menu-->
	</div>
    <!--end::Footer-->
</div>
<!--end::Aside-->
