<?php

namespace App\DataTables;

use App\Models\User;
use Carbon\Carbon;
use DebugBar\DebugBar;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use App\DataTables\Traits\DatatableColumnSearch;

class UserDataTable extends DataTable
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
        //return datatables()->eloquent($query);
        $datatable =datatables()
            ->eloquent($query)
            ->editColumn('name', function ($user) {
                return '<a class="text-gray-800 text-hover-primary" href="'. route('users.show', $user) .'">'.$user->name.'</a>';
            })
            ->editColumn('created_at', '{!! date(\'d-m-Y H:i:s\', strtotime($created_at)) !!}')
            ->editColumn('email_verified_at',  function ($user) {
                return !empty($user->email_verified_at)  ? $user->email_verified_at->format('d-m-Y H:i:s') : '';
            })
            ->addColumn('role',  function ($user) {
                return $user->roles_label;
            })
            ->addColumn('action', function ($user) {

                //if(auth()->user()->id != $user->id && (auth()->user()->can('adminFullApp') || (auth()->user()->can('adminApp') && !$user->can('adminFullApp'))))
                if(auth()->user()->id != $user->id && (auth()->user()->can('adminFullApp')))
                    $impersonateHtml = '<li class="menu-item px-3"><a class="dropdown-item menu-link px-3" href="'. route('impersonate', $user->id) .'"><i class="la la-users me-2"></i> '. __('Impersonate') .'</a>';
                else
                    $impersonateHtml = '';
                return '<div class="dropdown">
                      <button class="btn btn-sm btn-light btn-active-light-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            '.__('Options').'
                      </button>
                      <ul class="dropdown-menu menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" >
                        <li class="menu-item px-3"><a class="dropdown-item menu-link px-3" href="'. route('users.show', $user) .'"><i class="la la-eye me-2"></i> '. __('View') .'</a></li>
                        '.$impersonateHtml.'
                        <li class="menu-item px-3"><a class="dropdown-item menu-link px-3 delete-confirmation" href="'. route('users.edit', $user) .'"><i class="la la-edit me-2"></i> '. __('Edit') .'</a></li>
                        <li class="menu-item px-3"><button class="dropdown-item menu-link px-3" data-destroy-form-id="destroy-form-'. $user->id .'" data-delete-url="'. route('users.destroy', $user) .'" onclick="destroyConfirmation(this)"><i class="la la-trash me-2"></i> '. __('Delete') .' </button>
                            <form id="destroy-form-'. $user->id .'" action="'. route('users.destroy', $user) .'" method="POST" style="display: none;">
                                        '.csrf_field().'
                                        '.method_field('DELETE').'
                            </form>
                        </li>
                      </ul>
                </div>';

            })
            ->rawColumns(['name','action'])
            ->setRowClass('text-gray-600 fw-bold');
        return $datatable;

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
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
            ->setTableId('users-table')
            ->columns($this->getColumns())
            ->minifiedAjax()

            //->dom("<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>><'table-responsive'rt>ip") // Bfrtip
            //->dom("Bfrtip") // Bfrtip
            ->dom(//"<'row'<'col-sm-12 col-md-6'f><'col-sm-12 col-md-6'B>>" .
            //"<'row'<'col-sm-12'tr>>" .
            "tr" .
            "<'row'<'col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start'li><'col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end'p>>")
            ->stateSave(false)
            //->responsive()
            ->autoWidth(false)
            ->pageLength(50)
            ->initComplete($this->searchJS)
            ->orderBy([0, 'desc'])
            ->parameters([
                'scrollX' => false,
                //'buttons'      => ['export'/*, 'print'*/],
                'language' => [
                    //'url' => asset('lang/pt/datatable.json')
                    'url' => asset('lang/pt/datatable-full.json'),
                    'buttons'=> [
                        'export' => 'Exportar',
                        'print' => 'Imprimir',
                    ]
                ]

            ])
            ->addTableClass('align-middle table-row-dashed fs-6 gy-5');

            /*->buttons(
                        Button::make('create'),
                        Button::make('export'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    );*/
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
            Column::make('email')->title(__('Email')),
            Column::make('email_verified_at')->title(__('Email verified at')), // ->title('teste')
            Column::make('created_at')->title(__('Created at')),
            Column::make('role')->orderable(false)->title(__('Role')),
            //Column::make('first_name'),
            //Column::make('intro')->orderable(false),
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
        return 'Users_' . date('YmdHis');
    }
}
