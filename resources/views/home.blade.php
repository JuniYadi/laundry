@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-cash"></i> Total Pendapatan Bulan Ini</h5>
                        <p class="card-text">{{ rupiah($monthly_revenue) }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-cash"></i> Total Pendapatan Harian</h5>
                        <p class="card-text">{{ rupiah($today_revenue) }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="card bg-danger text-white">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-cart3"></i> Total Orders Harian</h5>
                        <p class="card-text">{{ $today_order }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <h5 class="card-title"><i class="bi bi-droplet-half"></i> Total Penggunaan Air Harian</h5>
                        <p class="card-text">{{ $today_water }}</p>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mt-4">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
