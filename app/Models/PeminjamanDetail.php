<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeminjamanDetail extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [
        'id_peminjaman',
        'id_barang',
    ];

    protected $hidden = [];

    public function barang(){
        return $this->hasOne(Inventaris::class,'id','id_barang');
    }
}
