<?php

namespace App\Http\Controllers;

use App\Models\KartuGuru;
use App\Http\Requests\StoreKartuGuruRequest;
use App\Http\Requests\UpdateKartuGuruRequest;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use UpdateKartuGuruRequest as GlobalUpdateKartuGuruRequest;

class KartuGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kartuGuru = KartuGuru::with(['guru' => function ($query) {
            $query->select('id_guru', 'nama_guru');
        }])->get();
        return response()->json(['data' => $kartuGuru], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKartuGuruRequest $request)
    {
        $validatedData = $request->validated();

        $kartuGuru = KartuGuru::create($validatedData);

        return response()->json(['message' => 'Kartu Guru berhasil ditambahkan', 'data' => $kartuGuru], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $kartuGuru = KartuGuru::findOrFail($id);
        return response()->json(['data' => $kartuGuru], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KartuGuru $kartuGuru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKartuGuruRequest $request, $id)
    {
        $kartu_guru = KartuGuru::findOrFail($id);
        $kartu_guru->update($request->validated());

        return response()->json(['message' => 'Data berhasil diperbarui', 'data' => $kartu_guru], 200);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $kartuGuru = KartuGuru::findOrFail($id);

            $kartuGuru->delete();

            return response()->json(['message' => 'Kartu Guru berhasil dihapus'], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['message' => 'Kartu Guru tidak ditemukan', 'error' => $e->getMessage()], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus Kartu Guru', 'error' => $e->getMessage()], 500);
        }
    }
}
