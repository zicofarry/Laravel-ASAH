@extends('layout')

@section('title', 'Edit Data Mahasiswa')

@section('content')
    <h1>Formulir Edit Data Mahasiswa</h1>

    @if ($errors->any())
        <div class="alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('mahasiswa.update', $mahasiswa->id) }}" novalidate>
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama">Nama Mahasiswa:</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama', $mahasiswa->nama) }}" required>
        </div>

        <div class="form-group">
            <label for="nim">NIM:</label>
            <input type="text" id="nim" name="nim" value="{{ old('nim', $mahasiswa->nim) }}" required>
        </div>

        <div class="form-group">
            <label for="prodi_id">Program Studi:</label>
            <select id="prodi_id" name="prodi_id" required>
                <option value="" disabled>-- Pilih Program Studi --</option>
                @foreach ($prodi as $item)
                    <option value="{{ $item->id }}" {{ old('prodi_id', $mahasiswa->prodi_id) == $item->id ? 'selected' : '' }}>
                        {{ $item->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn-submit">Update Data</button>
    </form>

@endsection