<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\mapel;
use App\Models\siswa;
use App\Models\walikelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasicController extends Controller
{
    // HOME - DASHBOARD
    public function dashboard()
    {
        $datasiswa = siswa::all()->count();
        $dataguru = guru::all()->count();
        $ruangkelas = 9;
        return view('Pages.home', [
            'datasiswa' => $datasiswa,
            'dataguru' => $dataguru,
            'ruangkelas' => $ruangkelas
        ]);
    }

    public function profile()
    {
        if (Auth::user()->roles == 'siswa') {
            $email = Auth::user()->email;
            $user = siswa::where('email', $email)->firstOrFail();
            return view('Pages.profile', ['user' => $user]);
        } elseif (Auth::user()->roles == 'guru') {
            $email = Auth::user()->email;
            $user = guru::where('email', $email)->firstOrFail();
            return view('Pages.profile', ['user' => $user]);
        } else {
            return view('Pages.home');
        }
    }

    // SISWA
    public function siswa(Request $request)
    {
        if (Auth::user()->roles == 'admin') {
            $search = $request->search;

            $siswa = Siswa::when($search, function ($query, $search) {
                return $query->where('nameSiswa', 'like', '%' . $search . '%')
                    ->orWhere('nis', 'like', '%' . $search . '%');
            })
                ->orderBy('id', 'asc') // optional
                ->paginate(10);
            return view('Pages.siswa', ['siswa' => $siswa]);
        } else {
            return redirect()->route('/');
        }
    }

    // GURU
    public function guru(Request $request)
    {
        if (Auth::user()->roles == 'admin') {
            $search = $request->search;

            $guru = guru::when($search, function ($query, $search) {
                return $query->where('nameGuru', 'like', '%' . $search . '%')
                    ->orWhere('NUPTK', 'like', '%' . $search . '%');
            })
                ->orderBy('id', 'asc') // optional
                ->paginate(10);
            return view('Pages.guru', ['guru' => $guru]);
        } else {
            return redirect()->route('/');
        }
    }

    // JADWAL MAPEL
    public function jadwalmapel()
    {
        $hariKerja = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];
        $jadwal = mapel::whereIn('kelas', ['X', 'XI', 'XII']) // semua kelas
            ->whereIn('jurusan', [
                'Teknik Komputer dan Jaringan (TKJ)',
                'Teknik dan Bisnis Sepeda Motor (TBSM)',
                'Otomatisasi dan Tata Kelola Perkantoran (OTKP)',
            ])
            ->get()
            ->groupBy([
                'kelas',        // level pertama
                'jurusan',      // level kedua
                'jadwal'        // level ketiga (hari)
            ]);

        foreach ($jadwal as $kelas => $jurusanList) {
            foreach ($jurusanList as $jurusan => $hariList) {
                foreach ($hariKerja as $hari) {
                    if (!isset($jadwal[$kelas][$jurusan][$hari])) {
                        $jadwal[$kelas][$jurusan][$hari] = collect(); // default kosong
                    }
                }
            }
        }
        return view('Pages.jadwalmapel', [
            'jadwal' => $jadwal,
        ]);
    }

    // WALIKELAS
    public function walikelas(Request $request)
    {
        if (Auth::user()->roles == 'admin') {
            $search = $request->search;

            $guru = walikelas::when($search, function ($query, $search) {
                return $query->where('nameGuru', 'like', '%' . $search . '%')
                    ->orWhere('NUPTK', 'like', '%' . $search . '%');
            })
                ->orderBy('id', 'asc') // optional
                ->paginate(10);
            return view('Pages.walikelas', ['guru' => $guru]);
        } else {
            return redirect()->route('/');
        }
    }

    // MAPEL
    public function mapel()
    {
        if (Auth::user()->roles == 'admin') {
            $mapel = mapel::paginate(10);
            return view('Pages.mapel', ['mapel' => $mapel]);
        } else {
            return redirect()->route('/');
        }
    }

    // ELEARNING
    public function elearning()
    {
        if (Auth::user()->roles == 'siswa') {
            $email = Auth::user()->email;
            $siswa = siswa::where('email', $email)->firstOrFail();
            $mapel = mapel::where('kelas', $siswa->kelas)->where('jurusan', $siswa->jurusan)->paginate(10);
            return view('Pages.elearning', ['mapel' => $mapel, 'siswa' => $siswa]);
        } elseif (Auth::user()->roles == 'guru') {
            $email = Auth::user()->email;
            $guru = guru::where('email', $email)->firstOrFail();
            $mapel = mapel::where('email', $guru->email)->paginate(10);
            return view('Pages.elearning', ['mapel' => $mapel, 'guru' => $guru]);
        } else {
            return view('Pages.home');
        }
    }
}
