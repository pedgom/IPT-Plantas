<?php

namespace App\DataTables;

use App\Models\Demo;
use Carbon\Carbon;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Column;
use App\DataTables\Traits\DatatableColumnSearch;

class DemoDataTable extends DataTable
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
            ->editColumn('status', function ($model) {
                return  $model->statusLabel;
            })
            ->editColumn('date', function ($model){
                return !empty($model->date) ? Carbon::Parse($model->date)->format('d-m-Y') : '';
            })
            //this is required since the field is not null otherwise we can use the name user.name
            ->addColumn('userName', function ($demo) {
                return !empty($demo->user) ? $demo->user->name : "";
            })
            ->addColumn('action', function ($demo) {
                return '<a class="btn btn-sm btn-bg-light btn-color-primary btn-icon" href="'. route('demos.show', $demo) .'" title="'. __('View') .'">'. theme()->getSvgIcon("icons/duotune/general/gen004.svg", "svg-icon-2") .'</a>
                        <a class="btn btn-sm btn-bg-light btn-color-primary btn-icon" href="'. route('demos.edit', $demo) .'" title="'. __('Edit') .'">'. theme()->getSvgIcon("icons/duotune/art/art005.svg", "svg-icon-2") .'</a>
                        <button class="btn btn-sm btn-bg-light btn-color-primary btn-icon delete-confirmation" data-destroy-form-id="destroy-form-'. $demo->id .'" data-delete-url="'. route('demos.destroy', $demo) .'" onclick="destroyConfirmation(this)" title="'. __('Delete') .'">'. theme()->getSvgIcon("icons/duotune/general/gen027.svg", "svg-icon-2") .'</button>';
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
     * @param \App\Models\Demo $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Demo $model)
    {
        return $model->newQuery()->with('user')->select(['demos.*']);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('demos-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom("tr<'row'<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'li><'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>>")
            ->stateSave(true)
            ->stateDuration(60*60*1) // time in seconds
            ->responsive()
            ->pageLength(50)
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
        $model = new Demo();
        return [
            //is user.name is required
            /*Column::make('user.name')
                //->name('user.name')
                //->attributes(['data-options' => json_encode(\App\Models\User::all()->pluck('name', 'name')), 'data-regex' => 'false'])
                ->title($model->getAttributeLabel($model->getAttributeLabel('user_id'))),*/
            //since the user can be null whe need to change the make to not use the relation user.name
            Column::make('userName')
                ->name('user.name')
                //->attributes(['data-options' => json_encode(\App\Models\User::all()->pluck('name', 'name')), 'data-regex' => 'false'])
                ->title($model->getAttributeLabel($model->getAttributeLabel('user_id'))),
            //Column::make('demo_id')->title($model->getAttributeLabel('demo_id')),
            //Column::make('user_id')->title($model->getAttributeLabel('user_id')),
            // the regex to false will search all word in a string even there are other words in middle
            // For example the name "João Manual Ferreira", if we search João Ferreira it will find it
            Column::make('name')->name('demos.name')->title($model->getAttributeLabel('name'))->attributes(['data-regex' => 'false']),
            //Column::make('body')->title($model->getAttributeLabel('body')),
            //Column::make('optional')->title($model->getAttributeLabel('optional')),
            //Column::make('body_optional')->title($model->getAttributeLabel('body_optional')),
            Column::make('value')->title($model->getAttributeLabel('value')),
            Column::make('date')->title($model->getAttributeLabel('date'))->attributes(['data-datepicker' => 'true']),
            //Column::make('datetime')->title($model->getAttributeLabel('datetime')),
            //Column::make('checkbox')->title($model->getAttributeLabel('checkbox')),
            //Column::make('privacy_policy')->title($model->getAttributeLabel('privacy_policy')),
            Column::make('status')
                ->attributes(['data-options' => json_encode(Demo::getStatusArray())])->title($model->getAttributeLabel('status')),
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
        return 'demos_' . date('YmdHis');
    }
}
