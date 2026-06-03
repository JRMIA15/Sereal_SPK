@extends('layouts.admin')

@section('admin_content')
    <div class="admin-card">
        <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
            <h2 class="admin-card-title mb-0">Daftar Data Sereal</h2>
            
            <div class="d-flex align-items-center mt-3 mt-md-0">
                <!-- Search Form -->
                <form action="{{ route('sereal.index') }}" method="GET" class="mr-2 mb-0 search-container" style="max-width: 250px;">
                    <i class="fa fa-search"></i>
                    <input type="text" name="search" class="form-control" placeholder="Cari sereal..." value="{{ $search }}" style="height: 40px;">
                </form>
                
                @if(auth()->check() && auth()->user()->role === 'admin')
                    <a href="{{ route('sereal.create') }}" class="btn-teal" style="padding: 0 20px; font-size: 0.85rem; height: 40px; display: inline-flex; align-items: center; white-space: nowrap; margin-bottom: 0;">+ Tambah Baru</a>
                @endif
            </div>
        </div>

        <div class="table-saw-wrapper">
            <table class="table-saw">
                <thead>
                    <tr>
                        <th style="width: 80px; text-align: center;">No</th>
                        <th>Nama Alternatif (Sereal)</th>
                        @foreach($kriterias as $kriteria)
                            <th style="text-align: center;" title="{{ $kriteria->name }} ({{ ucfirst($kriteria->type) }})">{{ $kriteria->code }}</th>
                        @endforeach
                        @if(auth()->check() && auth()->user()->role === 'admin')
                            <th style="width: 120px; text-align: center;">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse($sereals as $index => $sereal)
                        <tr>
                            <td style="text-align: center;">{{ $index + 1 }}</td>
                            <td><strong>{{ $sereal->name }}</strong></td>
                            @foreach($kriterias as $kriteria)
                                @php
                                    $pivotVal = $sereal->kriterias->firstWhere('id', $kriteria->id);
                                @endphp
                                <td style="text-align: center;">{{ $pivotVal ? number_format($pivotVal->pivot->value, 2) : '-' }}</td>
                            @endforeach
                            @if(auth()->check() && auth()->user()->role === 'admin')
                                <td style="text-align: center;">
                                    <a href="{{ route('sereal.edit', $sereal->id) }}" class="action-btn edit" title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{ route('sereal.destroy', $sereal->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus sereal ini?')">
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
                            <td colspan="{{ (auth()->check() ? 3 : 2) + count($kriterias) }}" class="text-center py-4 text-muted">Tidak ada data sereal ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
