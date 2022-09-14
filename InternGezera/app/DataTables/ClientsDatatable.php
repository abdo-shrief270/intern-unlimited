<?php

namespace App\DataTables;

use App\Models\Client;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Services\DataTable;

class ClientsDatatable extends DataTable
{

    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'admin.clients.actions')
            ->rawColumns(['action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ClientsDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */

    public function query(Client $model): QueryBuilder
    {
       return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */

    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('clientdatatable-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->parameters([
                'lengthMenu'   => [10, 15, 20, 50],
                'order' => [
                    1, 'desc'
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns(): array
    {
        return [
            ['name' => 'id'     , 'data' => 'id'        , 'title' => 'ID'],
            ['name' => 'name'   , 'data' => 'name'      , 'title' => 'Name'],
            ['name' => 'phone'  , 'data' => 'phone'     , 'title' => 'Phone Number'],
            ['name' => 'tax_number'  , 'data' => 'tax_number'     , 'title' => 'Tax Number'],
            ['name' => 'action' , 'data' => 'action'    , 'title' => 'Action', 'orderable' => false, 'searchable' => false],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Clients_' . date('YmdHis');
    }
}
