<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Http\Requests\StoreGuruRequest;
use App\Http\Requests\UpdateGuruRequest;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru = Guru::all();
        return response()->json(['data' => $guru], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGuruRequest $request)
    {
        $guru = Guru::create($request->validated());

        return response()->json([
            'message' => 'Data berhasil ditambahkan',
            'guru' => $guru
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $guru = Guru::find($id);

        if (!$guru) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($guru, 200);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guru $guru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGuruRequest $request, $id)
    {
       $guru = Guru::findOrFail($id);
       $guru->update($request->validated());

       return response()->json(['message' => 'Data berhasil diperbarui', 'data' => $guru], 200);
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();

        return response()->json(['message' => 'Data berhasil dihapus', 'data' => $guru], 200);
    }
}
