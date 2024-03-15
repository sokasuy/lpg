<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agen extends Model
{
    use HasFactory;
    protected $table = 'msagen';
    protected $primaryKey = ['kodeagen'];
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = true;
    //const CREATED_AT = 'adddate';
    //const UPDATED_AT = 'editdate';

    public static function getAgen()
    {
        $dataAgen = self::on()->select('kodeagen', 'namaagen')->where('discontinue', 'False')->orderBy('kodeagen')->get();
        return $dataAgen;
    }
}
