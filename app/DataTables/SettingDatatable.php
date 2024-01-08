<?php

namespace App\DataTables;

use App\Models\setting;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;


class SettingDataTable extends DataTable
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
            ->addColumn('action', 'admin.Setting.datatables_actions')
            ->addColumn('favicon', function (setting $Setting) {
                return '<img src="' . asset($Setting->getFirstMediaUrl('setting.favicon')) . '" class="image-input-wrapper Krounded-circle w-50px h-50px" alt="alt text">';
            })
            ->addColumn('sitelogo', function (setting $Setting) {
                return '<img src="' . asset($Setting->getFirstMediaUrl('setting.sitelogo')) . '" class="image-input-wrapper Krounded-circle w-50px h-50px" alt="alt text">';
            })
            ->rawColumns([ 'favicon','sitelogo','edit','delete','action'])
            ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\setting $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(setting $model): QueryBuilder
    {
        return $model->newQuery()->select('id', 'title', 'description','color1','color2','color3','color4','link','fblink','twlink','instalink', 'email','fixedheader');


    }

    /**
     * Optional method if you want to use html builder.
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('setting-table')
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
            Column::make('favicon'),
            Column::make('sitelogo'),
            Column::make('title'),
            Column::make('description'),
            Column::make('color1'),
            Column::make('color2'),
            Column::make('color3'),
            Column::make('color4'),
            Column::make('link'),
            Column::make('fblink'),
            Column::make('twlink'),
            Column::make('instalink'),
            Column::make('email'),
            Column::make('fixedheader')

        ];

        if(Auth::user()->can('setting.edit') || Auth::user()->can('setting.delete'))
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
        return 'Setting_' . date('YmdHis');
    }
}
