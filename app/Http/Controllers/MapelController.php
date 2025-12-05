<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\mapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class MapelController extends Controller
{
    public function tambahmapel()
    {
        if (Auth::user()->roles == 'admin') {
            $guru = guru::all();
            return view('forum.tambahmapel', ['guru' => $guru]);
        } else {
            return redirect()->route('/');
        }
    }

    public function submitmapel(Request $request)
    {
        $data = guru::where('nuptk', $request->nuptk)->firstOrFail();

        $mapel = new mapel();
        $mapel->kode_mapel = $request->kode_mapel;
        $mapel->name_mapel = $request->name_mapel;
        $mapel->jadwal = $request->hari;
        $mapel->kelas = $request->kelas;
        $mapel->jurusan = $request->jurusan;
        $mapel->nuptk = $request->nuptk;
        $mapel->nameGuru = $data->nameGuru;
        $mapel->email = $data->email;
        $mapel->slug = Str::random(24);
        $mapel->save();

        return redirect()->route('mapel')->with('success', 'Mata Pelajaran berhasil ditambahkan!');
    }

    public function editmapel($slug)
    {
        if (Auth::user()->roles == 'admin') {
            $mapel = mapel::where('slug', $slug)->firstOrFail();
            $guru = guru::all();
            return view('forum.editmapel', ['mapel' => $mapel, 'guru' => $guru]);
        } else {
            return redirect()->route('/');
        }
    }

    public function updatemapel($slug, Request $request)
    {
        $guru = guru::where('nuptk', $request->nuptk)->firstOrFail();

        $mapel = mapel::where('slug', $slug)->firstOrFail()->update([
            'kode_mapel' => $request->kode_mapel,
            'name_mapel' => $request->name_mapel,
            'jadwal' => $request->hari,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'nuptk' => $request->nuptk,
            'nameGuru' => $guru->nameGuru,
            'email' => $guru->email,
        ]);

        if ($mapel) {
            return redirect()->route('mapel')->with('success', 'Mata Pelajaran berhasil diupdate!');
        }
    }

    public function deletemapel($slug)
    {
        if (Auth::user()->roles == 'admin') {
            $mapel = mapel::where('slug', $slug)->firstOrFail()->delete();
            return redirect()->route('mapel')->with('success', 'Mata Pelajaran berhasil dihapus!');
        } else {
            return redirect()->route('mapel');
        }
    }
}
