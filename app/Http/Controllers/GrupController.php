<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grup;

class GrupController extends Controller
{
    public function getAll()
    {
        $data = Grup::all();
        return response()->json($data);
    }

    public function getItem($grup_id)
    {
        $data = Grup::where('grup_id', '=', $grup_id)->get();

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
        return response()->json(["message" => 'Grup dibuat'], 201);
    }
    
    public function update(Request $request, String $grup_id)
    {
        if (Grup::where('grup_id', '=', $grup_id)->exists()) {
            $data = Grup::where('grup_id', '=', $grup_id)->first();
            $data->nama = is_null($request->nama) ? $data->nama : $request->nama;
            $data->grup_id = is_null($request->grup_id) ? $data->nama : $request->grup_id;
            $data->save();

            return response()->json(["message" => 'Grup diperbaharui'], 200);
        } else {
            abort(404, 'Tidak ditemukan');
        }
    }

    public function delete($grup_id)
    {
        if (Grup::where('grup_id', '=', $grup_id)->exists()) {
            $data = Grup::where('grup_id', '=', $grup_id)->first();
            $data->delete();
            
            return response()->json(["message" => 'Grup dihapus'], 200);
        } else {
            abort(404, 'Tidak ditemukan');
        }
    }
}
