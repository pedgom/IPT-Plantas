<?php

namespace App\DataTables;

use App\Models\Planta;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Column;
use App\DataTables\Traits\DatatableColumnSearch;

class PlantaDataTable extends DataTable
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
            ->addColumn('action', function ($planta) {
                return '<a class="btn btn-sm btn-bg-light btn-color-primary btn-icon" href="'. route('plantas.show', $planta) .'" title="'. __('View') .'">'. theme()->getSvgIcon("icons/duotune/general/gen004.svg", "svg-icon-2") .'</a>
                        <a class="btn btn-sm btn-bg-light btn-color-primary btn-icon" href="'. route('plantas.edit', $planta) .'" title="'. __('Edit') .'">'. theme()->getSvgIcon("icons/duotune/art/art005.svg", "svg-icon-2") .'</a>
                        <button class="btn btn-sm btn-bg-light btn-color-primary btn-icon delete-confirmation" data-destroy-form-id="destroy-form-'. $planta->id .'" data-delete-url="'. route('plantas.destroy', $planta) .'" onclick="destroyConfirmation(this)" title="'. __('Delete') .'">'. theme()->getSvgIcon("icons/duotune/general/gen027.svg", "svg-icon-2") .'</button>';
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
     * @param \App\Models\Planta $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Planta $model)
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
            ->setTableId('plantas-table')
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
        $model = new Planta();
        return [
            Column::make('abreviatura')->title($model->getAttributeLabel('abreviatura')),
            Column::make('nome_botanico')->title($model->getAttributeLabel('nome_botanico')),
            Column::make('nome_comum')->title($model->getAttributeLabel('nome_comum')),
            Column::make('tempo_crescimento')->title($model->getAttributeLabel('tempo_crescimento')),
            Column::make('notas')->title($model->getAttributeLabel('notas')),
            Column::make('curiosidades')->title($model->getAttributeLabel('curiosidades')),
            Column::make('descritor_atributo_id')->title($model->getAttributeLabel('descritor_atributo_id')),
            Column::make('ordem_atributo_id')->title($model->getAttributeLabel('ordem_atributo_id')),
            Column::make('familia_atributo_id')->title($model->getAttributeLabel('familia_atributo_id')),
            Column::make('genero_atributo_id')->title($model->getAttributeLabel('genero_atributo_id')),
            Column::make('situacao_ecologica_atributo_id')->title($model->getAttributeLabel('situacao_ecologica_atributo_id')),
            Column::make('persistencia_atributo_id')->title($model->getAttributeLabel('persistencia_atributo_id')),
            Column::make('o_relacao_atributo_id')->title($model->getAttributeLabel('o_relacao_atributo_id')),
            Column::make('usos_atributo_id')->title($model->getAttributeLabel('usos_atributo_id')),
            Column::make('aplicacoes_atributo_id')->title($model->getAttributeLabel('aplicacoes_atributo_id')),
            Column::make('colecoes_atributo_id')->title($model->getAttributeLabel('colecoes_atributo_id')),
            Column::make('forma_arv_atributo_id')->title($model->getAttributeLabel('forma_arv_atributo_id')),
            Column::make('forma_arb_atributo_id')->title($model->getAttributeLabel('forma_arb_atributo_id')),
            Column::make('forma_herb_atributo_id')->title($model->getAttributeLabel('forma_herb_atributo_id')),
            Column::make('cor_sintese_atributo_id')->title($model->getAttributeLabel('cor_sintese_atributo_id')),
            Column::make('estacao_sintese_atributo_id')->title($model->getAttributeLabel('estacao_sintese_atributo_id')),
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
        return 'plantas_' . date('YmdHis');
    }
}
