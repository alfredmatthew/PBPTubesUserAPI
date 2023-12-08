<?php

namespace App\Http\Controllers;

use App\Models\userData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $userData = userData::all();
            return response()->json([
                "status" => true,
                "message" => "Berhasil ambil data",
                "data" => $userData
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
        try {
            $userData = userData::create($request->all());
            return response()->json([
                "status" => true,
                "message" => "Berhasil tambah data",
                "data" => $userData
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
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $userData = userData::find($id);
            if(!$userData) throw new \Exception("userData tidak ditemukan");
            return response()->json([
                "status" => true,
                "message" => "Berhasil ambil data",
                "data" => $userData
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $userData = userData::find($id);
            if(!$userData) throw new \Exception("userData tidak ditemukan");
            $userData->update($request->all());
            return response()->json([
                "status" => true,
                "message" => "Berhasil update data",
                "data" => $userData
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
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $userData = userData::find($id);
            if(!$userData) throw new \Exception("userData tidak ditemukan");
            $userData->delete();
            return response()->json([
                "status" => true,
                "message" => "Berhasil hapus data",
                "data" => $userData
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                "status" => false,
                "message" => $e->getMessage(),
                "data" => []
            ], 400);
        }

    }

    public function login(Request $request)
    {
        try{
            $this->validate($request, [
                'name' => 'required',
                'password' => 'required',
            ]);

            $user = DB::table('user_data')
                ->where('name', $request->name)
                ->where('password', $request->password)
                ->first();
            
            if($user) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Login Success',
                    'data' => $user
                ], 200);
            } else {
                return response()->json([
                    'status' => 401,
                    'message' => 'Login Failed',
                    'data' => null
                ], 401);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'Internal Server Error: ' . $e->getMessage(),
                'data' => null
            ], 402);
        }
    }
}
