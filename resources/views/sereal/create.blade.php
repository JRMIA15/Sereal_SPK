@extends('layouts.admin')

@section('admin_content')
    <div class="row justify-content-center">
        <div class="col-lg-10 col-md-12">
            <div class="admin-card">
                <h2 class="admin-card-title">Tambah Data Sereal & Nilai Gizi</h2>
                
                <form action="{{ route('sereal.store') }}" method="POST">
                    @csrf
                    
                    <div class="form-group mb-5">
                        <label for="name">Nama / Merek Sereal:</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" 
                               value="{{ old('name') }}" placeholder="Contoh: Nestle Koko Krunch" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    @if($kriterias->isEmpty())
                        <div class="alert alert-warning mb-5">
                            Belum ada kriteria yang terdaftar. Harap tambahkan kriteria terlebih dahulu sebelum memasukkan data sereal.
                            <br><a href="{{ route('kriteria.create') }}" class="alert-link mt-2 d-inline-block">Tambah Kriteria Baru &rarr;</a>
                        </div>
                    @else
                        <h4 class="text-uppercase mb-4" style="font-size: 0.95rem; font-weight: 700; color: #dd6b20; letter-spacing: 0.5px;">
                            Parameter Penilaian (Matriks)
                        </h4>
                        
                        <div class="row mb-5">
                            @foreach($kriterias as $kriteria)
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label for="kriteria_{{ $kriteria->id }}">
                                            {{ $kriteria->code }}: {{ $kriteria->name }} ({{ ucfirst($kriteria->type) }})
                                        </label>
                                        <input type="number" step="0.01" 
                                               name="kriteria_values[{{ $kriteria->id }}]" 
                                               id="kriteria_{{ $kriteria->id }}" 
                                               class="form-control @error('kriteria_values.'.$kriteria->id) is-invalid @enderror" 
                                               value="{{ old('kriteria_values.'.$kriteria->id) }}" 
                                               placeholder="Masukkan nilai" required>
                                        @error('kriteria_values.'.$kriteria->id)
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <div class="d-flex align-items-center">
                        <button type="submit" class="btn-teal mr-3" {{ $kriterias->isEmpty() ? 'disabled' : '' }}>Simpan</button>
                        <a href="{{ route('sereal.index') }}" class="btn-teal-outline">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
