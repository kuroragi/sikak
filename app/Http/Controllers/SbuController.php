<?php

namespace App\Http\Controllers;

use App\Kebutuhanakt;
use App\Periode;

use App\Satuan;
use App\Sbu;
use Illuminate\Http\Request;

class SbuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sbu = Sbu::filter(request(['barang']))->paginate(50);
        $changedsbu = Sbu::where('berubah', 1)->count();
        $satuan = Satuan::orderBy('satuan')->get();
        return view('master.sbu.index', [
            'sbus' => $sbu,
            'satuan' => $satuan,
            'changedsbu' => $changedsbu
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sbu  $sbu
     * @return \Illuminate\Http\Response
     */
    public function show(Sbu $sbu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sbu  $sbu
     * @return \Illuminate\Http\Response
     */
    public function edit(Sbu $sbu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sbu  $sbu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sbu $sbu)
    {
        //
    }

    public function updatekebssh(Request $request){
        $periode = Periode::where('proses', 'berjalan')->orderBy('id', 'DESC')->first();
        if($periode->sesi == 'rka'){
            $jmlsesi = 'jml_rka';
        }else if($periode->sesi == 'kuappas'){
            $jmlsesi = 'jml_kuappas';
        }else if($periode->sesi == 'apbd'){
            $jmlsesi = 'jml_apbd';
        }else if($periode->sesi == 'final'){
            $jmlsesi = 'jml_final';
        }
        
        $changedSsh = Sbu::where('berubah', 1)->get();
        foreach($changedSsh as $cssh){
            $kebhasssh = Kebutuhanakt::where('kode_item', $cssh->id)->where('periode', $periode->periode)->get();
            foreach ($kebhasssh as $kssh) {
                $hargabaru = $cssh->harga;
                $totalbaru = $cssh->harga * $kssh->$jmlsesi;
                if ($periode->sesi == 'rka') {
                    $berubah['harga_rka'] = $hargabaru;
                    $berubah['total_rka'] = $totalbaru;
                    $berubah['harga_kuappas'] = $hargabaru;
                    $berubah['total_kuappas'] = $totalbaru;
                    $berubah['harga_apbd'] = $hargabaru;
                    $berubah['total_apbd'] = $totalbaru;
                    $berubah['harga_final'] = $hargabaru;
                    $berubah['total_final'] = $totalbaru;
                } else if ($periode->sesi == 'kuappas') {
                    $berubah['harga_kuappas'] = $hargabaru;
                    $berubah['total_kuappas'] = $totalbaru;
                    $berubah['harga_apbd'] = $hargabaru;
                    $berubah['total_apbd'] = $totalbaru;
                    $berubah['harga_final'] = $hargabaru;
                    $berubah['total_final'] = $totalbaru;
                } else if ($periode->sesi == 'apbd') {
                    $berubah['harga_apbd'] = $hargabaru;
                    $berubah['total_apbd'] = $totalbaru;
                    $berubah['harga_final'] = $hargabaru;
                    $berubah['total_final'] = $totalbaru;
                } else if ($periode->sesi == 'final') {
                    $berubah['harga_final'] = $hargabaru;
                    $berubah['total_final'] = $totalbaru;
                }
                $berubah['berubah'] = 1;

                Kebutuhanakt::where('id', $kssh->id)->update($berubah);
            }

            $sshber['berubah'] = 0;

            Sbu::where('id', $cssh->id)->update($sshber);
        }

        return redirect('/sbu')->with('warning', 'Berhasil Mengupdate data ssh kebutuhan periode '.$periode->periode.' sesi '.$periode->sesi);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sbu  $sbu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sbu $sbu)
    {
        //
    }
}
