<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function tambahsiswa()
    {
        if (Auth::user()->roles == 'admin') {
            return view('forum.tambahsiswa');
        } else {
            return redirect()->route('/');
        }
    }
    public function submitsiswa(Request $request)
    {
        Validator::make($request->all(), [
            'nis' => ['required', 'string', 'regex:/^[0-9]+$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8'],
            'kelas' => ['required'],
        ])->validate();

        $siswa = new siswa();
        $siswa->nis = $request->nis;
        $siswa->email = $request->email;
        $siswa->nameSiswa = $request->nameSiswa;
        $siswa->tempatlahir = $request->tempatlahir;
        $siswa->tanggallahir = $request->tanggallahir;
        $siswa->kelas = $request->kelas;
        $siswa->jurusan = $request->jurusan;
        $siswa->gender = $request->gender;
        $siswa->agama = $request->agama;
        $siswa->password = bcrypt($request->password);
        $siswa->slug = Str::random(24);
        $siswa->siswaid = $request->password;
        $siswa->save();

        User::create([
            'name' => $request->nameSiswa,
            'email' => $request->email,
            'nis'=> $request->nis,
            'password' => bcrypt($request->password),
            'roles' => 'siswa',
            'email_verified_at' => Carbon::now(),
        ]);
        return redirect()->route('data-siswa')->with('success', 'Data Siswa berhasil ditambahkan dan akun login dibuat!');
    }

    public function show_siswa($slug)
    {
        $siswa = siswa::where('slug', $slug)->firstOrFail();
        return view('siswa.show_siswa', ['siswa' => $siswa]);
    }

    public function edit_siswa($slug)
    {
        if (Auth::user()->roles == 'admin') {
            $siswa = siswa::where('slug', $slug)->firstOrFail();
            return view('forum.editsiswa', ['siswa' => $siswa]);
        } else {
            return redirect()->route('/');
        }
    }

    public function update_siswa($slug, Request $request)
    {
        $data = siswa::where('slug', $slug)->firstOrFail();
        $old_slug = $data->slug;
        $email_siswa = $data->email;
        $pw = $data->siswaid;

        if ($request->password == null) {
            $new_password = $pw;
        } else {
            $new_password = $request->password;
        }


        $siswa = siswa::where('slug', $slug)->firstOrFail()->update([
            'nis' => $request->nis,
            'email' => $request->email,
            'nameSiswa' => $request->nameSiswa,
            'tempatlahir' => $request->tempatlahir,
            'tanggallahir' => $request->tanggallahir,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'gender' => $request->gender,
            'agama' => $request->agama,
            'password' => bcrypt($new_password),
            'siswaid' => $new_password,
            'slug' => $old_slug,
        ]);

        $akun_siswa = User::where('email', $email_siswa)->firstOrFail()->update([
            'email' => $request->email,
            'password' => bcrypt($new_password),
        ]);

        if ($siswa & $akun_siswa) {
            return redirect()->route('data-siswa')->with('success', 'Data Siswa berhasil diupdate!');
        }
    }

    public function delete_siswa($slug)
    {
        if (Auth::user()->roles == 'admin') {
            $data = siswa::where('slug', $slug)->firstOrFail();
            $email_siswa = $data->email;

            $siswa = siswa::where('slug', $slug)->delete();
            $aku_siswa = user::where('email', $email_siswa)->delete();
            return redirect()->route('data-siswa')->with('success', 'Data Siswa berhasil dihapus!');
        } else {
            return redirect()->route('data-siswa');
        }
    }
}
