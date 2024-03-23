<?php

namespace App\Http\Controllers;

use App\Models\Logbook;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class LogbookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Logbook $logbook)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Logbook $logbook)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Logbook $logbook)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Logbook $logbook)
    {
        //
    }

    public function reportPerformanceagen()
    {
        return view('reports.logbook');
    }

    public function getPerformanceAgen(Request $request)
    {
        // SELECT h.entiti,h.noinvoice,h.tanggal,h.pembayaran,d.sku,d.namabarang,d.qty,d.satuan,d.harga,d.jumlah,d.statusbarang,h.adddate,h.editdate FROM trjualh as h inner join trjuald as d on h.entiti=d.entiti and h.noinvoice=d.noinvoice WHERE h.tanggal='2022-11-06' and d.faktorqty=-1 ORDER BY h.adddate ASC, d.namabarang ASC;
        $kriteria = $request->get('kriteria');
        $isiFilter = $request->get('isiFilter');

        // dd($request);

        if ($kriteria == "hari_ini") {
            $isiFilter  = Carbon::now()->toDateString();
        } else if ($kriteria == "3_hari") {
            $isiFilter  = Carbon::now()->subDays(3)->toDateString();
        } else if ($kriteria == "7_hari") {
            $isiFilter  = Carbon::now()->subDays(7)->toDateString();
        } else if ($kriteria == "14_hari") {
            $isiFilter  = Carbon::now()->subDays(14)->toDateString();
        } else if ($kriteria == "bulan_berjalan") {
            $isiFilter  = Carbon::now();
        } else if ($kriteria == "berdasarkan_bulan_map") {
        } else if ($kriteria == "berdasarkan_tanggal_map") {
        } else if ($kriteria == "semua") {
        }

        // DB::enableQueryLog();
        $data = Logbook::getPerformanceAgenByPeriode($kriteria, $isiFilter);
        // dd(DB::getQueryLog());
        return response()->json(
            array(
                'status' => 'ok',
                'data' => $data
            ),
            200
        );
    }
}
