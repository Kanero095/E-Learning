<?php

namespace App\Http\Controllers;

use App\Models\elearning;
use App\Models\guru;
use App\Models\mapel;
use App\Models\siswa;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class elearningController extends Controller
{
    public function openmapel($slug)
    {
        if (Auth::user()->roles == 'siswa') {
            $email = Auth::user()->email;
            $siswa = siswa::where('email', $email)->firstOrFail();
            $mapel = mapel::where('slug', $slug)->firstOrFail();
            $materi = elearning::where('kode_mapel', $mapel->kode_mapel)->get();
            $tugas = Tugas::where('kode_mapel', $mapel->kode_mapel)->get();
            return view('elearning.home', ['mapel' => $mapel, 'siswa' => $siswa, 'materi' => $materi, 'tugas' => $tugas]);
        } elseif (Auth::user()->roles == 'guru') {
            $email = Auth::user()->email;
            $guru = guru::where('email', $email)->firstOrFail();
            $mapel = mapel::where('slug', $slug)->firstOrFail();
            $materi = elearning::where('kode_mapel', $mapel->kode_mapel)->get();
            $tugas = Tugas::where('kode_mapel', $mapel->kode_mapel)->get();
            return view('elearning.home', ['mapel' => $mapel, 'guru' => $guru, 'materi' => $materi, 'tugas' => $tugas]);
        } else {
            return view('elearning.home');
        }
    }


    public function tambahpertemuan($slug)
    {
        if (Auth::user()->roles == 'guru') {
            $mapel = mapel::where('slug', $slug)->firstOrFail();
            return view('elearning.form.tambahpertemuan', ['mapel' => $mapel]);
        } else {
            return view('Pages.home');
        }
    }

    public function submitpertemuan($slug, Request $request)
    {
        $mapel = mapel::where('slug', $slug)->firstOrFail();

        $pertemuan = new elearning();
        $pertemuan->kode_mapel = $mapel->kode_mapel;
        $pertemuan->name_mapel = $mapel->name_mapel;
        $pertemuan->kelas = $mapel->kelas;

        $nomorPertemuan = 1;
        while (elearning::where('pertemuan', $nomorPertemuan)->where('kode_mapel', $mapel->kode_mapel)->exists()) {
            $nomorPertemuan++;
        }
        $pertemuan->pertemuan = $nomorPertemuan;

        $pertemuan->slug = $mapel->slug . '_Pertemuan_' . $nomorPertemuan;

        $filePath = 'Pertemuan_' . $nomorPertemuan . '.pdf';
        $materi = $request->file('materi')->storeAs($mapel->kode_mapel . '_' .$mapel->name_mapel . '/Materi', $filePath);
        $pertemuan->materi = $materi;
        $pertemuan->save();

        return redirect()->route('open-mapel', $mapel->slug)->with('success', 'Pertemuan berhasil ditambahkan!');
    }

    public function downloadmateri($slug)
    {
        $pertemuan = elearning::where('slug', $slug)->firstOrFail();

        $path = storage_path('app/private/' . $pertemuan->materi);

        if (!file_exists($path)) {
            abort(404, 'File tidak ditemukan.');
        }
        return response()->download($path);
    }

    public function deletepertemuan($slug)
    {
        if (Auth::user()->roles == 'guru') {
            $data = elearning::where('slug', $slug)->firstOrFail();
            $mapel = mapel::where('kode_mapel', $data->kode_mapel)->firstOrFail();
            $pertemuan = elearning::where('slug', $slug)->firstOrFail()->delete();
            return redirect()->route('open-mapel', $mapel->slug)->with('success', 'Pertemuan ' . $data->pertemuan . ' berhasil dihapus!');
        } else {
            return view('Pages.home');
        }
    }

    public function editpertemuan($slug)
    {
        if (Auth::user()->roles == 'guru') {
            $pertemuan = elearning::where('slug', $slug)->firstOrFail();
            $mapel = mapel::where('kode_mapel', $pertemuan->kode_mapel)->firstOrFail();
            return view('elearning.form.editPertemuan', ['pertemuan'=>$pertemuan, 'mapel' => $mapel]);
        } else {
            return view('Pages.home');
        }
    }

    public function updatepertemuan($slug, Request $request)
    {
        $pertemuan = elearning::where('slug', $slug)->firstOrFail();
        $mapel = mapel::where('kode_mapel', $pertemuan->kode_mapel)->firstOrFail();

        if ($request->hasFile('materi')) {
            $filePath = 'Pertemuan_' . $request->pertemuan . '.pdf';
            $materi = $request->file('materi')->storeAs($mapel->kode_mapel . '_' .$pertemuan->name_mapel . '/Materi', $filePath);
        } else {
            $materi = $pertemuan->materi;
        }

        $nomorPertemuan = $request->pertemuan;
        while (elearning::where('pertemuan', $nomorPertemuan)->where('kode_mapel', $mapel->kode_mapel)->exists()) {
            $nomorPertemuan++;
        }

        $new_pertemuan = elearning::where('slug', $slug)->firstOrFail()->update([
            'kode_mapel' => $pertemuan->kode_mapel,
            'name_mapel' => $pertemuan->name_mapel,
            'kelas' => $pertemuan->kelas,
            'slug' => $mapel->slug . '_Pertemuan_' . $nomorPertemuan,
            'pertemuan' => $nomorPertemuan,
            'materi' => $materi,
        ]);
        return redirect()->route('open-mapel', $mapel->slug)->with('success', 'Pertemuan berhasil diupdate!');
    }
}
