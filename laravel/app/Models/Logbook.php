<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;
use DateTime;

class Logbook extends Model
{
    use HasFactory;
    protected $table = 'trlogbookmap';
    protected $primaryKey = ['kodeagen', 'idpangkalan', 'tanggal'];
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;

    public static $months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

    public static function getPeriodeMap($kodeAgen)
    {
        $dataPeriodeMap = self::on()->select(DB::raw("to_char(tanggal, 'Month') ||''|| Extract('Year' from tanggal) as periode"))->where('kodeagen', $kodeAgen)->groupBy(DB::raw("to_char(tanggal, 'Month'),Extract('Year' from tanggal), Extract('Month' from tanggal)"))->orderByDesc(DB::raw("Extract('Year' from tanggal) desc, Extract('Month' from tanggal)"))->get();
        return $dataPeriodeMap;
    }

    public static function getMapAgen($kriteria, $isiFilter, $kodeAgen, $persen)
    {
        if ($kriteria == "bulan") {
            $isiFilter = explode(" ", $isiFilter);
            foreach (self::$months as $key => $bulan) {
                if ($bulan == $isiFilter[0]) {
                    $isiFilter[0] = $key + 1;
                }
            }
        } elseif ($kriteria == "tanggal") {
            $isiFilter = explode(" - ", $isiFilter);
            $isiFilter[0] = explode("/", $isiFilter[0]);
            $isiFilter[1] = explode("/", $isiFilter[1]);
            $isiFilter[0] = $isiFilter[0][2] . "-" . $isiFilter[0][0] . "-" . $isiFilter[0][1];
            $isiFilter[1] = $isiFilter[1][2] . "-" . $isiFilter[1][0] . "-" . $isiFilter[1][1];
        }

        $listPangkalan = self::getListPangkalanPerAgen($kriteria, $isiFilter, $kodeAgen);
        $trxMap = self::getSumTrxMapPerAgen($kriteria, $isiFilter, $kodeAgen);
        $penerimaan = self::getSumPenerimaanPerAgen($kriteria, $isiFilter, $kodeAgen);
        $persentase = self::getPersentasePerAgen($kriteria, $isiFilter, $kodeAgen);

        foreach ($listPangkalan as $pangkalan) {
            // dd($trxMap[$pangkalan->idpangkalan]);
            $trxMap[$pangkalan->idpangkalan] = $trxMap[$pangkalan->idpangkalan] ?? 0;
            $penerimaan[$pangkalan->idpangkalan] = $penerimaan[$pangkalan->idpangkalan] ?? 0;
            if ($penerimaan[$pangkalan->idpangkalan] === 0) {
                $persentase[$pangkalan->namapangkalan] = 0;
            } else {
                $persentase[$pangkalan->namapangkalan] = ($trxMap[$pangkalan->idpangkalan] / $penerimaan[$pangkalan->idpangkalan]) * 100;
            }

            if ($persen == 'kurang dari') {
                // berarti yang >= 100% yang dihilangkan, karena akan menampilkan yang kurang dari 100% saja
                if ($persentase[$pangkalan->namapangkalan] >= 100) {
                    unset($persentase[$pangkalan->namapangkalan]);
                }
            } elseif ($persen == 'lebih dari') {
                // berarti yang < 105% yang dihilangkan, karena akan menampilkan yang lebih dari 105% saja
                if ($persentase[$pangkalan->namapangkalan] < 105) {
                    unset($persentase[$pangkalan->namapangkalan]);
                }
            }
        }

        $persentase = collect((object)$persentase);

        return $persentase;
    }

    public static function getMapPangkalan($kriteria, $isiFilter, $kodeAgen, $idPangkalan)
    {
        $isiFilter = explode(" - ", $isiFilter);
        $isiFilter[0] = explode("/", $isiFilter[0]);
        $isiFilter[1] = explode("/", $isiFilter[1]);
        $isiFilter[0] = $isiFilter[0][2] . "-" . $isiFilter[0][0] . "-" . $isiFilter[0][1];
        $isiFilter[1] = $isiFilter[1][2] . "-" . $isiFilter[1][0] . "-" . $isiFilter[1][1];

        if ($kriteria == "harian") {
        } elseif ($kriteria == "mingguan") {
        } elseif ($kriteria == "bulanan") {
        }

        $listPangkalan = self::getListPeriodePangkalan($kriteria, $isiFilter, $kodeAgen, $idPangkalan);
        $trxMap = self::getSumTrxMapPangkalan($kriteria, $isiFilter, $kodeAgen, $idPangkalan);
        $penerimaan = self::getSumPenerimaanPangkalan($kriteria, $isiFilter, $kodeAgen, $idPangkalan);
        $persentase = self::getPersentasePangkalan($kriteria, $isiFilter, $kodeAgen, $idPangkalan);
        // dd($trxMap);

        foreach ($listPangkalan as $pangkalan) {
            // dd($trxMap[$pangkalan->idpangkalan]);
            $trxMap[$pangkalan->tanggal] = $trxMap[$pangkalan->tanggal] ?? 0;
            $penerimaan[$pangkalan->tanggal] = $penerimaan[$pangkalan->tanggal] ?? 0;
            if ($penerimaan[$pangkalan->tanggal] === 0) {
                $persentase[$pangkalan->tanggal] = 0;
            } else {
                $persentase[$pangkalan->tanggal] = ($trxMap[$pangkalan->tanggal] / $penerimaan[$pangkalan->tanggal]) * 100;
            }
        }

        $persentase = collect((object)$persentase);
        // dd($persentase);

        return $persentase;
    }

    public static function getListPangkalanPerAgen($kriteria, $isiFilter, $kodeAgen)
    {
        if ($kriteria == "bulan") {
            $data = DB::table('trlogbookmap as tlm')->join('mspangkalan', function ($join) {
                $join->on('tlm.kodeagen', '=', 'mspangkalan.kodeagen');
                $join->on('tlm.idpangkalan', '=', 'mspangkalan.idpangkalan');
            })->select('tlm.idpangkalan', 'mspangkalan.namapangkalan')
                ->where('tlm.kodeagen', $kodeAgen)
                ->whereYear('tlm.tanggal', $isiFilter[1])
                ->whereMonth('tlm.tanggal', '=', $isiFilter[0])
                ->groupBy(['tlm.idpangkalan'], ['mspangkalan.namapangkalan'])
                ->orderBy('mspangkalan.namapangkalan')
                ->get();
        } elseif ($kriteria == "tanggal") {
            $data = DB::table('trlogbookmap as tlm')->join('mspangkalan', function ($join) {
                $join->on('tlm.kodeagen', '=', 'mspangkalan.kodeagen');
                $join->on('tlm.idpangkalan', '=', 'mspangkalan.idpangkalan');
            })->select('tlm.idpangkalan', 'mspangkalan.namapangkalan')
                ->where('tlm.kodeagen', $kodeAgen)
                ->where('tlm.tanggal', '>=', $isiFilter[0])
                ->where('tlm.tanggal', '<=', $isiFilter[1])
                ->groupBy(['tlm.idpangkalan'], ['mspangkalan.namapangkalan'])
                ->orderBy('mspangkalan.namapangkalan')
                ->get();
        }
        return $data;
    }

    public static function getListPeriodePangkalan($kriteria, $isiFilter, $kodeAgen, $idPangkalan)
    {
        if ($kriteria == "harian") {
            $data = DB::table('trlogbookmap as tlm')->join('mspangkalan', function ($join) {
                $join->on('tlm.kodeagen', '=', 'mspangkalan.kodeagen');
                $join->on('tlm.idpangkalan', '=', 'mspangkalan.idpangkalan');
            })->select('mspangkalan.namapangkalan', 'tlm.tanggal')
                ->where('tlm.kodeagen', $kodeAgen)
                ->where('tlm.tanggal', '>=', $isiFilter[0])
                ->where('tlm.tanggal', '<=', $isiFilter[1])
                ->where('tlm.idpangkalan', $idPangkalan)
                ->groupBy(['mspangkalan.namapangkalan'], ['tlm.tanggal'])
                ->orderBy('tlm.tanggal')
                ->get();
        } elseif ($kriteria == "mingguan") {
        } elseif ($kriteria == "bulanan") {
        }
        return $data;
    }

    public static function getPersentasePerAgen($kriteria, $isiFilter, $kodeAgen)
    {
        if ($kriteria == "bulan") {
            $data = DB::table('trlogbookmap as tlm')->join('mspangkalan', function ($join) {
                $join->on('tlm.kodeagen', '=', 'mspangkalan.kodeagen');
                $join->on('tlm.idpangkalan', '=', 'mspangkalan.idpangkalan');
            })->select('mspangkalan.namapangkalan', 'tlm.persentase')
                ->where('tlm.kodeagen', $kodeAgen)
                ->whereYear('tlm.tanggal', $isiFilter[1])
                ->whereMonth('tlm.tanggal', '=', $isiFilter[0])
                ->groupBy(['tlm.idpangkalan'], ['mspangkalan.namapangkalan'], ['tlm.persentase'])
                ->orderBy('mspangkalan.namapangkalan')
                ->pluck('tlm.persentase', 'mspangkalan.namapangkalan');
        } elseif ($kriteria == "tanggal") {
            $data = DB::table('trlogbookmap as tlm')->join('mspangkalan', function ($join) {
                $join->on('tlm.kodeagen', '=', 'mspangkalan.kodeagen');
                $join->on('tlm.idpangkalan', '=', 'mspangkalan.idpangkalan');
            })->select('mspangkalan.namapangkalan', 'tlm.persentase')
                ->where('tlm.kodeagen', $kodeAgen)
                ->where('tlm.tanggal', '>=', $isiFilter[0])
                ->where('tlm.tanggal', '<=', $isiFilter[1])
                ->groupBy(['tlm.idpangkalan'], ['mspangkalan.namapangkalan'], ['tlm.persentase'])
                ->orderBy('mspangkalan.namapangkalan')
                ->pluck('tlm.persentase', 'mspangkalan.namapangkalan');
        }
        return $data;
    }

    public static function getPersentasePangkalan($kriteria, $isiFilter, $kodeAgen, $idPangkalan)
    {
        if ($kriteria == "harian") {
            $data = DB::table('trlogbookmap as tlm')->join('mspangkalan', function ($join) {
                $join->on('tlm.kodeagen', '=', 'mspangkalan.kodeagen');
                $join->on('tlm.idpangkalan', '=', 'mspangkalan.idpangkalan');
            })->select('tlm.tanggal', 'tlm.persentase')
                ->where('tlm.kodeagen', $kodeAgen)
                ->where('tlm.idpangkalan', $idPangkalan)
                ->where('tlm.tanggal', '>=', $isiFilter[0])
                ->where('tlm.tanggal', '<=', $isiFilter[1])
                ->groupBy(['tlm.tanggal'], ['tlm.persentase'])
                ->orderBy('tlm.tanggal')
                ->pluck('tlm.persentase', 'tlm.tanggal');
        } elseif ($kriteria == "mingguan") {
        } elseif ($kriteria == "bulanan") {
        }
        return $data;
    }

    public static function getSumTrxMapPerAgen($kriteria, $isiFilter, $kodeAgen)
    {
        if ($kriteria == "bulan") {
            $data = DB::table('trlogbookmap as tlm')->join('mspangkalan', function ($join) {
                $join->on('tlm.kodeagen', '=', 'mspangkalan.kodeagen');
                $join->on('tlm.idpangkalan', '=', 'mspangkalan.idpangkalan');
            })->select('mspangkalan.namapangkalan', 'tlm.idpangkalan')
                ->addSelect(['trxmap' => Logbook::select(DB::raw("sum(case when trxmap is not null then trxmap else 0 end)"))->whereColumn('kodeagen', 'tlm.kodeagen')->whereColumn('idpangkalan', 'tlm.idpangkalan')->whereYear('tanggal', $isiFilter[1])->whereMonth('tanggal', '=', $isiFilter[0])])
                ->where('tlm.kodeagen', $kodeAgen)
                ->whereYear('tlm.tanggal', $isiFilter[1])
                ->whereMonth('tlm.tanggal', '=', $isiFilter[0])
                ->groupBy(['tlm.kodeagen'], ['tlm.idpangkalan'], ['mspangkalan.namapangkalan'])
                ->orderBy('mspangkalan.namapangkalan')
                ->pluck('trxmap', 'tlm.idpangkalan');
        } elseif ($kriteria == "tanggal") {
            $data = DB::table('trlogbookmap as tlm')->join('mspangkalan', function ($join) {
                $join->on('tlm.kodeagen', '=', 'mspangkalan.kodeagen');
                $join->on('tlm.idpangkalan', '=', 'mspangkalan.idpangkalan');
            })->select('mspangkalan.namapangkalan', 'tlm.idpangkalan')
                ->addSelect(['trxmap' => Logbook::select(DB::raw("sum(case when trxmap is not null then trxmap else 0 end)"))->whereColumn('kodeagen', 'tlm.kodeagen')->whereColumn('idpangkalan', 'tlm.idpangkalan')->where('tanggal', '>=', $isiFilter[0])->where('tanggal', '<=', $isiFilter[1])])
                ->where('tlm.kodeagen', $kodeAgen)
                ->where('tlm.tanggal', '>=', $isiFilter[0])
                ->where('tlm.tanggal', '<=', $isiFilter[1])
                ->groupBy(['tlm.kodeagen'], ['tlm.idpangkalan'], ['mspangkalan.namapangkalan'])
                ->orderBy('mspangkalan.namapangkalan')
                ->pluck('trxmap', 'tlm.idpangkalan');
        }
        return $data;
    }

    public static function getSumTrxMapPangkalan($kriteria, $isiFilter, $kodeAgen, $idPangkalan)
    {
        if ($kriteria == "harian") {
            $data = DB::table('trlogbookmap as tlm')->join('mspangkalan', function ($join) {
                $join->on('tlm.kodeagen', '=', 'mspangkalan.kodeagen');
                $join->on('tlm.idpangkalan', '=', 'mspangkalan.idpangkalan');
            })->select('mspangkalan.namapangkalan', 'tlm.tanggal')
                ->addSelect(['trxmap' => Logbook::select(DB::raw("sum(case when trxmap is not null then trxmap else 0 end)"))->whereColumn('kodeagen', 'tlm.kodeagen')->whereColumn('idpangkalan', 'tlm.idpangkalan')->whereColumn('tanggal', '<=', 'tlm.tanggal')])
                ->where('tlm.kodeagen', $kodeAgen)
                ->where('tlm.idpangkalan', $idPangkalan)
                ->where('tlm.tanggal', '>=', $isiFilter[0])
                ->where('tlm.tanggal', '<=', $isiFilter[1])
                ->groupBy(['tlm.kodeagen'], ['tlm.idpangkalan'], ['tlm.tanggal'], ['mspangkalan.namapangkalan'])
                ->orderBy('tlm.tanggal')
                ->pluck('trxmap', 'tlm.tanggal');
        } elseif ($kriteria == "mingguan") {
        } elseif ($kriteria == "bulanan") {
        }
        return $data;
    }

    public static function getSumPenerimaanPerAgen($kriteria, $isiFilter, $kodeAgen)
    {
        if ($kriteria == "bulan") {
            $data = DB::table('trlogbookmap as tlm')->join('mspangkalan', function ($join) {
                $join->on('tlm.kodeagen', '=', 'mspangkalan.kodeagen');
                $join->on('tlm.idpangkalan', '=', 'mspangkalan.idpangkalan');
            })->select('mspangkalan.namapangkalan', 'tlm.idpangkalan')
                ->addSelect(['penerimaan' => Logbook::select(DB::raw("sum(case when penerimaan is not null then penerimaan else null end)"))->whereColumn('kodeagen', 'tlm.kodeagen')->whereColumn('idpangkalan', 'tlm.idpangkalan')->whereYear('tanggal', $isiFilter[1])->whereMonth('tanggal', '=', $isiFilter[0])])
                ->where('tlm.kodeagen', $kodeAgen)
                ->whereYear('tlm.tanggal', $isiFilter[1])
                ->whereMonth('tlm.tanggal', '=', $isiFilter[0])
                ->groupBy(['tlm.kodeagen'], ['tlm.idpangkalan'], ['mspangkalan.namapangkalan'])
                ->orderBy('mspangkalan.namapangkalan')
                ->pluck('penerimaan', 'tlm.idpangkalan');
        } elseif ($kriteria == "tanggal") {
            $data = DB::table('trlogbookmap as tlm')->join('mspangkalan', function ($join) {
                $join->on('tlm.kodeagen', '=', 'mspangkalan.kodeagen');
                $join->on('tlm.idpangkalan', '=', 'mspangkalan.idpangkalan');
            })->select('mspangkalan.namapangkalan', 'tlm.idpangkalan')
                ->addSelect(['penerimaan' => Logbook::select(DB::raw("sum(case when penerimaan is not null then penerimaan else null end)"))->whereColumn('kodeagen', 'tlm.kodeagen')->whereColumn('idpangkalan', 'tlm.idpangkalan')->where('tanggal', '>=', $isiFilter[0])->where('tanggal', '<=', $isiFilter[1])])
                ->where('tlm.kodeagen', $kodeAgen)
                ->where('tlm.tanggal', '>=', $isiFilter[0])
                ->where('tlm.tanggal', '<=', $isiFilter[1])
                ->groupBy(['tlm.kodeagen'], ['tlm.idpangkalan'], ['mspangkalan.namapangkalan'])
                ->orderBy('mspangkalan.namapangkalan')
                ->pluck('penerimaan', 'tlm.idpangkalan');
        }
        return $data;
    }

    public static function getSumPenerimaanPangkalan($kriteria, $isiFilter, $kodeAgen, $idPangkalan)
    {
        if ($kriteria == "harian") {
            $data = DB::table('trlogbookmap as tlm')->join('mspangkalan', function ($join) {
                $join->on('tlm.kodeagen', '=', 'mspangkalan.kodeagen');
                $join->on('tlm.idpangkalan', '=', 'mspangkalan.idpangkalan');
            })->select('mspangkalan.namapangkalan', 'tlm.tanggal')
                ->addSelect(['penerimaan' => Logbook::select(DB::raw("sum(case when penerimaan is not null then penerimaan else null end)"))->whereColumn('kodeagen', 'tlm.kodeagen')->whereColumn('idpangkalan', 'tlm.idpangkalan')->whereColumn('tanggal', '<=', 'tlm.tanggal')])
                ->where('tlm.kodeagen', $kodeAgen)
                ->where('tlm.idpangkalan', $idPangkalan)
                ->where('tlm.tanggal', '>=', $isiFilter[0])
                ->where('tlm.tanggal', '<=', $isiFilter[1])
                ->groupBy(['tlm.kodeagen'], ['tlm.idpangkalan'], ['tlm.tanggal'], ['mspangkalan.namapangkalan'])
                ->orderBy('tlm.tanggal')
                ->pluck('penerimaan', 'tlm.tanggal');
        } elseif ($kriteria == "mingguan") {
        } elseif ($kriteria == "bulanan") {
        }
        return $data;
    }
}
