<?php

namespace App\DataTables;

use App\Models\Order;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OrdersDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->editColumn('action', function ($query) {
                return view('layouts.status', [
                    "id" => $query->id,
                    "status" => $query->status,
                    "iron" => $query->package->is_setrika
                ]);
            })
            ->editColumn('status', function ($query) {
                return config('state')[$query->status];
            })
            ->editColumn('berat_pakaian', function ($query) {
                return $query->berat_pakaian . ' Kg';
            })
            ->editColumn('total_harga', function ($query) {
                return rupiah($query->total_harga);
            })
            ->editColumn('updated_at', function ($query) {
                return \Carbon\Carbon::parse($query->updated_at)->diffForHumans();
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Order $model): QueryBuilder
    {
        return $model->newQuery()
            ->with(['customer', 'package', 'inventory']);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('orders-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(0)
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
            Column::make('customer.phone'),
            Column::make('package.nama')->title('Paket'),
            Column::make('berat_pakaian'),
            Column::make('total_harga'),
            Column::make('inventory.nama_mesin')->title('Mesin'),
            Column::make('status'),
            Column::make('updated_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(150)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Orders_' . date('YmdHis');
    }
}
