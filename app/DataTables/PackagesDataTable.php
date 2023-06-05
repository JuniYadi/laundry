<?php

namespace App\DataTables;

use App\Models\Packages;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PackagesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                return view('layouts.actions', [
                    "id" => $query->id,
                ]);
            })
            ->editColumn('is_setrika', function ($query) {
                return $query->is_setrika ? 'Ya' : 'Tidak';
            })
            ->editColumn('is_express', function ($query) {
                return $query->is_express ? 'Ya' : 'Tidak';
            })
            ->editColumn('harga', function ($query) {
                return rupiah($query->harga);
            })
            ->editColumn('estimasi_pengerjaan', function ($query) {
                return $query->estimasi_pengerjaan . ' Jam';
            })
            ->editColumn('updated_at', function ($query) {
                return \Carbon\Carbon::parse($query->updated_at)->diffForHumans();
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Packages $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('packages-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            // ->selectStyleSingle()
            ->buttons([
                // Button::make('excel'),
                // Button::make('csv'),
                // Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('nama'),
            Column::make('harga'),
            Column::make('estimasi_pengerjaan'),
            Column::make('is_setrika')->title('Setrika'),
            Column::make('is_express')->title('Express'),
            Column::make('updated_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(100)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Packages_' . date('YmdHis');
    }
}
