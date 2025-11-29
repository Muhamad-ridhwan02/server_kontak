<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontak;
use App\Models\Grup;

class KontakController extends Controller
{
    public function getAll()
    {
        $data = Kontak::select('kontak.*', 'grup.nama as grup_nama')
                ->rightJoin('grup', 'kontak.grup_id', '=', 'grup.id')
                ->get();
        return response()->json($data);
    }

    public function getItem($no_telp)
    {
        $data = Kontak::where('no_telp', '=', $no_telp)->get();

        if (!empty($data)) {
            return response()->json($data);
        } else {
            abort(404, 'Tidak ditemukan');
        }
    }

    public function create(Request $request)
    {
        $grup = new Grup;
        if (!Grup::where('id', '=', $request->grup_id)->exists()) {
            $grup->id = $request->grup_id;
            $grup->nama = $request->grup_nama;
            $grup->save();
        }
        
        $data = new Kontak;
        $data->no_telp = $request->no_telp;
        $data->nama = $request->nama;
        $data->grup_id = $request->grup_id;
        $data->save();
        return response()->json(["message" => 'Kontak dibuat'], 201);
    }
    
    public function update(Request $request, String $no_telp)
    {
        if (Kontak::where('no_telp', '=', $no_telp)->exists()) {
            $data = Kontak::where('no_telp', '=', $no_telp)->first();
            $data->nama = is_null($request->nama) ? $data->nama : $request->nama;
            $data->grup_id = is_null($request->grup_id) ? $data->grup_id : $request->grup_id;
            $data->save();

            return response()->json(["message" => 'Kontak diperbaharui'], 200);
        } else {
            abort(404, 'Tidak ditemukan');
        }
    }

    public function delete($no_telp)
    {
        if (Kontak::where('no_telp', '=', $no_telp)->exists()) {
            $data = Kontak::where('no_telp', '=', $no_telp)->first();
            $data->delete();
            
            return response()->json(["message" => 'Kontak dihapus'], 200);
        } else {
            abort(404, 'Tidak ditemukan');
        }
    }
}
