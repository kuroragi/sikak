<?php

namespace App\Http\Controllers;

use App\Kebutuhanakt;
use App\Perioderpjmd;
use App\Sbu;
use App\Ssh;
use App\Usulansbu;
use App\Usulanssh;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OtherFunctionController extends Controller
{
    public function getDataEdit(Request $request)
    {
        $data = DB::table($request->tbl)->where($request->whr, $request->id)->first();
        return response()->json($data);
    }

    public function getDataEdit2(Request $request)
    {
        $data = DB::table($request->tbl)->where($request->whr, $request->id)->where($request->whr2, $request->id2)->first();
        return response()->json($data);
    }
    
    public function getDataWith(Request $request){
        $data = $request->tbl::with($request->with)->where($request->whr, $request->id)->first();

        return response()->json($data);
    }
    
    public function getDataWiths(Request $request){
        $data = $request->tbl::with($request->with)->where($request->whr, $request->id)->get();

        return response()->json($data);
    }

    public function getData(Request $request)
    {
        $data = DB::table($request->tbl)->where($request->whr, $request->id)->get();
        return response()->json($data);
    }

    public function getDataAll(Request $request)
    {
        $data = DB::table($request->tbl)->get();
        return response()->json($data);
    }

    public function getDataLike(Request $request)
    {
        $data = DB::table($request->tbl)->where($request->whr, 'Like', '%'.$request->id.'%')->orderBy($request->whr)->get();
        return response()->json($data);
    }

    public function getSlug(Request $request)
    {
        $slug = STR::slug($request->name, '-');
        return response()->json(['slug' => $slug]);
    }

    public function getItemEdit(Request $request){
        if($request->with == ''){
            $with = ['satuan'];
        }else{
            $with = ['satuan', $request->with];
        }
        $keb = Kebutuhanakt::with($with)->where('kode', $request->kode)->first();

        return response()->json($keb);
    }

    public function getItemKeb(Request $request)
    {
        $ssh = Ssh::with(['satuan'])->where('ket', 'like', '%' . $request->cari . '%')->where('spek', '!=', 'usulan ssh')->where('status', 1)->where('status',1)->orderBy('id', 'DESC')->get();

        return response()->json($ssh);
    }

    public function getUsulanKeb(Request $request)
    {
        $usulan = Usulanssh::with(['satuan'])->where('ket', 'like', '%' . $request->cari . '%')->get();

        return response()->json($usulan);
    }

    public function getSbuKeb(Request $request)
    {
        $sbu = Sbu::with(['satuan'])->where('ket', 'like', '%' . $request->cari . '%')->where('status', 1)->orderBy('id', 'DESC')->get();

        return response()->json($sbu);
    }

    public function getUsulanSbu(Request $request)
    {
        $usulan = Usulansbu::with(['satuan'])->where('ket', 'like', '%' . $request->cari . '%')->get();

        return response()->json($usulan);
    }

    public function getPrpjmd(Request $request)
    {
        $data = Perioderpjmd::where('tahun_awal', '<=', $request->tahun)->where('tahun_akhir', '>=', $request->tahun)->first();
        return response()->json($data);
    }
}
