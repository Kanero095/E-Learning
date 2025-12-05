<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\walikelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class WalikelasController extends Controller
{
    public function tambahwalikelas()
    {
        if (Auth::user()->roles == 'admin') {
            $guru = guru::all();
            return view('forum.tambahwalikelas', ['guru' => $guru]);
        } else {
            return redirect()->route('/');
        }
    }

    public function submitwalkel(Request $request)
    {
        $data = guru::where('nuptk', $request->nuptk)->firstOrFail();

        $walkel = new walikelas();
        $walkel->nuptk = $request->nuptk;
        $walkel->nameGuru = $data->nameGuru;
        $walkel->email = $data->email;
        $walkel->gender = $data->gender;
        $walkel->slug = $data->slug;
        $walkel->kelas = $request->kelas;
        $walkel->jurusan = $request->jurusan;
        $walkel->save();

        return redirect()->route('data-walikelas')->with('success', 'Data Walikelas berhasil ditambahkan!');
    }

    public function edit_walkel($slug)
    {
        if (Auth::user()->roles == 'admin') {
            $walkel = walikelas::where('slug', $slug)->firstOrFail();
            $guru = guru::all();
            return view('forum.editwalikelas', ['walkel' => $walkel, 'guru' => $guru]);
        } else {
            return redirect()->route('/');
        }
    }

    public function update_walkel($slug, Request $request)
    {

        $guru = guru::where('nuptk', $request->nuptk)->firstOrFail();

        $walkel = walikelas::where('slug', $slug)->firstOrFail()->update([
            'nuptk' => $request->nuptk,
            'nameGuru' => $guru->nameGuru,
            'email' => $guru->email,
            'gender' => $guru->gender,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'slug' => $guru->slug,
        ]);

        if ($walkel) {
            return redirect()->route('data-walikelas')->with('success', 'Data Walikelas berhasil diupdate!');
        }
    }

    public function delete_walkel($slug)
    {
        if (Auth::user()->roles == 'admin') {
            $walkel = walikelas::where('slug', $slug)->delete();
            return redirect()->route('data-walikelas')->with('success', 'Data Walikelas berhasil dihapus!');
        } else {
            return redirect()->route('data-walikelas');
        }
    }
}
