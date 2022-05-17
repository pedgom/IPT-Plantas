<?php

namespace App\DataTables\Traits;

trait DatatableColumnSearch
{
    /**
     * Notes: can add a data-regex = false to a column to disable rejex for select or regular input

    column.data().unique().sort().each( function ( d, j ) {
    select.append( '<option value=\\"'+d+'\\">'+d+'</option>' )
    } );
     */
    public $searchJS = <<<JS
        function() {
            //create a new row for filter the fields
            var numberColumns = $(this.api().table().header()).find('tr>th').length;
            var filterRow = $(this.api().table().header()).find('tr').clone(true).addClass('filters').empty();
            for (let i = 0; i < numberColumns; i++) {
                filterRow.append('<th></th>');
            }
            filterRow.appendTo($(this.api().table().header()));

            this.api().columns().every(function () {
                var column = this;
                var colIndex = $(column.header()).index();
                // read the information about search from the session
                var state = this.state.loaded();
                //don't show if have search_disabled activated
                if(!$(column.header()).hasClass('search_disabled')){
                    $(column.header()).parent().next().find('th')
                    if($(column.header()).data('options')){
                        var select = $('<select class="form-select form-select-solid form-select-sm"><option value=""></option></select>')
                        .appendTo( $(column.header()).parent().next().find('th').eq(colIndex).empty())
                        .on( 'change', function () {
                            var val = $.fn.dataTable.util.escapeRegex(
                                $(this).val()
                            );
                            if($(column.header()).data('regex') == false){
                                var regex = false;
                            }else{
                                var regex = true;
                                val = val ? '^' + val + "$": '';
                            }
                            column
                            .search( val, regex, false )
                            .draw();
                        } );
                        $.each($(column.header()).data('options'),function(key, value){
                            if(state != null){
                                var colSearch = state.columns[colIndex].search;
                                var searchTerm = colSearch.search;
                                if($(column.header()).data('regex') != false && searchTerm.length >= 3 ){
                                    searchTerm = searchTerm.substr(1).slice(0, -1);
                                }
                                //set the option if is set on session
                                if(key == searchTerm)
                                    select.append('<option value="' + key + '" selected>' + value + '</option>');
                                else
                                    select.append('<option value="' + key + '">' + value + '</option>');
                            }else{
                                select.append('<option value="' + key + '">' + value + '</option>');
                            }
                        });
                    }else if($(column.header()).data('datepicker')){
                        var inputGroup = document.createElement("div");
                        var input = document.createElement("input");
                        $(inputGroup).addClass('input-group datatable-datepicker')
                        .append(
                            $(input)
                            .addClass('form-control form-control-solid form-control-sm datatable-datepicker1')
                            .attr('data-input', '')
                        )
                        .append('<span class="input-group-text border-transparent" data-clear><i class="fas fa-times"></i></span>')
                        .appendTo($(column.header()).parent().next().find('th').eq(colIndex).empty());
                        $('.datatable-datepicker').flatpickr({
                            locale: "pt",
                            wrap: true,
                            onChange: function(selectedDates, dateStr, instance) {
                                if(dateStr.length != 0){
                                    //var date = moment(dateStr,'DD-MM-YYYY').format('YYYY-MM-DD');
                                    var val = $.fn.dataTable.util.escapeRegex(
                                        dateStr
                                    );
                                }else{
                                    var val = '';
                                }
                                if($(column.header()).data('regex') == false){
                                    var regex = false;
                                }else{
                                    var regex = true;
                                }
                                column
                                .search(val ? val : '', regex, false).draw();
                            }
                        });
                        //Restore search values from the session
                        if(state != null){
                            var colSearch = state.columns[colIndex].search;
                            console.log('input', )
                            if ( colSearch.search ) {
                                $(input).val(colSearch.search.replaceAll('\\\', ''));
                            }
                        }
                    }else{
                        var input = document.createElement("input");
                        $(input).addClass('form-control form-control-solid form-control-sm').appendTo($(column.header()).parent().next().find('th').eq(colIndex).empty())
                        .on('change', function () {
                            var val = $.fn.dataTable.util.escapeRegex($(this).val());
                            if($(column.header()).data('regex') == false){
                                var regex = false;
                                val = val.replaceAll(' ', '%');
                            }else{
                                var regex = true;
                            }

                            column.search(val ? val : '', regex, false).draw();
                        });
                        //Restore search values from the session
                        if(state != null){
                            var colSearch = state.columns[colIndex].search;
                            if ( colSearch.search ) {
                                var searchTerm = colSearch.search;
                                if($(column.header()).data('regex') == false){
                                    searchTerm = searchTerm.replaceAll('%', ' ');
                                }
                                $(input).val(searchTerm);
                            }
                        }

                    }
                }
            });
        }
JS;

}
