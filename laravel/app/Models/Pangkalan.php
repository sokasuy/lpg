<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pangkalan extends Model
{
    use HasFactory;
    protected $table = 'mspangkalan';
    protected $primaryKey = ['idpangkalan'];
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;

    public static function getPangkalan($kodeAgen)
    {
        $dataPangkalan = self::on()->select('idpangkalan', 'namapangkalan')->where('discontinue', 'False')->where('kodeagen', $kodeAgen)->orderBy('namapangkalan')->get();
        return $dataPangkalan;
    }
}
