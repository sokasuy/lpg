<?php

namespace App\Http\Controllers;

use App\Models\Agen;
use App\Models\Pangkalan;
use App\Models\Logbook;
use Carbon\Carbon;
use DB;
use DateTime;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // COMBO BOX DI DASHBOARD
        $dataAgen = Agen::getAgen();
        $dataCbo['dataAgen'] = $dataAgen;

        // $dataBulanLogbook = Logbook::getBulanLogbook();
        // $dataCbo['bulanLogbook'] = $dataBulanLogbook;

        // 8 Mar 2023 menambahkan kirim periode bulan ke halaman homepage
        // $bulanSekarang = Carbon::now()->format('M Y');
        // dd($tahunSekarang);

        return view('home', compact('dataCbo'));
    }

    public function refreshPeriodeLogbookAgen(Request $request)
    {
        $kodeagen = $request->get('kodeagen');
        $dataPeriode = Logbook::getPeriodeLogbook($kodeagen);
        return response()->json(
            array(
                'status' => 'ok',
                'msg' => view('lov.listperiode', compact('dataPeriode'))->render()
            ),
            200
        );
    }

    public function refreshPangkalanLogbook(Request $request)
    {
        $kodeagen = $request->get('kodeagen');
        $dataPangkalan = Pangkalan::getPangkalan($kodeagen);
        return response()->json(
            array(
                'status' => 'ok',
                'msg' => view('lov.listpangkalan', compact('dataPangkalan'))->render()
            ),
            200
        );
    }

    public function refreshAgenLogbookChart(Request $request)
    {
        //Refresh Agen Logbook Chart
        // DB::enableQueryLog();

        $kriteria = $request->get('kriteria');
        $isiFilter = $request->get('isiFilter');
        $kodeAgen = $request->get('kodeAgen');

        // $listPangkalan = Logbook::getPangkalanByPeriode($kriteria, $isiFilter, $kodeAgen);
        // $trxMap = Logbook::getSumTrxMapByPeriodeChart($kriteria, $isiFilter, $kodeAgen);
        // $penerimaan = Logbook::getSumPenerimaanByPeriodeChart($kriteria, $isiFilter, $kodeAgen);
        // $persentase = Logbook::getPersentaseByPeriodeChart($kriteria, $isiFilter, $kodeAgen);

        // dd(DB::getQueryLog());

        // foreach ($listPangkalan as $pangkalan) {
        //     $trxMap[$pangkalan->idpangkalan] = $trxMap[$pangkalan->idpangkalan] ?? 0;
        //     $penerimaan[$pangkalan->idpangkalan] = $penerimaan[$pangkalan->idpangkalan] ?? 1;
        //     if ($penerimaan[$pangkalan->idpangkalan] === 1) {
        //         $persentase[$pangkalan->namapangkalan] = 100;
        //     } else {
        //         $persentase[$pangkalan->namapangkalan] = ($trxMap[$pangkalan->idpangkalan] / $penerimaan[$pangkalan->idpangkalan]) * 100;
        //     }
        // }
        // $persentase = collect((object)$persentase);

        $data = Logbook::getLogbookAgen($kriteria, $isiFilter, $kodeAgen);

        $ajaxLabels['persentase'] = $data->keys();
        $ajaxData['persentase'] = $data->values();

        return response()->json(
            array(
                'status' => 'ok',
                'labels' => $ajaxLabels,
                'data' => $ajaxData
            ),
            200
        );
        //=============================================================================================================
    }
}
