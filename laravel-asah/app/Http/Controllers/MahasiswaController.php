<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Prodi;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Mahasiswa::with('prodi')->get();
        return view('mahasiswa.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prodi = \App\Models\Prodi::all();
        return view('mahasiswa.create', compact('prodi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama' => 'required',
                'nim' => 'required|unique:mahasiswa,nim',
                'prodi_id' => 'required|exists:prodi,id',
            ],
            [
                'nama.required' => 'Kolom nama mahasiswa wajib diisi.',
                'nim.required'  => 'Kolom NIM wajib diisi.',
                'nim.unique'    => 'NIM ini sudah terdaftar, silakan gunakan NIM lain.',
                'prodi_id.required' => 'Anda harus memilih program studi.',
            ]
        );

        Mahasiswa::create($request->all());
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa baru berhasil ditambahkan!');
    }
    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        $prodi = \App\Models\Prodi::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate(
            [
                'nama' => 'required',
                'nim' => 'required|unique:mahasiswa,nim,' . $mahasiswa->id,
                'prodi_id' => 'required|exists:prodi,id',
            ],
            [
                'nama.required' => 'Kolom nama mahasiswa wajib diisi.',
                'nim.required'  => 'Kolom NIM wajib diisi.',
                'nim.unique'    => 'NIM ini sudah terdaftar, silakan gunakan NIM lain.',
                'prodi_id.required' => 'Anda harus memilih program studi.',
            ]
        );

        $mahasiswa->update($request->all());

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data mahasiswa berhasil di-update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index');
    }
}
