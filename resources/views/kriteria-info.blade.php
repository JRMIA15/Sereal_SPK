@extends('layouts.master')

@section('content')
    <!-- Premium Styles for Info Cards -->
    <style>
        .info-card {
            padding: 40px 30px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
            border-radius: 12px;
            background: #ffffff;
            border: 1px solid #edf2f7;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            height: 100%;
        }

        .info-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(255, 108, 0, 0.08);
            border-color: rgba(255, 108, 0, 0.25);
        }

        .info-card .f-icon {
            margin-bottom: 25px;
            background-color: #fff6f0;
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s ease;
        }

        .info-card:hover .f-icon {
            background-color: #ffebd8;
        }

        .info-card h4 {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 1.2rem;
            color: #222222;
            margin-bottom: 15px;
        }

        .info-card p {
            font-size: 0.95rem;
            line-height: 1.6;
            color: #666666;
            margin-bottom: 0;
        }
    </style>

    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Kriteria Sereal</h1>
                    <nav class="d-flex align-items-center">
                        <a href="{{ url('/') }}">Home<span class="lnr lnr-arrow-right" style="margin: 0 10px;"></span></a>
                        <a href="{{ url('/kriteria-info') }}">Kriteria Sereal</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!-- Start Criteria Area -->
    <section class="section_gap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="section-title">
                        <h1 style="font-weight: 700; color: #222222; margin-bottom: 20px;">Kriteria Pemilihan Sereal Sehat</h1>
                        <p style="color: #666666; max-width: 600px; margin: 0 auto; font-size: 1.05rem; line-height: 1.6;">
                            Berikut adalah beberapa kriteria gizi penting yang perlu diperhatikan saat memilih sereal untuk konsumsi harian agar mendapatkan manfaat gizi yang optimal.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <!-- Kriteria 1 -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="info-card">
                        <div class="f-icon">
                            <img src="{{ asset('assets/img/features/f-icon1.png') }}" alt="Serat Tinggi" style="width: 32px; height: auto;">
                        </div>
                        <h4>Kandungan Serat Tinggi</h4>
                        <p>Sereal yang baik memiliki minimal 3 gram serat per sajian untuk menjaga kesehatan pencernaan, mencegah sembelit, dan memberikan rasa kenyang lebih lama.</p>
                    </div>
                </div>
                <!-- Kriteria 2 -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="info-card">
                        <div class="f-icon">
                            <img src="{{ asset('assets/img/features/f-icon2.png') }}" alt="Rendah Gula" style="width: 32px; height: auto;">
                        </div>
                        <h4>Rendah Gula Tambahan</h4>
                        <p>Pilihlah sereal dengan kandungan gula kurang dari 8 gram per sajian untuk menghindari lonjakan gula darah instan yang cepat hilang dan berisiko bagi kesehatan.</p>
                    </div>
                </div>
                <!-- Kriteria 3 -->
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="info-card">
                        <div class="f-icon">
                            <img src="{{ asset('assets/img/features/f-icon3.png') }}" alt="Gandum Utuh" style="width: 32px; height: auto;">
                        </div>
                        <h4>Gandum Utuh (Whole Grain)</h4>
                        <p>Pastikan gandum utuh (seperti oatmeal, gandum utuh, atau beras cokelat) berada di urutan pertama dalam komposisi bahan untuk nutrisi alami yang lebih kaya.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Criteria Area -->
@endsection
