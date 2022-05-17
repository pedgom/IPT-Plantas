<?php
view()->share('pageTitle', __('Users'));
view()->share('hideSubHeader', true);
?>
<x-base-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('users.index') }}
    @endsection
    @push('firstStyles')
        <link href="{{ assetCustom('/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
    @endpush


    <!--begin::Card-->
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                        {!! theme()->getSvgIcon("icons/duotune/general/gen021.svg", "svg-icon-1 position-absolute ms-6") !!}
                    <!--end::Svg Icon-->
                    <input type="text" data-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="{{ __('Search users') }}" />
                </div>
                <!--end::Search-->
            </div>
            <!--end::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end">
                    <!--begin::Export-->
                    <div id="datatable-buttons"></div>
                    <!--end::Export-->
                    @can('manageUsers')
                        <!--begin::Add customer-->
                        <a href="{{ route('users.create') }}" class="btn btn-primary">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                {!! theme()->getSvgIcon("icons/duotune/arrows/arr075.svg", "svg-icon-2") !!}
                            <!--end::Svg Icon-->
                            {{ __('New user') }}
                        </a>
                        <!--end::Add customer-->
                    @endcan
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body pt-0">
            <!--begin::Table-->
            {{ $dataTable->table() }}
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->

    @if(false)
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    <span class="card-icon">
                        <i class="flaticon2-user text-primary"></i>
                    </span>
                    <h3 class="card-label">
                        {{ __('Users') }}
                    </h3>
                </div>
                <div class="card-toolbar">
                    <div class="dropdown dropdown-inline" id="datatable-buttons">
                    </div>
                    @can('manageUsers')
                        <a href="{{ route('users.create') }}" class="btn btn-sm btn-light-primary font-weight-bold">
                            <i class="la la-plus"></i>
                            {{ __('New user') }}
                        </a>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <!--begin: Datatable classes table dataTable no-footer -->
                {{ $dataTable->table(['class' => 'table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline']) }}
                <!--end: Datatable -->

            </div>
        </div>
        <!--end::Card-->
    @endif
    @push('scripts')
        <script src="{{ assetCustom('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
        {{$dataTable->scripts()}}
        <script>
            $(function(){
                $.fn.dataTable.Buttons.defaults.dom.container.className = '';
                $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-light-primary me-3';
                var buttons = new $.fn.dataTable.Buttons(window.LaravelDataTables["users-table"], {
                    buttons: [
                        'export',
                        //'print',
                        /*{
                            text: 'Orange',
                            className: 'orange'
                        }*/
                    ]
                }).container().appendTo($('#datatable-buttons'));
                handleSearchDatatable(window.LaravelDataTables["users-table"]);
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
                        //jQuery("#"+_this.data('destroy-form-id')).submit();
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
                            jQuery('#users-table').DataTable().draw(false);
                        });
                        /*swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )*/
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



