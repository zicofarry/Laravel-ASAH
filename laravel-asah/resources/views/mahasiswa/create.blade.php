@extends('layout')

@section('title', 'Tambah Mahasiswa Baru')

@section('content')
    <h1>Formulir Mahasiswa Baru</h1>

    @if ($errors->any())
        <div class="alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('mahasiswa.store') }}" novalidate>
        @csrf

        <div class="form-group">
            <label for="nama">Nama Mahasiswa:</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required>
        </div>

        <div class="form-group">
            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" value="{{ old('nim') }}" required>
        </div>

        <div class="form-group">
            <label for="prodi_id">Program Studi:</label>
            <!-- <input type="text" id="prodi_id" name="prodi_id" value="{{ old('prodi_id') }}" required> -->
            <select id="prodi_id" name="prodi_id" required>
                <option value="" disabled selected>-- Pilih Program Studi --</option>
                @foreach ($prodi as $item)
                    <option value="{{ $item->id }}" {{ old('prodi_id') == $item->id ? 'selected' : '' }}>
                        {{ $item->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn-submit">Simpan Data</button>
    </form>

@endsection