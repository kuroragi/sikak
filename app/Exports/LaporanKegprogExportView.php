<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanKegprogExportView implements FromView
{
    private $kegprog;
    private $progbid;
    private $bidurus;
    private $urusan;
    private $skpd;
    private $periode;
    private $getlaporan;
    private $jenis;

    public function __construct(array $array)
    {
        $this->kegprog = $array['kegprog'];
        $this->progbid = $array['progbid'];
        $this->bidurus = $array['bidurus'];
        $this->urusan = $array['urusan'];
        $this->skpd = $array['skpd'];
        $this->periode = $array['periode'];
        $this->getlaporan = $array['getlaporan'];
        $this->jenis = $array['jenis'];
    }
    
    

    public function view(): View
    {
        return view('laporan.cetakkakkegprog', [
            'kegprog' => $this->kegprog,
            'progbid' => $this->progbid,
            'bidurus' => $this->bidurus,
            'urusan' => $this->urusan,
            'skpd' => $this->skpd,
            'periode' => $this->periode,
            'getlaporan' => $this->getlaporan,
            'jenis' => $this->jenis,
        ]); 
    }
}
