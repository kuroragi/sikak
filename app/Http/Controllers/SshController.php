<?php

namespace App\Http\Controllers;

use App\Kebutuhanakt;
use App\Periode;
use App\Satuan;
use App\Ssh;
use Illuminate\Http\Request;

class SshController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ssh = Ssh::filter(request(['barang']))->paginate(50);
        $changedssh = Ssh::where('berubah', 1)->count();
        $satuan = Satuan::orderBy('satuan')->get();
        return view('master.ssh.index', [
            'sshes' => $ssh,
            'satuan' => $satuan,
            'changedssh' => $changedssh
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
     * @param  \App\Ssh  $ssh
     * @return \Illuminate\Http\Response
     */
    public function show(Ssh $ssh)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ssh  $ssh
     * @return \Illuminate\Http\Response
     */
    public function edit(Ssh $ssh)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ssh  $ssh
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ssh $ssh)
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
        
        $changedSsh = Ssh::where('berubah', 1)->get();
        foreach($changedSsh as $cssh){
            $kebhasssh = Kebutuhanakt::where('kode_item', $cssh->id)->where('periode', $periode->periode)->get();
            foreach ($kebhasssh as $kssh) {
                $hargabaru = $cssh->harga_std;
                $totalbaru = $cssh->harga_std * $kssh->$jmlsesi;
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

            Ssh::where('id', $cssh->id)->update($sshber);
        }

        return redirect('/ssh')->with('warning', 'Berhasil Mengupdate data ssh kebutuhan periode '.$periode->periode.' sesi '.$periode->sesi);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ssh  $ssh
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ssh $ssh)
    {
        //
    }
}
