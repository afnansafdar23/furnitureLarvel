<?php

namespace App\DataTables;

use App\Models\productSize;
use App\Models\ParentCategory;
use App\Models\ChildCategory;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;


class ProductSizeDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable( $query))
            ->addColumn('action', 'admin.Product-size.datatables_actions')
            ->addColumn('parent_category_id', function (productSize $product) {
                return $product->parentCategory->name;})
           ->addColumn('child_category_id', function (productSize $product) {
                    return $product->childCategory->name;})
            ->rawColumns(['delete','action'])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ParentCategory $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(productSize $model): QueryBuilder
    {
        return $model->newQuery()->select('id', 'name', 'dimension', 'parent_category_id', 'child_category_id');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('size-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->parameters(
                config('datatables-buttons.parameters')
            );;
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        $columns = [
            Column::make('id'),
            Column::make('name'),
            Column::make('dimension'),
            Column::make('child_category_id')->title('Child Category'),
            Column::make('parent_category_id')->title('Parent Category')


        ];

        if(Auth::user()->can('size.delete'))
        {
            $columns = array_merge($columns,[Column::make('action')]);
        }

        return $columns;
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'ProductSize_' . date('YmdHis');
    }
}
