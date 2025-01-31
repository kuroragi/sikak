<?php

namespace App\Exports;

use App\Kak;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanKAKExportView implements FromView
{
    private $kak;
    private $subkeg;
    private $kegprog;
    private $progbid;
    private $bidurus;
    private $urusan;
    private $skpd;
    private $periode;
    private $jenis;

    public function __construct(array $array)
    {
        $this->kak = $array['kak'];
        $this->subkeg = $array['subkeg'];
        $this->kegprog = $array['kegprog'];
        $this->progbid = $array['progbid'];
        $this->bidurus = $array['bidurus'];
        $this->urusan = $array['urusan'];
        $this->skpd = $array['skpd'];
        $this->periode = $array['periode'];
        $this->jenis = $array['jenis'];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        // dd($this->kak);
        return view('laporan.cetakkak', [
            'kak' => $this->kak->load([
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
            ]),
            'subkeg' => $this->subkeg,
            'kegprog' => $this->kegprog,
            'progbid' => $this->progbid,
            'bidurus' => $this->bidurus,
            'subkeg' => $this->subkeg,
            'urusan' => $this->urusan,
            'skpd' => $this->skpd,
            'periode' => $this->periode,
            'jenis' => $this->jenis,
        ]);
    }
}
