@extends('layouts.admin')

@section('admin_content')
    <div class="admin-card">
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
            <h2 class="admin-card-title mb-0">Daftar Kriteria & Bobot (Model)</h2>
            
            <div class="d-flex align-items-center mt-3 mt-md-0">
                <!-- Search Form -->
                <form action="{{ route('kriteria.index') }}" method="GET" class="mr-2 mb-0 search-container" style="max-width: 250px;">
                    <i class="fa fa-search"></i>
                    <input type="text" name="search" class="form-control" placeholder="Cari kriteria..." value="{{ $search }}" style="height: 40px;">
                </form>
                
                @if(auth()->check() && auth()->user()->role === 'admin')
                    <a href="{{ route('kriteria.create') }}" class="btn-teal" style="padding: 0 20px; font-size: 0.85rem; height: 40px; display: inline-flex; align-items: center; white-space: nowrap; margin-bottom: 0;">+ Tambah Kriteria</a>
                @endif
            </div>
        </div>

        <div class="table-saw-wrapper">
            <table class="table-saw">
                <thead>
                    <tr>
                        <th style="width: 80px; text-align: center;">No</th>
                        <th style="text-align: center;">Kode</th>
                        <th>Nama Kriteria</th>
                        <th style="text-align: center;">Sifat (Atribut)</th>
                        <th style="text-align: center;">Bobot (W)</th>
                        @if(auth()->check() && auth()->user()->role === 'admin')
                            <th style="width: 120px; text-align: center;">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse($kriterias as $index => $kriteria)
                        <tr>
                            <td style="text-align: center;">{{ $index + 1 }}</td>
                            <td style="text-align: center;"><strong>{{ $kriteria->code }}</strong></td>
                            <td>{{ $kriteria->name }}</td>
                            <td style="text-align: center;">
                                @if($kriteria->type == 'benefit')
                                    <span class="badge-benefit">Benefit</span>
                                @else
                                    <span class="badge-cost">Cost</span>
                                @endif
                            </td>
                            <td style="text-align: center;">{{ number_format($kriteria->weight, 0) }}</td>
                            @if(auth()->check() && auth()->user()->role === 'admin')
                                <td style="text-align: center;">
                                    <a href="{{ route('kriteria.edit', $kriteria->id) }}" class="action-btn edit" title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{ route('kriteria.destroy', $kriteria->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kriteria ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="action-btn delete" title="Hapus">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="{{ auth()->check() ? 6 : 5 }}" class="text-center py-4 text-muted">Tidak ada kriteria ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Total Weight Alert -->
        <div class="mt-4">
            @if($isValidWeight)
                <div class="alert alert-success d-flex align-items-center py-3" role="alert" style="border-radius: 6px; border-left: 5px solid #28a745;">
                    <i class="fa fa-check-circle mr-3" style="font-size: 1.5rem; color: #28a745;"></i>
                    <div>
                        <strong>Total Akumulasi Bobot: {{ number_format($totalWeight, 0) }}</strong><br>
                        <span>Valid. Model SAW siap digunakan untuk perhitungan.</span>
                    </div>
                </div>
            @else
                <div class="alert alert-warning d-flex align-items-center py-3" role="alert" style="border-radius: 6px; border-left: 5px solid #ffc107; background-color: #fffbeb;">
                    <i class="fa fa-exclamation-triangle mr-3" style="font-size: 1.5rem; color: #ffc107;"></i>
                    <div>
                        <strong>Total Akumulasi Bobot: {{ number_format($totalWeight, 0) }}</strong><br>
                        <span>Belum Valid. Total bobot kriteria saat ini adalah {{ number_format($totalWeight, 0) }}. Harap sesuaikan bobot agar total akumulasi menjadi 100 untuk perhitungan model SAW yang akurat.</span>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
