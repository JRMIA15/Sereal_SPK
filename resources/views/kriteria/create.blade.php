@extends('layouts.admin')

@section('admin_content')
    <style>
        .criteria-form .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            margin-bottom: 1.75rem;
        }

        .criteria-form .form-group label {
            color: #344054;
            font-weight: 600;
            margin-bottom: 0;
        }

        .criteria-form .form-control {
            width: 100%;
            min-height: 50px;
            border-radius: 12px;
            padding: 12px 16px;
            background-color: #ffffff;
            border: 1px solid #d2d6dc;
            color: #1f2937;
            transition: all 0.2s ease;
            display: block;
            box-sizing: border-box;
            line-height: 1.4;
        }

        .criteria-form .form-control:focus {
            border-color: #ff6c00;
            box-shadow: 0 0 0 4px rgba(255, 108, 0, 0.12);
            outline: none;
        }

        .criteria-form select.form-control {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 10 6'%3E%3Cpath d='M1 1l4 4 4-4' fill='none' stroke='%236b7280' stroke-width='1.5'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 16px center;
            background-size: 12px 12px;
            min-height: 50px;
            padding: 12px 48px 12px 16px;
            line-height: 1.4;
            display: block;
            box-sizing: border-box;
        }

        .criteria-form .dropdown-wrapper {
            width: 100%;
            max-width: 100%;
        }
    </style>

    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="admin-card">
                <h2 class="admin-card-title">Tambah Data Kriteria</h2>

                <form action="{{ route('kriteria.store') }}" method="POST" class="criteria-form">
                    @csrf

                    <div class="form-group mb-4 dropdown-wrapper">
                        <label for="code">Kode Kriteria:</label>
                        <select name="code" id="code" class="form-control @error('code') is-invalid @enderror" required>
                            <option value="">Pilih Kode Kriteria</option>
                            @for ($i = 1; $i <= 8; $i++)
                                <option value="C{{ $i }}" {{ old('code') == 'C'.$i ? 'selected' : '' }}>C{{ $i }}</option>
                            @endfor
                        </select>
                        @error('code')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="name">Nama Kriteria:</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name') }}" placeholder="Contoh: Protein, Gula, dll" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-4 dropdown-wrapper">
                        <label for="type">Atribut:</label>
                        <select name="type" id="type" class="form-control @error('type') is-invalid @enderror" required>
                            <option value="benefit" {{ old('type') == 'benefit' ? 'selected' : '' }}>Benefit</option>
                            <option value="cost" {{ old('type') == 'cost' ? 'selected' : '' }}>Cost</option>
                        </select>
                        @error('type')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mb-5">
                        <label for="weight">Bobot (W):</label>
                        <input type="number" step="0.01" name="weight" id="weight" class="form-control @error('weight') is-invalid @enderror"
                               value="{{ old('weight') }}" placeholder="Masukkan angka prioritas" required>
                        @error('weight')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex align-items-center flex-wrap">
                        <button type="submit" class="btn-teal mr-3 mb-2">Simpan</button>
                        <a href="{{ route('kriteria.index') }}" class="btn-teal-outline mb-2">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
