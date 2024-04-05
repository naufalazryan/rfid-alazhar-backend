<?php

namespace App\Http\Controllers;

use App\Models\LogKartuGuru;
use App\Http\Requests\StoreLogKartuGuruRequest;
use App\Http\Requests\UpdateLogKartuGuruRequest;

class LogKartuGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $log_kartu_guru = LogKartuGuru::all()->map(function ($log) {
            $log['status'] = $log['status'] ? 'hadir' : 'tidak hadir';
            return $log;
        });
    
        return response()->json(['data' => $log_kartu_guru], 200);
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
    public function store(StoreLogKartuGuruRequest $request)
    {
        $validatedData = $request->validated();
        
        $logKartuGuru = LogKartuGuru::create(array_merge(
            $validatedData,
            ['waktu' => now()] 
        ));
        
        return response()->json([
            'message' => 'Data berhasil ditambahkan',
            'data' => $logKartuGuru->refresh() 
        ], 201);
    }
    

    /**
     * Display the specified resource.
     */
    public function show(LogKartuGuru $logKartuGuru)
    {
        return response()->json(['data' => $logKartuGuru], 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LogKartuGuru $logKartuGuru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLogKartuGuruRequest $request, LogKartuGuru $logKartuGuru)
    {
        $validatedData = $request->validated();
        $logKartuGuru->update($validatedData);
        return response()->json(['message' => 'Data berhasil diperbarui', 'data' => $logKartuGuru], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LogKartuGuru $logKartuGuru)
    {
        $logKartuGuru->delete();
        return response()->json(['message' => 'Data berhasil dihapus'], 200);
    }
}
