<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $Transaction = Transaction::all();
            return response()->json([
                "status" => true,
                "message" => "Berhasil ambil data",
                "data" => $Transaction
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
            $Transaction = Transaction::create($request->all());
            return response()->json([
                "status" => true,
                "message" => "Berhasil tambah data",
                "data" => $Transaction
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
            $Transaction = Transaction::find($id);
            if(!$Transaction) throw new \Exception('Data tidak ditemukan');
            return response()->json([
                "status" => true,
                "message" => "Berhasil ambil data",
                "data" => $Transaction
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
            $Transaction = Transaction::find($id);
            if(!$Transaction) throw new \Exception('Data tidak ditemukan');
            $Transaction->update($request->all());
            return response()->json([
                "status" => true,
                "message" => "Berhasil update data",
                "data" => $Transaction
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
            $Transaction = Transaction::find($id);
            if(!$Transaction) throw new \Exception('Data tidak ditemukan');
            $Transaction->delete();
            return response()->json([
                "status" => true,
                "message" => "Berhasil hapus data",
                "data" => $Transaction
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
