<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanSkpdExportView implements FromView
{
    private $skpd;
    private $periode;
    private $getlaporan;
    private $jenis;

    public function __construct(array $array)
    {
        $this->skpd = $array['skpd'];
        $this->periode = $array['periode'];
        $this->getlaporan = $array['getlaporan'];
        $this->jenis = $array['jenis'];
    }
    
    

    public function view(): View
    {
        return view('laporan.cetakkakskpd', [
            'skpd' => $this->skpd,
            'periode' => $this->periode,
            'getlaporan' => $this->getlaporan,
            'jenis' => $this->jenis,
        ]); 
    }
}
