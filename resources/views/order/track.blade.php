@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12 col-xs-12 mb-4">
                <div class="card">
                    <div class="card-header">{{ __('Order Detail') }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>Order ID</td>
                                            <td>{{ $order->id }}</td>
                                        </tr>
                                        <tr>
                                            <td>Sudah Dibayar</td>
                                            <td>{{ $order->is_paid ? __('Sudah') : __('Tidak') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Berat Pakaian</td>
                                            <td>{{ $order->berat_pakaian }} Kg</td>
                                        </tr>
                                        <tr>
                                            <td>Total Harga</td>
                                            <td>{{ rupiah($order->total_harga) }}</td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>{{ config('state')[$order->status] }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>Estimasi Pengerjaan</td>
                                            <td>{{ $order->estimasi }} Jam</td>
                                        </tr>
                                        <tr>
                                            <td>Order Date</td>
                                            <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d-M-Y h:i:s') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Order Update</td>
                                            <td>{{ \Carbon\Carbon::parse($order->updated_at)->fromNow() }}</td>
                                        </tr>
                                        <tr>
                                            <td>Refund</td>
                                            <td>{{ $order->is_refund ? __('Ya') : __('Tidak') }}</td>
                                        </tr>
                                        @if ($order->is_refund)
                                            <tr>
                                                <td>Total Refund</td>
                                                <td>{{ $order->refund_amount }}</td>
                                            </tr>
                                        @endif
                                        <tr>
                                            <td>Keterangan</td>
                                            <td>{{ $order->keterangan }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-12 col-xs-12 mb-4">
                <div class="card">
                    <div class="card-header">{{ __('Order Tracking') }}</div>

                    <div class="card-body">

                        @if ($order->status !== 'DONE')
                            <p class="fw-bold">Estimasi pakaian anda akan selesai dalam
                                {{ timecalc($order->created_at, $order->estimasi) }}
                            </p>
                        @else
                            <p class="fw-bold">Kami bersihkan pakaian anda dalam waktu
                                {{ diffTime($order->created_at, $order->updated_at) }} anda melakukan order di kami. Terima
                                Kasih atas kepercayannya.
                            </p>
                        @endif



                        <ul class="list-group flex-column-reverse">
                            @foreach ($order->logs as $log)
                                <li class="list-group-item @if ($loop->last) {{ __('active') }} @endif">
                                    [{{ \Carbon\Carbon::parse($log->created_at)->format('d-M-Y h:i:s') }}]
                                    {{ config('state')[$log->status] }} -
                                    {{ \Carbon\Carbon::parse($log->created_at)->fromNow() }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
