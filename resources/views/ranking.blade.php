@extends('layouts.master')

@section('content')
    <!-- CSS styles for ranking page elements -->
    <style>
        .ranking-card {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
            border: none;
            padding: 35px;
            margin-top: 35px;
            margin-bottom: 50px;
        }

        .ranking-title {
            color: #1a202c;
            font-weight: 700;
            font-size: 1.6rem;
            margin-bottom: 8px;
        }

        .ranking-subtitle {
            color: #718096;
            font-size: 0.95rem;
            margin-bottom: 30px;
        }

        .btn-action-outline {
            background-color: transparent;
            border: 2px solid #ff6c00;
            color: #ff6c00 !important;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 6px;
            transition: all 0.2s ease;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            text-decoration: none !important;
            display: inline-flex;
            align-items: center;
            height: 44px;
        }

        .btn-action-outline:hover {
            background-color: #ff6c00;
            color: #ffffff !important;
            transform: translateY(-1px);
        }

        .btn-action-solid {
            background-color: #1E9F94;
            color: #ffffff !important;
            font-weight: 600;
            padding: 10px 20px;
            border-radius: 6px;
            transition: all 0.2s ease;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            text-decoration: none !important;
            display: inline-flex;
            align-items: center;
            border: none;
            height: 44px;
            box-shadow: 0 2px 4px rgba(30, 159, 148, 0.2);
            cursor: pointer;
        }

        .btn-action-solid:hover {
            background-color: #158278;
            box-shadow: 0 4px 12px rgba(30, 159, 148, 0.35);
            transform: translateY(-1px);
        }

        .best-recommendation-card {
            background-color: #fffbeb;
            border: 1px solid #fef3c7;
            border-left: 5px solid #d97706;
            border-radius: 8px;
            padding: 25px;
            margin-bottom: 35px;
            box-shadow: 0 4px 12px rgba(217, 119, 6, 0.05);
        }

        .best-recommendation-card .trophy-icon-wrapper {
            background-color: #fef3c7;
            border-radius: 50%;
            width: 55px;
            height: 55px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px dashed #d97706;
        }

        .best-recommendation-card .trophy-icon {
            font-size: 1.6rem;
            color: #d97706;
        }

        .best-recommendation-card .rec-title {
            color: #d97706;
            font-weight: 600;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 4px;
        }

        .best-recommendation-card .rec-name {
            color: #1a202c;
            font-weight: 700;
            font-size: 1.4rem;
        }

        .best-recommendation-card .rec-score {
            color: #d97706;
            font-weight: 800;
        }

        .rank-medal {
            font-size: 1.3rem;
            display: inline-block;
        }

        .rank-medal.gold {
            color: #d97706;
        }

        .rank-medal.silver {
            color: #718096;
        }

        .rank-medal.bronze {
            color: #b7791f;
        }

        .table-ranking-wrapper {
            overflow-x: auto;
            border-radius: 8px;
            border: 1px solid #edf2f7;
        }

        .table-ranking {
            width: 100%;
            margin-bottom: 0;
            background-color: transparent;
            border-collapse: collapse;
        }

        .table-ranking th {
            background-color: #f8fafc;
            color: #4a5568;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.8px;
            border-bottom: 2px solid #edf2f7;
            padding: 18px 16px;
        }

        .table-ranking td {
            padding: 16px;
            vertical-align: middle;
            border-bottom: 1px solid #edf2f7;
            color: #4a5568;
            font-size: 0.95rem;
        }

        .table-ranking tr:last-child td {
            border-bottom: none;
        }

        .table-ranking th.score-col,
        .table-ranking td.score-col {
            background-color: #fffaf0;
            font-weight: 700;
            color: #dd6b20;
            border-left: 1px solid #fbd38d;
            text-align: center;
        }

        .table-ranking td.score-col {
            font-size: 1.1rem;
        }

        /* Print styles */
        @media print {
            .header_area, .footer-area, .footer, .btn-action-outline, .btn-action-solid, .no-print {
                display: none !important;
            }
            body {
                background-color: #ffffff !important;
                color: #000000 !important;
            }
            .container {
                width: 100% !important;
                max-width: 100% !important;
                padding: 0 !important;
                margin-top: 0 !important;
            }
            .ranking-card {
                box-shadow: none !important;
                padding: 0 !important;
                margin: 0 !important;
            }
            .best-recommendation-card {
                box-shadow: none !important;
                border: 2px solid #d97706 !important;
            }
            .table-ranking-wrapper {
                border: 1px solid #000000 !important;
            }
            .table-ranking th, .table-ranking td {
                border-bottom: 1px solid #000000 !important;
                color: #000000 !important;
            }
        }
    </style>

    <div class="container-fluid px-md-5" style="margin-top: 130px; margin-bottom: 80px;">
        <div class="ranking-card">
            <div class="row align-items-center mb-4">
                <div class="col-md-7">
                    <h2 class="ranking-title">Hasil Rekomendasi Sereal</h2>
                    <p class="ranking-subtitle">Berdasarkan perhitungan metode Simple Additive Weighting (SAW)</p>
                </div>
                <div class="col-md-5 text-md-right mb-4 mb-md-0 no-print">
                    <button onclick="window.print()" class="btn-action-solid">
                        <i class="fa fa-download mr-2"></i> Export PDF
                    </button>
                </div>
            </div>

            @if(empty($rankings))
                <div class="alert alert-info py-4 text-center">
                    <i class="fa fa-info-circle mb-3" style="font-size: 2rem;"></i>
                    <p class="mb-0 font-weight-500">Belum ada alternatif sereal atau kriteria penilaian yang didaftarkan.</p>
                    <a href="{{ route('sereal.index') }}" class="btn-teal mt-3 btn-sm">Mulai Tambah Data &rarr;</a>
                </div>
            @else
                @if(count($rankings) === 1)
                    <div class="alert alert-info mb-4">
                        Karena hanya ada satu alternatif, normalisasi SAW akan menghasilkan 1.000 untuk setiap kriteria dan skor akhir 1.0000.
                    </div>
                @endif

                <!-- Best Recommendation Box -->
                @if($bestAlternative)
                    <div class="best-recommendation-card d-flex align-items-center">
                        <div class="trophy-icon-wrapper mr-4">
                            <i class="fa fa-trophy trophy-icon"></i>
                        </div>
                        <div>
                            <div class="rec-title">Rekomendasi Terbaik:</div>
                            <div class="rec-name">
                                {{ $bestAlternative['sereal']->name }} 
                                <span class="rec-score font-weight-800 ml-2">(Skor: {{ number_format($bestAlternative['score'], 4) }})</span>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Ranking Table -->
                <div class="table-ranking-wrapper">
                    <table class="table-ranking">
                        <thead>
                            <tr>
                                <th style="width: 100px; text-align: center;">Peringkat</th>
                                <th>Alternatif (Merek Sereal)</th>
                                @foreach($kriterias as $kriteria)
                                    <th style="text-align: center;" title="{{ $kriteria->name }}">{{ $kriteria->code }}</th>
                                @endforeach
                                <th class="score-col" style="width: 160px;">Skor Akhir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rankings as $index => $rank)
                                <tr>
                                    <td style="text-align: center; font-weight: 700;">
                                        @if($index == 0)
                                            <span class="rank-medal gold" title="Peringkat 1"><i class="fa fa-trophy"></i></span>
                                        @elseif($index == 1)
                                            <span class="rank-medal silver" title="Peringkat 2"><i class="fa fa-trophy"></i></span>
                                        @elseif($index == 2)
                                            <span class="rank-medal bronze" title="Peringkat 3"><i class="fa fa-trophy"></i></span>
                                        @else
                                            {{ $index + 1 }}
                                        @endif
                                    </td>
                                    <td><strong>{{ $rank['sereal']->name }}</strong></td>
                                    @foreach($kriterias as $kriteria)
                                        @php
                                            $normVal = $rank['normalized'][$kriteria->id] ?? 0.0;
                                        @endphp
                                        <td style="text-align: center;">{{ number_format($normVal, 3) }}</td>
                                    @endforeach
                                    <td class="score-col">{{ number_format($rank['score'], 4) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection
