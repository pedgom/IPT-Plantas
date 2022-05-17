<!--begin::Container-->
<div id="kt_content_container" class="{{ theme()->printHtmlClasses('content-container', false) }}">
    @include('flash::message')
    {{ $slot }}
</div>
<!--end::Container-->
