<?php

namespace App\Http\Controllers;

use App\Models\guru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class GuruController extends Controller
{
    public function tambahguru()
    {
        if (Auth::user()->roles == 'admin') {
            return view('forum.tambahguru');
        } else {
            return redirect()->route('/');
        }
    }

    public function submitguru(Request $request)
    {
        Validator::make($request->all(), [
            'nuptk' => ['required', 'string', 'regex:/^[0-9]+$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'nameGuru' => ['required', 'string', 'max:255'],
            'password' => ['required', 'min:8'],
        ])->validate();

        $guru = new guru();
        $guru->nuptk = $request->nuptk;
        $guru->nameGuru = $request->nameGuru;
        $guru->email = $request->email;
        $guru->gender = $request->gender;
        $guru->password = bcrypt($request->password);
        $guru->guruid = $request->password;
        $guru->slug = Str::random(24);
        $guru->save();

        $user = User::create([
            'name' => $request->nameGuru,
            'email' => $request->email,
            'nuptk'=>$request->nuptk,
            'password' => bcrypt($request->password),
            'roles' => 'guru',
            'email_verified_at' => Carbon::now(),
        ]);

        return redirect()->route('data-guru')->with('success', 'Data Guru berhasil ditambahkan dan akun login dibuat!');
    }

    public function edit_guru($slug)
    {
        if (Auth::user()->roles == 'admin') {
            $guru = guru::where('slug', $slug)->firstOrFail();
            return view('forum.editguru', ['guru' => $guru]);
        } else {
            return redirect()->route('/');
        }
    }

    public function update_guru($slug, Request $request)
    {
        $data = guru::where('slug', $slug)->firstOrFail();
        $old_slug = $data->slug;
        $email_guru = $data->email;
        $pw = $data->guruid;

        if ($request->password == null) {
            $new_password = $pw;
        } else {
            $new_password = $request->password;
        }

        $guru = guru::where('slug', $slug)->firstOrFail()->update([
            'nuptk' => $request->nuptk,
            'nameGuru' => $request->nameGuru,
            'email' => $request->email,
            'gender' => $request->gender,
            'password' => bcrypt($new_password),
            'guruid' => $new_password,
            'slug' => $old_slug
        ]);

        $akunguru = User::where('email', $email_guru)->firstOrFail()->update([
            'email' => $request->email,
            'password' => bcrypt($new_password),
        ]);

        if ($guru & $akunguru) {
            return redirect()->route('data-guru')->with('success', 'Data Guru berhasil diupdate!');
        }
    }

    public function delete_guru($slug)
    {
        if (Auth::user()->roles == 'admin') {
            $data = guru::where('slug', $slug)->firstOrFail();
            $email_guru = $data->email;

            $guru = guru::where('slug', $slug)->delete();
            $akun_guru = user::where('email', $email_guru)->delete();
            return redirect()->route('data-guru')->with('success', 'Data Guru berhasil dihapus!');
        } else {
            return redirect()->route('data-guru');
        }
    }
}
