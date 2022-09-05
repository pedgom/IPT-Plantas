<?php
view()->share('pageTitle', __('Origem Relacao Atributos'));
view()->share('hideSubHeader', true);
?>
<x-base-layout>
    @section('breadcrumbs')
        {{ Breadcrumbs::render('origemRelacaoAtributos.index') }}
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
                    {!! theme()->getSvgIcon("icons/duotune/general/gen021.svg", "svg-icon-1 position-absolute ms-6") !!}
                    <input type="text" data-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="{{ __('Search Origem Relacao Atributo') }}" />
                </div>
                <!--end::Search-->
            </div>
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end">
                    <!--begin::Export-->
                    <div id="datatable-buttons"></div>
                    <!--end::Export-->

                    <a href="{{ route('origemRelacaoAtributos.create') }}" class="btn btn-primary">
                        {!! theme()->getSvgIcon("icons/duotune/arrows/arr075.svg", "svg-icon-2") !!}
                        {{ __('New Origem Relacao Atributo') }}
                    </a>

                </div>
                <!--end::Toolbar-->
            </div>
        </div>
        <div class="card-body pt-0">
            <!--begin::Table-->
            {{ $dataTable->table([], true) }}
            <!--end::Table-->
        </div>
    </div>
    <!--end::Card-->

    @push('scripts')
        <script src="{{ assetCustom('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
        <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
        {{ $dataTable->scripts() }}
        <script>

            $(function(){
                $.fn.dataTable.Buttons.defaults.dom.container.className = '';
                $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-light-primary me-3';
                var buttons = new $.fn.dataTable.Buttons(window.LaravelDataTables["origem_relacao_atributos-table"], {
                    buttons: [
                        'export',
                    ]
                }).container().appendTo($('#datatable-buttons'));
                handleSearchDatatable(window.LaravelDataTables["origem_relacao_atributos-table"]);
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
                            jQuery('#origem_relacao_atributos-table').DataTable().draw(false);
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
