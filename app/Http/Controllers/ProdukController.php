<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $data = Produk::latest()->get();
        return response()->json($data);
    }

    public function store(Request $req)
    {
        $data = [
            'kode_produk' => $req->kode_produk,
            'nama_produk' => $req->nama_produk,
            'harga' => $req->harga,
        ];
        try {
            $data = Produk::create($data);
            return response()->json([
                "message" => 'Berhasil Simpan Data',
                "data" => $data
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Gagal Simpan Data'
            ]);
        }
    }

    public function show($id)
    {
        $data = Produk::where("id", "=", $id)->first();
        if ($data) {
            return response()->json($data);
        } else {
            return response()->json([
                "message" => "Data Tidak Ditemukan",
            ]);
        }
    }

    public function update(Request $req, $id)
    {
        $data = Produk::where("id", "=", $id)->first();
        $dataToUpdate = [
            'kode_produk' => $req->kode_produk,
            'nama_produk' => $req->nama_produk,
            'harga' => $req->harga,
        ];
        try {
            if ($data) {
                $data->update($dataToUpdate);
                return response()->json([
                    "message" => "Berhasil Update Data",
                    "data" => $data,
                ]);
            } else {
                return response()->json(["message" => "Data Tidak Ditemukan"]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                "message" => "Gagal Update Data",
            ]);
        }
    }

    public function destroy($id)
    {
        $data = Produk::where("id", "=", $id)->first();
        try {
            if ($data) {
                $data->delete();
                return response()->json([
                    "message" => "Berhasil Hapus Data"
                ]);
            } else {
                return response()->json([
                    "message" => "Data Tidak Ditemukan"
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                "message" => "Gagal Hapus Data"
            ]);
        }
    }
}
