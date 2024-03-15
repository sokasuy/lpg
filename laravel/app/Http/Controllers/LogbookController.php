<?php

namespace App\Http\Controllers;

use App\Models\Logbook;
use Illuminate\Http\Request;
use Carbon\Carbon;

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

    public function reportLogbook()
    {
        return view('reports.logbook');
    }

    public function getReportLogbook(Request $request)
    {
        // SELECT h.entiti,h.noinvoice,h.tanggal,h.pembayaran,d.sku,d.namabarang,d.qty,d.satuan,d.harga,d.jumlah,d.statusbarang,h.adddate,h.editdate FROM trjualh as h inner join trjuald as d on h.entiti=d.entiti and h.noinvoice=d.noinvoice WHERE h.tanggal='2022-11-06' and d.faktorqty=-1 ORDER BY h.adddate ASC, d.namabarang ASC;
        $kriteria = $request->get('kriteria');
        $isiFilter = $request->get('isiFilter');

        // dd($request);

        if ($kriteria == "hari_ini") {
            // $data = Sales::getPenjualanByPeriode($kriteria, Carbon::now()->toDateString());
            $isiFilter  = Carbon::now()->toDateString();
        } else if ($kriteria == "3_hari") {
            // $data = Sales::getPenjualanByPeriode($kriteria, Carbon::now()->subDays(3)->toDateString());
            $isiFilter  = Carbon::now()->subDays(3)->toDateString();
        } else if ($kriteria == "7_hari") {
            // $data = Sales::getPenjualanByPeriode($kriteria, Carbon::now()->subDays(7)->toDateString());
            $isiFilter  = Carbon::now()->subDays(7)->toDateString();
        } else if ($kriteria == "14_hari") {
            // $data = Sales::getPenjualanByPeriode($kriteria, Carbon::now()->subDays(14)->toDateString());
            $isiFilter  = Carbon::now()->subDays(14)->toDateString();
        } else if ($kriteria == "bulan_berjalan") {
            // $data = Sales::getPenjualanByPeriode($kriteria, Carbon::now());
            $isiFilter  = Carbon::now();
        } else if ($kriteria == "semua") {
            // $data = Sales::getPenjualanByPeriode($kriteria, $isiFilter);
        } else if ($kriteria == "berdasarkan_tanggal_penjualan") {
            // $data = Sales::getPenjualanByPeriode($kriteria, $isiFilter);
        }

        $data = Logbook::getLogbookByPeriode($kriteria, $isiFilter);
        return response()->json(
            array(
                'status' => 'ok',
                'data' => $data
            ),
            200
        );
    }
}
