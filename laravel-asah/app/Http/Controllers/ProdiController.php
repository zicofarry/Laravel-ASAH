<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Prodi;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Prodi::all();
        return view('prodi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('prodi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Prodi::create($request->all());
        return redirect()->route('prodi.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prodi = Prodi::find($id);
        return view('prodi.show', compact('prodi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $prodi = Prodi::find($id);
        return view('prodi.edit', compact('prodi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $prodi = Prodi::find($id);
        $prodi->update($request->all());
        return redirect()->route('prodi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prodi = Prodi::find($id);
        $prodi->delete();
        return redirect()->route('prodi.index');
    }
}
