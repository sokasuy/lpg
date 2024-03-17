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

    public function refreshPeriodeMapAgen(Request $request)
    {
        $kodeagen = $request->get('kodeagen');
        $dataPeriode = Logbook::getPeriodeMap($kodeagen);
        return response()->json(
            array(
                'status' => 'ok',
                'msg' => view('lov.listperiode', compact('dataPeriode'))->render()
            ),
            200
        );
    }

    public function refreshPangkalanMap(Request $request)
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

    public function refreshAgenMapChart(Request $request)
    {
        //Refresh Agen Logbook Chart
        // DB::enableQueryLog();

        $kriteria = $request->get('kriteria');
        $isiFilter = $request->get('isiFilter');
        $kodeAgen = $request->get('kodeAgen');
        $persen =  $request->get('persen');

        $data = Logbook::getMapAgen($kriteria, $isiFilter, $kodeAgen, $persen);

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
