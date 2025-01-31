<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanSubkegExportView implements FromView
{
    private $subkeg;
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
        $this->subkeg = $array['subkeg'];
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
        return view('laporan.cetakkaksubkeg', [
            'subkeg' => $this->subkeg->load([
                'kak' => function($query){
                    $query->with([
                        'tahap.aktivitas.personalakt' => function ($query) {
                            $query->with('personil');
                        },
                        'tahap.aktivitas.instruakt' => function ($query) {
                            $query->with('instrumen');
                        },
                        'tahap.aktivitas.dataakt' => function ($query) {
                            $query->with('datakeg');
                        },
                        'tahap.aktivitas.kebutuhanakt' => function ($query) {
                            $query->with(['ssh.satuan', 'sbu.satuan', 'usulanssh.satuan', 'usulansbu.satuan']);
                        }
                    ]);
                }
            ]),
            'kegprog' => $this->kegprog,
            'progbid' => $this->progbid,
            'bidurus' => $this->bidurus,
            'subkeg' => $this->subkeg,
            'urusan' => $this->urusan,
            'skpd' => $this->skpd,
            'periode' => $this->periode,
            'getlaporan' => $this->getlaporan,
            'jenis' => $this->jenis,
        ]); 
    }

}
