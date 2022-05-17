<?php
view()->share('pageTitle', __('Permissions'));
view()->share('hideSubHeader', true);
?>
<x-base-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('permissions.index') }}
    @endsection
    @push('firstStyles')
        <link href="{{ assetCustom('/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    @endpush
<!--begin::Card-->
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="black" />
                            <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    <input type="text" data-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="{{ __('Search permissions') }}" />
                </div>
                <!--end::Search-->
            </div>
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end">
                    <!--begin::Export-->
                    <div id="datatable-buttons"></div>
                    <!--end::Export-->
                    @can('adminFullApp')
                        <a href="{{ route('permissions.create') }}" class="btn btn-primary">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="black"></rect>
                                    <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="black"></rect>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            {{ __('New permission') }}
                        </a>
                    @endcan
                </div>
                <!--end::Toolbar-->
            </div>
        </div>
        <div class="card-body pt-0">
            <!--begin::Table-->
            {{ $dataTable->table() }}
            <!--end::Table-->
        </div>
    </div>
    <!--end::Card-->
    @push('scripts')
        <script src="{{ assetCustom('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
        {{$dataTable->scripts()}}
        <script>
            $(function(){
                $.fn.dataTable.Buttons.defaults.dom.container.className = '';
                $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-light-primary me-3';
                var buttons = new $.fn.dataTable.Buttons(window.LaravelDataTables["permissions-table"], {
                    buttons: [
                        'export',
                    ]
                }).container().appendTo($('#datatable-buttons'));
                handleSearchDatatable(window.LaravelDataTables["permissions-table"]);
            });
            function destroyConfirmation(e){
                var _this =  jQuery(e);
                swal.fire({
                    title: '{{ __('Are you sure you want to delete this?') }}',
                    text: "{!! __("You won't be able to revert this!") !!}",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: "{{ __('Yes, delete it!') }}"
                }).then(function(result) {
                    if (result.value) {
                        jQuery.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        jQuery.ajax({
                            url: _this.data('delete-url'),
                            type: 'POST',
                            dataType: 'json',
                            data: {_method: 'DELETE'}
                        }).always(function (data) {
                            jQuery('#permissions-table').DataTable().draw(false);
                        });
                    }
                });
            }

            var handleSearchDatatable = (datatable) => {
                const filterSearch = document.querySelector('[data-table-filter="search"]');
                filterSearch.addEventListener('keyup', function (e) {
                    datatable.search(e.target.value).draw();
                });
            }
        </script>
    @endpush

</x-base-layout>
