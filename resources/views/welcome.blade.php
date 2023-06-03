@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="row justify-content-center">

            <div class="col-md-12">
                <div class="container col-xl-10 col-xxl-8 px-4 py-5">
                    <div class="row align-items-center g-lg-5 py-5">
                        <div class="col-lg-7 text-center text-lg-start">
                            <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">Simplify Your Laundry, One Click at a
                                Time!</h1>
                            <p class="col-lg-10 fs-4">Ucapkan selamat tinggal pada kompleksitas layanan laundry tradisional.
                                Dengan {{ env('APP_NAME') }}, Anda dapat menjadwalkan pengambilan, memilih layanan yang
                                diinginkan
                                (cuci, dry clean, setrika, lipat), dan mengatur pengantaran, semua dengan sekali klik. Kami
                                membuat laundry menjadi se-mudah yang seharusnya.</p>
                        </div>
                        <div class="col-md-10 mx-auto col-lg-5">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form class="p-4 p-md-5 border rounded-3 bg-body-tertiary" method="POST"
                                action="{{ route('order.store') }}">
                                @csrf

                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" name="beratPakaian" id="beratPakaian"
                                        placeholder="1">
                                    <label for="beratPakaian">Berat Pakaian (Kg)</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <select class="form-control" id="paketLaundry" name="paketLaundry">
                                        <option value="">Pilih Paket Laundry Anda</option>

                                        @foreach ($packages as $package)
                                            <option value="{{ $package->id }}">{{ $package->nama }} - Rp.
                                                {{ $package->harga }}/Kg - {{ $package->estimasi_pengerjaan }} Jam</option>
                                        @endforeach

                                    </select>
                                    <label for="paketLaundry">Paket Laundry</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" name="nomorTelpon" id="nomorTelpon"
                                        placeholder="Nomor Telpon">
                                    <label for="nomorTelpon">Nomor Telpon Anda</label>
                                </div>
                                <button class="w-100 btn btn-lg btn-primary" type="submit">Order</button>
                                <hr class="my-4">
                                <small class="text-body-secondary">Anda akan menerima nomor order setelah
                                    mengklik tombol Order.</small>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="container px-4 py-5">
        <div class="row row-cols-1 row-cols-md-2 align-items-md-center g-5 py-5">
            <div class="col d-flex flex-column align-items-start gap-2">
                <h2 class="fw-bold text-body-emphasis">Klik untuk Laundry Lebih Mudah</h2>
                <p class="text-body-secondary">Atur laundry dengan mudah melalui website kami hanya dengan sekali klik.</p>
                <a href="#" class="btn btn-primary btn-lg">Order Sekarang</a>
            </div>

            <div class="col">
                <div class="row row-cols-1 row-cols-sm-2 g-4">
                    <div class="col d-flex flex-column gap-2">
                        <div
                            class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                            <svg class="bi" width="1em" height="1em">
                                <use xlink:href="#collection" />
                            </svg>
                        </div>
                        <h4 class="fw-semibold mb-0 text-body-emphasis">Partner Laundry Terpercaya</h4>
                        <p class="text-body-secondary">Dipercaya oleh mitra laundry profesional untuk hasil terbaik dan
                            kepuasan pelanggan.</p>
                    </div>

                    <div class="col d-flex flex-column gap-2">
                        <div
                            class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                            <svg class="bi" width="1em" height="1em">
                                <use xlink:href="#gear-fill" />
                            </svg>
                        </div>
                        <h4 class="fw-semibold mb-0 text-body-emphasis">Praktis dalam Sekali Klik</h4>
                        <p class="text-body-secondary">Jadwalkan pengambilan, pilih layanan, dan pantau laundry Anda dalam
                            sekejap.</p>
                    </div>

                    <div class="col d-flex flex-column gap-2">
                        <div
                            class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                            <svg class="bi" width="1em" height="1em">
                                <use xlink:href="#speedometer" />
                            </svg>
                        </div>
                        <h4 class="fw-semibold mb-0 text-body-emphasis">Lacak Real-Time</h4>
                        <p class="text-body-secondary">Pantau status laundry Anda mulai dari pengambilan hingga pengantaran
                            dalam waktu nyata.</p>
                    </div>

                    <div class="col d-flex flex-column gap-2">
                        <div
                            class="feature-icon-small d-inline-flex align-items-center justify-content-center text-bg-primary bg-gradient fs-4 rounded-3">
                            <svg class="bi" width="1em" height="1em">
                                <use xlink:href="#table" />
                            </svg>
                        </div>
                        <h4 class="fw-semibold mb-0 text-body-emphasis">Pembayaran Aman dan Fleksibel</h4>
                        <p class="text-body-secondary">Pilih metode pembayaran yang aman dan sesuai kebutuhan Anda.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
