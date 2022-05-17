<?php

namespace App\DataTables;

use App\Models\Setting;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use App\DataTables\Traits\DatatableColumnSearch;


class SettingDataTable extends DataTable
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
            //->editColumn('type', '{{ $this->typeLabel }}')
            ->editColumn('created_at', '{!! date(\'d-m-Y H:i:s\', strtotime($created_at)) !!}')
            ->editColumn('type', function ($model) {
                return  $model->typeLabel;
            })
            ->addColumn('action', function ($setting) {
                return '<a href="'. route('settings.show', $setting) .'" title="'. __('View') .'" class="btn btn-sm btn-bg-light btn-color-primary btn-icon">'. theme()->getSvgIcon("icons/duotune/general/gen004.svg", "svg-icon-2") .'</a>
                        <a href="'. route('settings.edit', $setting) .'" title="'. __('Edit') .'" class="btn btn-sm btn-bg-light btn-color-primary btn-icon">'. theme()->getSvgIcon("icons/duotune/art/art005.svg", "svg-icon-2") .'</a>
                        <button class="btn btn-sm btn-bg-light btn-color-primary btn-icon delete-confirmation" data-destroy-form-id="destroy-form-'. $setting->id .'" data-delete-url="'. route('settings.destroy', $setting) .'" onclick="destroyConfirmation(this)" title="'. __('Delete') .'">'. theme()->getSvgIcon("icons/duotune/general/gen027.svg", "svg-icon-2") .'</button>';
            })->filterColumn('group', function($query, $keyword) {
                $query->where('group', 'like', "%{$keyword}%");
            })
            ->setRowClass('text-gray-600 fw-bold');
            /*->filterColumn('type', function($query, $keyword) {
                //$sql = "CONCAT(users.first_name,'-',users.last_name)  like ?";
                //$query->whereRaw($sql, ["%{$keyword}%"]);
                $query->where('type', 1);
            });*/
    }

    /**
     * Get query source of dataTable.
     *
     * @param Setting $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Setting $model)
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
            ->setTableId('settings-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom("tr<'row'<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'li><'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>>")
             //   ->searchCols([ 'type' => "(1|2)"])
             ->stateSave(true)
            ->responsive()
            ->autoWidth(false)
            ->initComplete($this->searchJS)
            ->pageLength(50)
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
            ->addTableClass('align-middle table-row-dashed fs-6 gy-5');;
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            //Column::make('id'),
            Column::make('type')
                ->attributes(['data-options' => json_encode(Setting::getTypeArray())])->title(__('Type')),
            Column::make('group')->title(__('Group')),
            Column::make('name')->title(__('Name')),
            //Column::make('slug'),
            //Column::make('options'),
            Column::make('value')->title(__('Value')),
            //Column::make('order'),
            //Column::make('created_at'),
            //Column::make('updated_at'),
            Column::computed('action')->title(__('Action'))
                ->exportable(false)
                ->printable(false)
                ->width(120)
                ->responsivePriority(-1)
                ->addClass('text-center search_disabled'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Setting_' . date('YmdHis');
    }
}
