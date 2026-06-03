@extends('layouts.master')

@section('content')
    <!-- Premium UI Styles for Home Page -->
    <style>
        .banner-content h1 {
            font-family: 'Poppins', sans-serif;
            font-weight: 800;
            letter-spacing: -1.5px;
            color: #222222;
            line-height: 1.15;
            margin-bottom: 25px;
        }

        .banner-content p {
            font-size: 1.05rem;
            line-height: 1.6;
            color: #666666;
            margin-bottom: 35px;
            max-width: 480px;
        }

        /* Micro-animations for CTA Buttons */
        .add-bag {
            text-decoration: none !important;
            display: inline-flex;
            align-items: center;
            cursor: pointer;
        }

        .add-btn {
            height: 50px;
            width: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(90deg, #ffba00 0%, #ff6c00 100%);
            box-shadow: 0 8px 20px rgba(255, 108, 0, 0.25);
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .add-btn span {
            color: #ffffff !important;
            font-size: 1.1rem;
            transition: transform 0.3s ease;
        }

        .add-text {
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 0.85rem;
            letter-spacing: 1px;
            color: #222222;
            margin-left: 15px;
            transition: all 0.3s ease;
            text-transform: uppercase;
        }

        .add-bag:hover .add-btn {
            transform: scale(1.1) rotate(90deg);
            box-shadow: 0 10px 25px rgba(255, 108, 0, 0.4);
        }

        .add-bag:hover .add-btn span {
            transform: scale(1.1);
        }

        .add-bag:hover .add-text {
            color: #ff6c00;
            letter-spacing: 1.5px;
        }

        /* Cereal Image Floating Micro-animation */
        .banner-img {
            position: relative;
            text-align: center;
        }

        .banner-img img {
            max-width: 90%;
            height: auto;
            transition: all 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
            filter: drop-shadow(0 20px 30px rgba(0, 0, 0, 0.08));
        }

        .banner-img:hover img {
            transform: translateY(-15px) rotate(3deg);
            filter: drop-shadow(0 30px 45px rgba(0, 0, 0, 0.15));
        }
    </style>

    <!-- Start banner Area -->
    <section class="banner-area">
        <div class="container">
            <div class="row fullscreen align-items-center justify-content-start">
                <div class="col-lg-12">
                    <div class="active-banner-slider owl-carousel">
                        <!-- single-slide (Slide 1: Fruit Loops) -->
                        <div class="row single-slide align-items-center d-flex">
                            <div class="col-lg-5 col-md-6">
                                <div class="banner-content">
                                    <h1>Sereal Warna-Warni <br>Terfavorit!</h1>
                                    <p>Nikmati kelezatan sereal buah warna-warni yang kaya serat dan vitamin untuk memulai hari Anda dengan keceriaan dan energi melimpah.</p>
                                    <a class="add-bag" href="{{ route('kriteria-info') }}">
                                        <div class="add-btn">
                                            <span class="lnr lnr-arrow-right" style="transform: none !important; display: inline-block;"></span>
                                        </div>
                                        <span class="add-text">Lihat Kriteria Sereal</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="banner-img">
                                    <img class="img-fluid" src="{{ asset('assets/img/banner/fruitloop.png') }}" alt="Fruit Loops Cereal">
                                </div>
                            </div>
                        </div>
                        <!-- single-slide (Slide 2: Classic Cereal Banner) -->
                        <div class="row single-slide align-items-center d-flex">
                            <div class="col-lg-5 col-md-6">
                                <div class="banner-content">
                                    <h1>Pilihan Sereal <br>Diet Sehat!</h1>
                                    <p>Temukan kriteria sereal gandum utuh rendah gula dan lemak jenuh yang ideal untuk diet seimbang dan menjaga kesehatan jantung keluarga Anda.</p>
                                    <a class="add-bag" href="{{ route('kriteria-info') }}">
                                        <div class="add-btn">
                                            <span class="lnr lnr-arrow-right" style="transform: none !important; display: inline-block;"></span>
                                        </div>
                                        <span class="add-text">Lihat Kriteria Sereal</span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="banner-img">
                                    <img class="img-fluid" src="{{ asset('assets/img/banner/fruitloop.png') }}" alt="Healthy Cereal Banner">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->
@endsection
