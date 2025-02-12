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
use stdClass;

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
                'user' => User::where('status', 1)->count('id'),
                'kak' => User::count('id'),
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
                'kak' => Kak::where('kode_sub', auth()->user()->kode_sub)->count('id'),
                'graph' => DB::table('kebutuhanakts')
                            ->selectRaw("b.kode_skpd, sum(a.total_final) as total, b.periode as tahun")
                            ->join('kaks as b', 'a.kode_kak', 'b.kode')
                            ->where('kode_skpd', auth()->user()->kode_skpd)
                            ->groupBy('tahun')
                            ->orderByDesc('tahun')
                            ->take(5)
                            ->orderBy('tahun', 'asc')
                            ->get(),
            ];
        }else{
            $data = [
                'kak' => Kak::where('kode_sub', auth()->user()->kode_sub)->count('id'),
                'graph' => DB::table('kebutuhanakts as a')
                            ->selectRaw("b.kode_skpd, sum(a.total_final) as total, b.periode as tahun")
                            ->join('kaks as b', 'a.kode_kak', 'b.kode')
                            ->where('kode_skpd', auth()->user()->kode_skpd)
                            ->groupBy('tahun')
                            ->orderByDesc('tahun')
                            ->take(5)
                            ->orderBy('tahun', 'asc')
                            ->get(),
            ];
        }

        if(request('periode')){
            $list_skpd = SKPD::select(['kode', 'name'])->when(auth()->check() && auth()->user()->kode_skpd != '', function($query){
                $query->where('kode', auth()->user()->kode_skpd);
            })->orderBy('kode')->get();
            $list_kelompok_belanja = Kelompokbelanja::select(['id', 'ket', 'start_periode', 'end_periode'])->where('start_periode', '<=', $periode->periode)->where(function($query) use ($periode){
                $query->where('end_periode', '>=', $periode->periode)->orWhere('end_periode', null);
            })->orderBy('urutan')->get();

            $list_kak = Kak::where('kode', '!=', null)->where('kode', '!=', '')->where('periode', $periode->periode)->get();

            
            $list_kebutuhanakt = collect();
            foreach ($list_kak as $keb) {
                $total_final = Kebutuhanakt::select(['kode_kak', 'total_final'])->where('kode_kak', $keb->kode)->sum('total_final');
                $item = new stdClass();
                $item->kode_skpd = $keb->kode_skpd;
                $item->kelompokbelanja_id = $keb->kelompokbelanja_id;
                $item->total = $total_final;
                $list_kebutuhanakt->push($item);
            }
            
            $item_row = collect();
            foreach ($list_skpd as $skpd) {
                $item_column = collect();
                foreach ($list_kelompok_belanja as $kebe) {
                    $item_kebe = $list_kebutuhanakt->filter(function($value, $key) use ($skpd, $kebe){
                        return $value->kode_skpd == $skpd->kode && $value->kelompokbelanja_id == $kebe->id;
                    });
                    $total_column = 0;
                    foreach ($item_kebe as $item_kebe) {
                        $total_column += $item_kebe->total;
                    }
                    $item = new stdClass();
                    $item->total_column = $total_column;

                    $item_column->push($item);
                }
                $item = new stdClass();
                $item->skpd_name = $skpd->name;
                $item->columns = $item_column;
                $item_row->push($item);
            }
            
            $data['skpd_list'] = $list_skpd;
            $data['kebe_list'] = $list_kelompok_belanja;
            $data['data_rows'] = $item_row;
            // $tabel['data_row'] = $item_row;
            
            // $data['tabel'] = $tabel;
        }

        $data['periode'] = Periode::all();
        $data['_periode'] = $periode;

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
