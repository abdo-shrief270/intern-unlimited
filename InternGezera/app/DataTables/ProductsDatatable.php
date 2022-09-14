<?php

namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductsDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('image','admin.products.image')
            ->addColumn('action', 'admin.products.actions')
            ->rawColumns(['image','action']);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ProductsDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Product $model): QueryBuilder
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
            ->setTableId('productdatatable-table')
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
            ['name' => 'image'   , 'data' => 'image'      , 'title' => 'Image'],
            ['name' => 'buy_price'  , 'data' => 'buy_price'     , 'title' => 'Price'],
            ['name' => 'price'  , 'data' => 'price'     , 'title' => 'Sell Price'],
            ['name' => 'color'  , 'data' => 'color'     , 'title' => 'Color'],
            ['name' => 'description'  , 'data' => 'description'     , 'title' => 'Description'],
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
        return 'Products_' . date('YmdHis');
    }
}
