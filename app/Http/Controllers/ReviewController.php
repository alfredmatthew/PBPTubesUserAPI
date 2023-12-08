<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $Review = Review::all();
            return response()->json([
                "status" => true,
                "message" => "Berhasil ambil data",
                "data" => $Review
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
            $Review = Review::create($request->all());
            return response()->json([
                "status" => true,
                "message" => "Berhasil tambah data",
                "data" => $Review
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
            $Review = Review::find($id);
            if(!$Review) throw new \Exception('Data tidak ditemukan');
            return response()->json([
                "status" => true,
                "message" => "Berhasil ambil data",
                "data" => $Review
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
            $Review = Review::find($id);

            if(!$Review) throw new \Exception('Data tidak ditemukan');

            $Review->update($request->all());
            
            return response()->json([
                "status" => true,
                "message" => "Berhasil update data",
                "data" => $Review
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
            $Review = Review::find($id);
            if(!$Review) throw new \Exception('Data tidak ditemukan');
            $Review->delete();
            return response()->json([
                "status" => true,
                "message" => "Berhasil hapus data",
                "data" => $Review
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
