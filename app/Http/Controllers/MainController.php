<?php

namespace App\Http\Controllers;

use App\Kak;
use App\Kebutuhanakt;
use App\Kelompokbelanja;
use App\Periode;
use App\SKPD;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        return view('main.login', [
            'title' => 'Login'
        ]);
    }

    public function login()
    {
        return view('main.login', [
            'title' => 'Login'
        ]);
    }

    public function dashboard()
    {
        $periode = Periode::where('periode', request('periode'))->first();
        
        if (auth()->user()->role_slug == 'admin') {
            $data = [
                'user' => User::all(),
                'kak' => Kak::all(),
                'skpd' => SKPD::with(['biduruses.progbid.kegprog.subkeg.kak.kebutuhanakt' => function ($query) {
                            $query->where('periode', request('periode'));
                }])->get(),
                'graph' => DB::table('kebutuhanakts')
                            ->selectRaw("sum(total_final) as total, periode as tahun")
                            ->groupBy('tahun')
                            ->orderByDesc('tahun')
                            ->take(5)
                            ->orderBy('tahun', 'DESC')
                            ->get(),
            ];
        } else if (auth()->user()->role_slug == 'askpd') {
            $data = [
                'kak' => Kak::where('kode_sub', auth()->user()->kode_sub)->get(),
                'skpd' => SKPD::with(['biduruses.progbid.kegprog.subkeg.kak.kebutuhanakt' => function ($query) {
                            $query->where('periode', request('periode'));
                }])->where('kode', auth()->user()->kode_skpd)->get(),
                'graph' => DB::table('kebutuhanakts')
                            ->selectRaw("sum(total_final) as total, periode as tahun")
                            ->groupBy('tahun')
                            ->orderByDesc('tahun')
                            ->take(5)
                            ->orderBy('tahun', 'asc')
                            ->get(),
            ];
        }else{
            $data = [
                'kak' => Kak::where('kode_sub', auth()->user()->kode_sub)->get(),
                'skpd' => SKPD::with(['biduruses.progbid.kegprog.subkeg.kak.kebutuhanakt' => function ($query) {
                            $query->where('periode', request('periode'));
                }])->where('kode', auth()->user()->kode_skpd)->get(),
                'graph' => DB::table('kebutuhanakts')
                            ->selectRaw("sum(total_final) as total, periode as tahun")
                            ->groupBy('tahun')
                            ->orderByDesc('tahun')
                            ->take(5)
                            ->orderBy('tahun', 'asc')
                            ->get(),
            ];
        }

        $data['periode'] = Periode::all();
        $data['_periode'] = $periode;
        $data['kebe'] = Kelompokbelanja::with('kak.kebutuhanakt')->orderBy('urutan')->get();

        return view('dashboard.index', $data);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        //$credentials['password'] = bcrypt($credentials['password']);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login Failed!');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}
