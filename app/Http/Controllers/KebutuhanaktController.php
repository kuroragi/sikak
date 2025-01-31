<?php

namespace App\Http\Controllers;

use App\Kak;
use App\Kebutuhanakt;
use App\Periode;
use App\Usulansbu;
use App\Usulanssh;
use Illuminate\Http\Request;

class KebutuhanaktController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $checkkak = Kak::where('kode', $request->kode_kak)->first();
        if($checkkak->kelompokbelanja_id == 2){
            $datakak = $request->validate([
                'uraian_lain' => 'required',
                'total' => 'required',
            ]);
        }

        $kode_item = '';
        //cek tipe keb untuk create new usulan
        if ($request->tipe_keb == 'usulanssh') {
            $datausulan = [
                'satuan_id' => $request->satuan_id,
                'ket' => $request->uraian_lain,
                'spek' => '',
                'harga_std' => $request->harga,
                'kode_skpd' => auth()->user()->kode_skpd,
                'kode_sub' => auth()->user()->kode_sub,
            ];

            Usulanssh::create($datausulan);

            $usulan = Usulanssh::where('satuan_id', $datausulan['satuan_id'])->where('ket', $datausulan['ket'])->where('spek', $datausulan['spek'])->where('harga_std', $datausulan['harga_std'])->where('kode_skpd', $datausulan['kode_skpd'])->where('kode_sub', $datausulan['kode_sub'])->first();

            $kode_item = $usulan->id;
        } else if ($request->tipe_keb == 'usulansbu') {
            $datausulan = [
                'satuan_id' => $request->satuan_id,
                'ket' => $request->uraian_lain,
                'spek' => '',
                'kali' => 1,
                'harga' => $request->harga,
                'kode_skpd' => auth()->user()->kode_skpd,
                'kode_sub' => auth()->user()->kode_sub,
            ];

            Usulansbu::create($datausulan);

            $usulan = Usulansbu::where('satuan_id', $datausulan['satuan_id'])->where('ket', $datausulan['ket'])->where('harga', $datausulan['harga'])->where('kode_skpd', $datausulan['kode_skpd'])->where('kode_sub', $datausulan['kode_sub'])->first();

            $kode_item = $usulan->id;
        } else {
            $kode_item = $request->kode_item;
        }

        $validatedData = $request->validate([
            'kode_kak' => 'required',
            'tipe_keb' => 'required',
            'periode' => 'required',
        ]);

        $validatedData['kode_akt'] = $request->kode_akt;
        $validatedData['kode_item'] = $kode_item;

        $kkeb = Kebutuhanakt::where('kode', 'like', '%keb-' . $this->getdate('y') . '-%')->max('kode');
        if ($kkeb != '') {
            $keb = substr($kkeb, -8) + 1;
            $kode = 'keb-' . $this->getdate('y') . '-' . sprintf('%08d', $keb);
        } else {
            $kode = 'keb-' . $this->getdate('y') . '-00000001';
        }

        $harga = 0;

        if ($request->tipe_keb == 'other') {
            $validatedData['uraian_lain'] = $request->uraian_lain;
        } else if ($request->tipe_keb == 'gaji') {
            $validatedData['uraian_lain'] = $request->uraian_lain;
        }

        if ($request->tipe_keb == 'other') {
            $harga = $request->total / $request->jumlah;
        } else {
            $harga = $request->harga;
        }

        $validatedData['kode'] = $kode;
        $validatedData['update_harga'] = $request->update_harga;

        if ($request->tipe_keb == 'dariusulanssh') {
            $validatedData['tipe_keb'] = 'usulanssh';
        } else if ($request->tipe_keb == 'dariusulansbu') {
            $validatedData['tipe_keb'] = 'usulansbu';
        }

        $getharga = '';

        //cek periode untuk add sesi
        $periode = Periode::where('periode', $request->periode)->first();
        if ($periode->sesi == 'rka') {
            $validatedData['tipe_rka'] = 1;
            $validatedData['alasan_rka'] = $request->alasan;
            $validatedData['harga_rka'] = $harga;
            $validatedData['jml_rka'] = $request->jumlah;
            $validatedData['total_rka'] = $request->total;
            $validatedData['tipe_kuappas'] = 0;
            $validatedData['alasan_kuappas'] = '';
            $validatedData['harga_kuappas'] = $harga;
            $validatedData['jml_kuappas'] = $request->jumlah;
            $validatedData['total_kuappas'] = $request->total;
            $validatedData['tipe_apbd'] = 0;
            $validatedData['alasan_apbd'] = '';
            $validatedData['harga_apbd'] = $harga;
            $validatedData['jml_apbd'] = $request->jumlah;
            $validatedData['total_apbd'] = $request->total;
            $validatedData['tipe_final'] = 0;
            $validatedData['alasan_final'] = '';
            $validatedData['harga_final'] = $harga;
            $validatedData['jml_final'] = $request->jumlah;
            $validatedData['total_final'] = $request->total;

            $getharga = 'harga_rka';
        } else if ($periode->sesi == 'kuappas') {
            $validatedData['tipe_rka'] = 0;
            $validatedData['alasan_rka'] = '';
            $validatedData['jml_rka'] = 0;
            $validatedData['harga_rka'] = 0;
            $validatedData['total_rka'] = 0;
            $validatedData['tipe_kuappas'] = 1;
            $validatedData['alasan_kuappas'] = $request->alasan;
            $validatedData['harga_kuappas'] = $harga;
            $validatedData['jml_kuappas'] = $request->jumlah;
            $validatedData['total_kuappas'] = $request->total;
            $validatedData['tipe_apbd'] = 0;
            $validatedData['alasan_apbd'] = '';
            $validatedData['harga_apbd'] = $harga;
            $validatedData['jml_apbd'] = $request->jumlah;
            $validatedData['total_apbd'] = $request->total;
            $validatedData['tipe_final'] = 0;
            $validatedData['alasan_final'] = '';
            $validatedData['harga_final'] = $harga;
            $validatedData['jml_final'] = $request->jumlah;
            $validatedData['total_final'] = $request->total;

            $getharga = 'harga_kuappas';
        } else if ($periode->sesi == 'apbd') {
            $validatedData['tipe_rka'] = 0;
            $validatedData['alasan_rka'] = '';
            $validatedData['jml_rka'] = 0;
            $validatedData['harga_rka'] = 0;
            $validatedData['total_rka'] = 0;
            $validatedData['tipe_kuappas'] = 0;
            $validatedData['alasan_kuappas'] = '';
            $validatedData['jml_kuappas'] = 0;
            $validatedData['harga_kuappas'] = 0;
            $validatedData['total_kuappas'] = 0;
            $validatedData['tipe_apbd'] = 1;
            $validatedData['alasan_apbd'] = $request->alasan;
            $validatedData['harga_apbd'] = $harga;
            $validatedData['jml_apbd'] = $request->jumlah;
            $validatedData['total_apbd'] = $request->total;
            $validatedData['tipe_final'] = 0;
            $validatedData['alasan_final'] = '';
            $validatedData['harga_final'] = $harga;
            $validatedData['jml_final'] = $request->jumlah;
            $validatedData['total_final'] = $request->total;

            $getharga = 'harga_apbd';
        } else if ($periode->sesi == 'final') {
            $validatedData['tipe_rka'] = 0;
            $validatedData['alasan_rka'] = '';
            $validatedData['jml_rka'] = 0;
            $validatedData['harga_rka'] = 0;
            $validatedData['total_rka'] = 0;
            $validatedData['tipe_kuappas'] = 0;
            $validatedData['alasan_kuappas'] = '';
            $validatedData['jml_kuappas'] = 0;
            $validatedData['harga_kuappas'] = 0;
            $validatedData['total_kuappas'] = 0;
            $validatedData['tipe_apbd'] = 0;
            $validatedData['alasan_apbd'] = '';
            $validatedData['jml_apbd'] = 0;
            $validatedData['harga_apbd'] = 0;
            $validatedData['total_apbd'] = 0;
            $validatedData['tipe_final'] = 1;
            $validatedData['alasan_final'] = $request->alasan;
            $validatedData['harga_final'] = $harga;
            $validatedData['jml_final'] = $request->jumlah;
            $validatedData['total_final'] = $request->total;

            $getharga = 'harga_final';
        }

        $cekkebakt = Kebutuhanakt::where('kode_kak', $request->kode_kak)->where('kode_akt', $request->kode_akt)->where('tipe_keb', $validatedData['tipe_keb'])->where('kode_item', $validatedData['kode_item'])->where($getharga, $harga)->where('periode', $request->periode)->first();
        if ($cekkebakt != null && ($cekkebakt->tipe_keb == 'gaji' || $cekkebakt->tipe_keb == 'other')){
            Kebutuhanakt::create($validatedData);
            return redirect('/kak?kode_skpd=' . $request->kode_skpd . '&kode=' . $request->kode_kak . '&periode=' . $request->periode)->with('success', 'Berhasil Menambah Kebutuhan');
        }
        if ($cekkebakt == null) {
            Kebutuhanakt::create($validatedData);
        } else {
            if ($periode->sesi == 'rka') {
                $newdata['jml_rka'] = $cekkebakt->jml_rka + $request->jumlah;
                $newdata['total_rka'] = $cekkebakt->total_rka + $request->total;
                $newdata['jml_kuappas'] = $cekkebakt->jml_kuappas + $request->jumlah;
                $newdata['total_kuappas'] = $cekkebakt->total_kuappas + $request->total;
                $newdata['jml_apbd'] = $cekkebakt->jml_apbd + $request->jumlah;
                $newdata['total_apbd'] = $cekkebakt->total_apbd + $request->total;
                $newdata['jml_final'] = $cekkebakt->jml_final + $request->jumlah;
                $newdata['total_final'] = $cekkebakt->total_final + $request->total;
            } else if ($periode->sesi == 'kuappas') {
                $newdata['jml_kuappas'] = $cekkebakt->jml_kuappas + $request->jumlah;
                $newdata['total_kuappas'] = $cekkebakt->total_kuappas + $request->total;
                $newdata['jml_apbd'] = $cekkebakt->jml_apbd + $request->jumlah;
                $newdata['total_apbd'] = $cekkebakt->total_apbd + $request->total;
                $newdata['jml_final'] = $cekkebakt->jml_final + $request->jumlah;
                $newdata['total_final'] = $cekkebakt->total_final + $request->total;
            } else if ($periode->sesi == 'apbd') {
                $newdata['jml_apbd'] = $cekkebakt->jml_apbd + $request->jumlah;
                $newdata['total_apbd'] = $cekkebakt->total_apbd + $request->total;
                $newdata['jml_final'] = $cekkebakt->jml_final + $request->jumlah;
                $newdata['total_final'] = $cekkebakt->total_final + $request->total;
            } else if ($periode->sesi == 'final') {
                $newdata['jml_final'] = $cekkebakt->jml_final + $request->jumlah;
                $newdata['total_final'] = $cekkebakt->total_final + $request->total;
            }
            Kebutuhanakt::where('id', $cekkebakt->id)
                ->update($newdata);
        }

        return redirect('/kak?kode_skpd=' . $request->kode_skpd . '&kode=' . $request->kode_kak . '&periode=' . $request->periode)->with('success', 'Berhasil Menambah Kebutuhan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kebutuhanakt  $kebutuhanakt
     * @return \Illuminate\Http\Response
     */
    public function show(Kebutuhanakt $kebutuhanakt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kebutuhanakt  $kebutuhanakt
     * @return \Illuminate\Http\Response
     */
    public function edit(Kebutuhanakt $kebutuhanakt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kebutuhanakt  $kebutuhanakt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kebutuhanakt $kebutuhanakt)
    {
        //cek periode untuk add sesi
        $periode = Periode::where('periode', $request->periode)->first();
        if ($periode->sesi == 'rka') {
            $newdata['tipe_rka'] = 2;
            $newdata['jml_rka'] = $request->jumlah;
            $newdata['harga_rka'] = $request->harga;
            $newdata['total_rka'] = $request->total;
            $newdata['tipe_kuappas'] = 2;
            $newdata['jml_kuappas'] = $request->jumlah;
            $newdata['harga_kuappas'] = $request->harga;
            $newdata['total_kuappas'] = $request->total;
            $newdata['tipe_apbd'] = 2;
            $newdata['jml_apbd'] = $request->jumlah;
            $newdata['harga_apbd'] = $request->harga;
            $newdata['total_apbd'] = $request->total;
            $newdata['tipe_final'] = 2;
            $newdata['jml_final'] = $request->jumlah;
            $newdata['harga_final'] = $request->harga;
            $newdata['total_final'] = $request->total;
        } else if ($periode->sesi == 'kuappas') {
            $newdata['tipe_kuappas'] = 2;
            $newdata['jml_kuappas'] = $request->jumlah;
            $newdata['harga_kuappas'] = $request->harga;
            $newdata['total_kuappas'] = $request->total;
            $newdata['tipe_apbd'] = 2;
            $newdata['jml_apbd'] = $request->jumlah;
            $newdata['harga_apbd'] = $request->harga;
            $newdata['total_apbd'] = $request->total;
            $newdata['tipe_final'] = 2;
            $newdata['jml_final'] = $request->jumlah;
            $newdata['harga_final'] = $request->harga;
            $newdata['total_final'] = $request->total;
        } else if ($periode->sesi == 'apbd') {
            $newdata['tipe_apbd'] = 2;
            $newdata['jml_apbd'] = $request->jumlah;
            $newdata['harga_apbd'] = $request->harga;
            $newdata['total_apbd'] = $request->total;
            $newdata['tipe_final'] = 2;
            $newdata['jml_final'] = $request->jumlah;
            $newdata['harga_final'] = $request->harga;
            $newdata['total_final'] = $request->total;
        } else if ($periode->sesi == 'final') {
            $newdata['tipe_final'] = 2;
            $newdata['jml_final'] = $request->jumlah;
            $newdata['harga_final'] = $request->harga;
            $newdata['total_final'] = $request->total;
        }

        $newdata['berubah'] = 0;

        Kebutuhanakt::where('id', $kebutuhanakt->id)
                ->update($newdata);

        return redirect('/kak?kode_skpd=' . $request->kode_skpd . '&kode=' . $request->kode_kak . '&periode=' . $request->periode)->with('success', 'Berhasil Merubah Kebutuhan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kebutuhanakt  $kebutuhanakt
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kebutuhanakt $kebutuhanakt)
    {
        //cek periode untuk add sesi
        $periode = Periode::where('periode', request('periode'))->first();
        if ($periode->sesi == 'rka') {
            Kebutuhanakt::destroy($kebutuhanakt->id);
        } else if ($periode->sesi == 'kuappas') {
            $newdata['tipe_kuappas'] = 3;
            $newdata['alasan_kuappas'] = request('alasan');
            $newdata['jml_kuappas'] = 0;
            $newdata['harga_kuappas'] = 0;
            $newdata['total_kuappas'] = 0;
            $newdata['jml_apbd'] = 0;
            $newdata['harga_apbd'] = 0;
            $newdata['total_apbd'] = 0;
            $newdata['jml_final'] = 0;
            $newdata['harga_final'] = 0;
            $newdata['total_final'] = 0;

            Kebutuhanakt::where('id', $kebutuhanakt->id)
                    ->update($newdata);
        } else if ($periode->sesi == 'apbd') {
            $newdata['tipe_apbd'] = 3;
            $newdata['alasan_apbd'] = request('alasan');
            $newdata['jml_apbd'] = 0;
            $newdata['harga_apbd'] = 0;
            $newdata['total_apbd'] = 0;
            $newdata['jml_final'] = 0;
            $newdata['harga_final'] = 0;
            $newdata['total_final'] = 0;
            
            Kebutuhanakt::where('id', $kebutuhanakt->id)
                    ->update($newdata);
        } else if ($periode->sesi == 'final') {
            $newdata['tipe_final'] = 3;
            $newdata['alasan_final'] = request('alasan');
            $newdata['jml_final'] = 0;
            $newdata['harga_final'] = 0;
            $newdata['total_final'] = 0;

            Kebutuhanakt::where('id', $kebutuhanakt->id)
                    ->update($newdata);
        }

        return redirect('/kak?kode_skpd=' . request('kode_skpd') . '&kode=' . request('kode_kak') . '&periode=' . request('periode'))->with('success', 'Berhasil Merubah Kebutuhan');
    }
}
