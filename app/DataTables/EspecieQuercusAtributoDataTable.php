<?php

namespace App\DataTables;

use App\Models\EspecieQuercusAtributo;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Column;
use App\DataTables\Traits\DatatableColumnSearch;

class EspecieQuercusAtributoDataTable extends DataTable
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
            ->addColumn('action', function ($especieQuercusAtributo) {
                return '<a class="btn btn-sm btn-bg-light btn-color-primary btn-icon" href="'. route('especie-quercus-atributos.show', $especieQuercusAtributo) .'" title="'. __('View') .'">'. theme()->getSvgIcon("icons/duotune/general/gen004.svg", "svg-icon-2") .'</a>
                        <a class="btn btn-sm btn-bg-light btn-color-primary btn-icon" href="'. route('especie-quercus-atributos.edit', $especieQuercusAtributo) .'" title="'. __('Edit') .'">'. theme()->getSvgIcon("icons/duotune/art/art005.svg", "svg-icon-2") .'</a>
                        <button class="btn btn-sm btn-bg-light btn-color-primary btn-icon delete-confirmation" data-destroy-form-id="destroy-form-'. $especieQuercusAtributo->id .'" data-delete-url="'. route('especie-quercus-atributos.destroy', $especieQuercusAtributo) .'" onclick="destroyConfirmation(this)" title="'. __('Delete') .'">'. theme()->getSvgIcon("icons/duotune/general/gen027.svg", "svg-icon-2") .'</button>';
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
     * @param \App\Models\EspecieQuercusAtributo $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(EspecieQuercusAtributo $model)
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
            ->setTableId('especie_quercus_atributos-table')
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
        $model = new EspecieQuercusAtributo();
        return [
            Column::make('especie_quercus')->title($model->getAttributeLabel('especie_quercus')),
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
        return 'especie_quercus_atributos_' . date('YmdHis');
    }
}
