<?php

namespace App\Http\Controllers;

use App\Models\BukuTamu;
use Illuminate\Http\Request;

class BukuTamuController extends Controller
{
    public function index()
    {
        $data = BukuTamu::all();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'nullable',
            'no_telp' => 'nullable',
            'alamat' => 'nullable',
            'waktu_kunjungan' => 'nullable',
            'waktu_kepergian' => 'nullable',
            'keperluan' => 'nullable',
        ]);

        $tamu = BukuTamu::create($validatedData);
        return response()->json([
            'success' => true,
            'data' => $tamu,
        ], 201);
    }

    public function show($id)
    {
        $tamu = BukuTamu::find($id);

        if (!$tamu) {
            return response()->json(['success' => false, 'message' => 'Tamu not found'], 404);
        }

        return response()->json($tamu);
    }

    public function update(Request $request, $id)
    {
        $tamu = BukuTamu::find($id);

        if (!$tamu) {
            return response()->json(['success' => false, 'message' => 'Tamu not found'], 404);
        }

        $validatedData = $request->validate([
            'nama' => 'nullable',
            'no_telp' => 'nullable',
            'alamat' => 'nullable',
            'waktu_kunjungan' => 'nullable',
            'waktu_kepergian' => 'nullable',
            'keperluan' => 'nullable',
        ]);

        $tamu->update($validatedData);

        return response()->json([
            'success' => true,
            'data' => $tamu,
        ], 201);
    }

    public function destroy($id)
    {
        $tamu = BukuTamu::find($id);

        if (!$tamu) {
            return response()->json(['success' => false, 'message' => 'Tamu not found'], 404);
        }

        $tamu->delete();

        return response()->json(['success' => true, 'message' => 'Tamu deleted successfully']);
    }
}
