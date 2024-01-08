<?php

namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;


class ProductDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', 'admin.product.datatables_actions')
            ->addColumn('parent_category_id', function (Product $product) {
                return $product->parentCategory->name;})

            ->addColumn('child_category_id', function (Product $product) {
                if(isset($product->childCategory->id)){
                return $product->childCategory->name;
               } else {
                return 'not define';
               }
            })
            ->addColumn('availability', function (Product $product) {
                if ($product->availability == 'on') {
                    return 'Yes';
                } else {
                    return 'No';
                }
            })
            ->addColumn('image', function (Product $product) {
                return '<img src="' . asset($product->getFirstMediaUrl('product.image')) . '" class="image-input-wrapper Krounded-circle w-50px h-50px" alt="alt text">';
            })
            ->rawColumns(['image', 'edit', 'delete', 'action'])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Product $model): QueryBuilder
    {

        return $model->newQuery()->select('id', 'name', 'price', 'availability', 'parent_category_id', 'child_category_id', 'sku');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('product-table')
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
            Column::make('image'),
            Column::make('name'),
            Column::make('price'),
            Column::make('availability'),
            Column::make('child_category_id')->title('Child Category'),
            Column::make('parent_category_id')->title('Parent Category'),
            Column::make('sku'),


        ];
        // dd($columns);


        if (Auth::user()->can('product.edit') || Auth::user()->can('product.delete')) {
            $columns = array_merge($columns, [Column::make('action')]);
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
        return 'Product_' . date('YmdHis');
    }
}
