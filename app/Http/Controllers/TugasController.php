<?php

namespace App\Http\Controllers;

use App\Models\elearning;
use App\Models\guru;
use App\Models\jawaban;
use App\Models\mapel;
use App\Models\siswa;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TugasController extends Controller
{
    public function tambahtugas($slug)
    {
        if (Auth::user()->roles == 'guru') {
            $mapel = mapel::where('slug', $slug)->firstOrFail();
            return view('elearning.form.tambahTugas', ['mapel' => $mapel]);
        } else {
            return view('Pages.home');
        }
    }

    public function submittugas($slug, Request $request)
    {
        $mapel = mapel::where('slug', $slug)->firstOrFail();

        $tugas = new Tugas();
        $tugas->kode_mapel = $mapel->kode_mapel;
        $tugas->name_mapel = $mapel->name_mapel;
        $tugas->kelas = $mapel->kelas;
        $tugas->opened = $request->opened;
        $tugas->due = $request->due;

        $nomorTugas = 1;
        while (Tugas::where('tugas', $nomorTugas)->where('kode_mapel', $mapel->kode_mapel)->exists()) {
            $nomorTugas++;
        }
        $tugas->tugas = $nomorTugas;

        $tugas->slug = $mapel->slug . '_tugas_' . $nomorTugas;

        if ($request->hasFile('soalpdf')) {
            $filePath = 'Tugas_' . $nomorTugas . '.pdf';
            $tugas->soalpdf = $request->file('soalpdf')->storeAs($mapel->kode_mapel . '_' .$mapel->name_mapel . '/Tugas', $filePath);
        } else {
            $tugas->soalteks = $request->myeditorinstance;
        }
        // dd($tugas);
        $tugas->save();
        return redirect()->route('open-mapel', $mapel->slug)->with('success', 'Tugas berhasil ditambahkan!');
    }

    public function opentugas($slug)
    {
        if (Auth::user()->roles == 'siswa') {
            $siswa = siswa::where('email', Auth::user()->email)->firstOrFail();

            $tugas = tugas::where('slug', $slug)->firstOrFail();
            $mapel = mapel::where('kode_mapel', $tugas->kode_mapel)->firstOrFail();
            $jawabanSiswa = jawaban::where('slugTugas', $tugas->slug)->where('nis', $siswa->nis)->first();
            return view('elearning.tugas', ['tugas' => $tugas, 'mapel' => $mapel, 'jawabanSiswa' => $jawabanSiswa]);
        } elseif (Auth::user()->roles == 'guru') {
            $tugas = tugas::where('slug', $slug)->firstOrFail();
            $mapel = mapel::where('kode_mapel', $tugas->kode_mapel)->firstOrFail();
            $Alljawaban = jawaban::where('slugTugas', $tugas->slug)->get();
            return view('elearning.tugas', ['tugas' => $tugas, 'mapel' => $mapel, 'Alljawaban' => $Alljawaban]);
        } else {
            return view('Pages.home');
        }
    }

    public function deletetugas($slug)
    {
        if (Auth::user()->roles == 'guru') {
            $data = tugas::where('slug', $slug)->firstOrFail();
            $mapel = mapel::where('kode_mapel', $data->kode_mapel)->firstOrFail();
            $tugas = tugas::where('slug', $slug)->firstOrFail()->delete();

            $slug = $mapel->slug . '_tugas_' . $data->tugas ;
            // dd($slug);
            $jawaban = jawaban::where('slugTugas', $slug)->delete();
            return redirect()->route('open-mapel', $mapel->slug)->with('success', 'Tugas ' . $data->tugas . ' & Seluruh jawaban pada tugas ini berhasil dihapus!');
        } else {
            return view('Pages.home');
        }
    }

    public function edittugas($slug)
    {
        if (Auth::user()->roles == 'guru') {
            $tugas = Tugas::where('slug', $slug)->firstOrFail();
            $mapel = mapel::where('kode_mapel', $tugas->kode_mapel)->firstOrFail();
            return view('elearning.form.editTugas', ['tugas' => $tugas, 'mapel' => $mapel]);
        } else {
            return view('Pages.home');
        }
    }

    public function updatetugas($slug, Request $request)
    {
        $data = Tugas::where('slug', $slug)->firstOrFail();
        $mapel = mapel::where('kode_mapel', $data->kode_mapel)->firstOrFail();

        if ($request->hasFile('soalpdf')) {
            $filePath = 'Tugas_' . $request->tugas . '.pdf';
            $soalpdf = $request->file('soalpdf')->storeAs($mapel->kode_mapel . '_' .$data->name_mapel . '/Tugas', $filePath);
            $soalteks = null;
        } elseif($data->soalpdf == true) {
            $soalpdf = $data->soalpdf;
            $soalteks = null;
        }
         else {
            $soalteks = $request->myeditorinstance;
            $soalpdf = null;
        }

        $nomorTugas = $request->tugas;
        while (Tugas::where('tugas', $nomorTugas)->where('kode_mapel', $mapel->kode_mapel)->exists()) {
            $nomorTugas++;
        }

        $slugTugas = $mapel->slug . '_tugas_' . $nomorTugas;
        $tugas = Tugas::where('slug', $slug)->firstOrFail()->update([
            'kode_mapel' => $data->kode_mapel,
            'name_mapel' => $data->name_mapel,
            'kelas' => $data->kelas,
            'tugas' => $nomorTugas,
            'opened' => $request->opened,
            'due' => $request->due,
            'slug' => $slugTugas,
            'soalpdf' => $soalpdf,
            'soalteks' => $soalteks,
        ]);

        return redirect()->route('open-mapel', $slug = $mapel->slug)->with('success', 'Tugas ' . $data->tugas . ' berhasil ditambahkan!');
    }

    public function downloadtugas($slug)
    {
        $tugas = Tugas::where('slug', $slug)->firstOrFail();

        $path = storage_path('app/private/' . $tugas->soalpdf);

        if (!file_exists($path)) {
            abort(404, 'File tidak ditemukan.');
        }
        return response()->download($path);
    }
}
