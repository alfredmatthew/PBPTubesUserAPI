<?php

namespace App\Http\Controllers;

use App\Models\mataPelajaran;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $mataPelajaran = mataPelajaran::all();
            return response()->json([
                "status" => true,
                "message" => "Berhasil ambil data",
                "data" => $mataPelajaran
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => $e->getMessage(),
                "data" => []
            ], 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $mataPelajaran = mataPelajaran::create($request->all());
            return response()->json([
                "status" => true,
                "message" => "Berhasil tambah data",
                "data" => $mataPelajaran
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                "status" => false,
                "message" => $e->getMessage(),
                "data" => []
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try{
            $mataPelajaran = mataPelajaran::find($id);
            if(!$mataPelajaran) throw new \Exception('Data tidak ditemukan');
            return response()->json([
                "status" => true,
                "message" => "Berhasil ambil data",
                "data" => $mataPelajaran
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                "status" => false,
                "message" => $e->getMessage(),
                "data" => []
            ], 400);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        try{
            $mataPelajaran = mataPelajaran::find($id);
            if(!$mataPelajaran) throw new \Exception('Data tidak ditemukan');
            $mataPelajaran->update($request->all());
            return response()->json([
                "status" => true,
                "message" => "Berhasil update data",
                "data" => $mataPelajaran
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                "status" => false,
                "message" => $e->getMessage(),
                "data" => []
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try{
            $mataPelajaran = mataPelajaran::find($id);
            if(!$mataPelajaran) throw new \Exception('Data tidak ditemukan');
            $mataPelajaran->delete();
            return response()->json([
                "status" => true,
                "message" => "Berhasil hapus data",
                "data" => $mataPelajaran
            ], 200);
        }catch(\Exception $e){
            return response()->json([
                "status" => false,
                "message" => $e->getMessage(),
                "data" => []
            ], 400);
        }
    }
}
