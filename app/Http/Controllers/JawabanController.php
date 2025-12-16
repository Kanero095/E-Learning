<?php

namespace App\Http\Controllers;

use App\Models\jawaban;
use App\Models\siswa;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Cloudinary\Api\Upload\UploadApi;

class JawabanController extends Controller
{
    public function jawaban($slug)
    {
        if (Auth::user()->roles == 'siswa') {
            $tugas = Tugas::where('slug', $slug)->firstOrFail();
            return view('elearning.form.jawaban.uploadjawaban', ['tugas' => $tugas]);
        } else {
            return view('Pages.home');
        }
    }

    public function uploadjawaban($slug, Request $request)
    {
        $tugas = Tugas::where('slug', $slug)->firstOrFail();
        $siswa = siswa::where('email', Auth::user()->email)->firstOrFail();

        $jawab = new jawaban();
        $jawab->kode_mapel = $tugas->kode_mapel;
        $jawab->name_mapel = $tugas->name_mapel;
        $jawab->nis = $siswa->nis;
        $jawab->nameSiswa = $siswa->nameSiswa;
        $jawab->email = $siswa->email;
        $jawab->kelas = $siswa->kelas;
        $jawab->jurusan = $siswa->jurusan;
        $jawab->tugas = $tugas->tugas;
        $jawab->pengumpulan = Carbon::now();
        $jawab->slugTugas = $tugas->slug;
        $jawab->slugJawaban = Str::random(24) . '_' . $siswa->nis . '_jawab_tugas_' . $tugas->tugas;

        if ($request->hasFile('jawabanpdf')) {
            $uploadedFile = (new UploadApi())->upload($request->file('jawabanpdf')->getRealPath(), [
                'folder' => 'elearning/' . $tugas->kode_mapel . '_' . $tugas->name_mapel . '/Tugas/' . $tugas->tugas . '/Jawaban',
                'public_id' => 'Jawaban_' . $siswa->nis . '_' . $siswa->nameSiswa,
                'resource_type' => 'auto',
                'type' => 'upload',
            ]);

            // Simpan URL Gambar ke Database
            $jawab->jawabanpdf = ($uploadedFile['secure_url']);
        } else {
            $jawab->jawabanteks = $request->myeditorinstance;
        }

        $jawab->save();
        return redirect()->route('open-tugas', $tugas->slug)->with('success', 'Jawaban anda berhasil ditambahkan!');
    }

    public function editjawaban($slug)
    {
        $jawaban = jawaban::where('slugJawaban', $slug)->firstOrFail();
        return view('elearning.form.jawaban.editjawaban', ['jawaban' => $jawaban]);
    }

    public function updatejawaban($slug, Request $request)
    {
        $data = jawaban::where('slugJawaban', $slug)->firstOrFail();
        $siswa = siswa::where('email', Auth::user()->email)->firstOrFail();

        if ($request->hasFile('jawabanpdf')) {
            $uploadedFile = (new UploadApi())->upload($request->file('jawabanpdf')->getRealPath(), [
                'folder' => 'elearning/' . $data->kode_mapel . '_' . $data->name_mapel . '/Tugas/' . $data->tugas . '/Jawaban',
                'public_id' => 'Jawaban_' . $siswa->nis . '_' . $siswa->nameSiswa,
                'resource_type' => 'auto',
                'type' => 'upload',
            ]);

            // Simpan URL Gambar ke Database
            $jawabanpdf = ($uploadedFile['secure_url']);
            $jawabanteks = null;
        } else {
            $jawabanteks = $request->myeditorinstance;
            $jawabanpdf = null;
        }
        // dd($jawabanpdf . '_' . $jawabanteks);
        $jawaban = jawaban::where('slugJawaban', $slug)->firstOrFail()->update([
            'jawabanpdf' => $jawabanpdf,
            'jawabanteks' => $jawabanteks,
            'pengumpulan' => Carbon::now(),
            'nilai' => null,
        ]);
        return redirect()->route('open-tugas', $slug = $data->slugTugas)->with('success', 'Jawaban anda berhasil diupdate!');
    }

    public function editnilai($slugJawaban)
    {
        if (Auth::user()->roles == 'guru') {
            $jawaban = jawaban::where('slugJawaban', $slugJawaban)->firstOrFail();
            return view('elearning.form.jawaban.edit_nilai', ['jawaban' => $jawaban]);
        } else {
            return view('Pages.home');
        }
    }

    public function uploadnilai($slugJawaban, Request $request)
    {
        Validator::make($request->all(), [
            'penilaian' => ['required', 'numeric', 'min:0', 'max:100'],
        ])->validate();

        $data = jawaban::where('slugjawaban', $slugJawaban)->firstOrFail();
        $slug = $data->slugTugas;

        $jawaban = jawaban::where('slugjawaban', $slugJawaban)->firstOrFail()->update([
            'nilai' => $request->penilaian,
        ]);

        return redirect()->route('open-tugas', $slug)->with('success', 'Penilaian Jawaban ' . $data->nameSiswa . ' berhasil ditambahkan!');
    }

    public function downloadjawaban($slugJawaban)
    {
        $jawab = jawaban::where('slugJawaban', $slugJawaban)->firstOrFail();

        $path = $jawab->jawabanpdf;

        if (!file_exists($path)) {
            abort(404, 'File tidak ditemukan.');
        }
        return response()->download($path);
    }
}
