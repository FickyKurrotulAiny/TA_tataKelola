<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PermintaanDetail extends Model
{
    use HasFactory,SoftDeletes;

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_permintaan',
        'id_barang',
    ];

    protected $hidden = [];

    public function barang(){
        return $this->hasOne(Persediaan::class,'id','id_barang');
    }
}
