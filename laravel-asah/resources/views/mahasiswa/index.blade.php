@extends('layout')

@section('title', 'Daftar Mahasiswa')

@section('content')
    <h1 style="margin-bottom: 10px;">👨‍🎓 Daftar Mahasiswa</h1>

    {{-- Notifikasi sukses --}}
    @if (session('success'))
        <div class="alert-success">
            🎉 {{ session('success') }}
        </div>
    @endif

    {{-- Tombol tambah --}}
    <p style="text-align: right;">
        <a href="{{ route('mahasiswa.create') }}" class="btn-add">+ Tambah Mahasiswa</a>
    </p>

    {{-- Tabel data --}}
    <table class="data-table">
        <thead>
            <tr>
                <th>#</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th style="text-align: center;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $mahasiswa)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $mahasiswa->nim }}</td>
                    <td>{{ $mahasiswa->nama }}</td>
                    <td>{{ $mahasiswa->prodi?->nama ?? '🤷 Prodi Ga Ketemu' }}</td>
                    <td style="text-align: center;">
                        <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}" class="btn-add" style="padding: 6px 10px; font-size: 14px; margin-right: 6px;">✏️ Edit</a>
                        <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Yakin mau hapus data ini?')" class="btn-add" style="background-color: #DC2626; padding: 6px 10px; font-size: 14px; border: none;">
                                🗑 Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center; color: #888; padding: 20px;">
                        😴 Belum ada data mahasiswa yang ditambahkan.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
