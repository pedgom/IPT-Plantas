<?php

namespace App\DataTables;

use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use App\Models\Permission;

class PermissionDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $datatable =datatables()
            ->eloquent($query)
            ->editColumn('created_at', '{!! date(\'d-m-Y H:i:s\', strtotime($created_at)) !!}')
            //->editColumn('created_at', '{{ Carbon\Carbon::parse(created_at)->toDateTimeString() }}');
            ->addColumn('action', function ($permission) {
                return '<a href="'. route('permissions.show', $permission) .'" title="'. __('View') .'" class="btn btn-sm btn-bg-light btn-color-primary btn-icon">'. theme()->getSvgIcon("icons/duotune/general/gen004.svg", "svg-icon-2") .'</a>
                        <a href="'. route('permissions.edit', $permission) .'" title="'. __('Edit') .'" class="btn btn-sm btn-bg-light btn-color-primary btn-icon">'. theme()->getSvgIcon("icons/duotune/art/art005.svg", "svg-icon-2") .'</a>
                        <button class="btn btn-sm btn-bg-light btn-color-primary btn-icon delete-confirmation" data-destroy-form-id="destroy-form-'. $permission->id .'" data-delete-url="'. route('permissions.destroy', $permission) .'" onclick="destroyConfirmation(this)" title="'. __('Delete') .'">'. theme()->getSvgIcon("icons/duotune/general/gen027.svg", "svg-icon-2") .'</button>';
            })
            ->setRowClass('text-gray-600 fw-bold');
        return $datatable;
    }

    /**
     * Get query source of dataTable.
     *
     * @param Permission $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Permission $model)
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
                    ->setTableId('permissions-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom("tr<'row'<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'li><'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>>")
                    ->stateSave(true)
                    ->responsive()
                    ->autoWidth(false)
                    //->initComplete($this->searchJS)
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
        $columns = [
            Column::make('id')->title(__('ID')),
            Column::make('name')->title(__('Name')),
            //Column::make('guard_name'),
            Column::make('created_at')->title(__('Created at')),
            //Column::make('updated_at'),


        ];
        $columns[]=Column::computed('action')
            ->exportable(false)
            ->printable(false)
            ->width(120)
            ->responsivePriority(-1)
            ->addClass('text-center search_disabled');
        return $columns;
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Permission_' . date('YmdHis');
    }
}
