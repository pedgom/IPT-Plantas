<?php

namespace App\DataTables;

use App\Models\FormaArbustoAtributo;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Column;
use App\DataTables\Traits\DatatableColumnSearch;

class FormaArbustoAtributoDataTable extends DataTable
{
    use DatatableColumnSearch;

    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('created_at', '{!! date(\'d-m-Y H:i:s\', strtotime($created_at)) !!}')
            ->editColumn('forma_arbusto', function($formaArbustoAtributo){
                return $formaArbustoAtributo->forma_arbusto;
            })
            ->addColumn('action', function ($formaArbustoAtributo) {
                return '<a class="btn btn-sm btn-bg-light btn-color-primary btn-icon" href="'. route('formaArbustoAtributos.show', $formaArbustoAtributo) .'" title="'. __('View') .'">'. theme()->getSvgIcon("icons/duotune/general/gen004.svg", "svg-icon-2") .'</a>
                        <a class="btn btn-sm btn-bg-light btn-color-primary btn-icon" href="'. route('formaArbustoAtributos.edit', $formaArbustoAtributo) .'" title="'. __('Edit') .'">'. theme()->getSvgIcon("icons/duotune/art/art005.svg", "svg-icon-2") .'</a>
                        <button class="btn btn-sm btn-bg-light btn-color-primary btn-icon delete-confirmation" data-destroy-form-id="destroy-form-'. $formaArbustoAtributo->id .'" data-delete-url="'. route('formaArbustoAtributos.destroy', $formaArbustoAtributo) .'" onclick="destroyConfirmation(this)" title="'. __('Delete') .'">'. theme()->getSvgIcon("icons/duotune/general/gen027.svg", "svg-icon-2") .'</button>';
            })
            ->setRowClass('text-gray-600 fw-bold');
            //->editColumn('type', '{{ $this->typeLabel }}')
            /*->editColumn('type', function ($model) {
                              return  $model->typeLabel;
                          })*/
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\FormaArbustoAtributo $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(FormaArbustoAtributo $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('forma_arbusto_atributos-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom("tr<'row'<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'li><'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>>")
            ->stateSave(true)
            ->responsive()
            ->autoWidth(false)
            ->initComplete($this->searchJS)
            ->orderBy([0, 'desc'])
            ->parameters([
                'buttons' => [],
                'language' => [
                    'url' => asset('lang/pt/datatable-full.json'),
                    'buttons'=> [
                        'export' => 'Exportar',
                        'print' => 'Imprimir',
                    ]
                ]
            ])
            ->addTableClass('align-middle table-row-dashed fs-6 gy-5');
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        $model = new FormaArbustoAtributo();
        return [
            Column::make('forma_arbusto')->title($model->getAttributeLabel('forma_arbusto')),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(120)
                ->responsivePriority(-1)
                ->addClass('text-center search_disabled')
                ->title(__('Action')),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'forma_arbusto_atributos_' . date('YmdHis');
    }
}
