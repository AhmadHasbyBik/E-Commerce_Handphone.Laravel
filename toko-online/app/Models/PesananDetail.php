<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    public function barang()
    {
        return $this->belongsTo(Barang::class,'barang_id','id');
    }

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class,'pesanan_id','id');
    }
}
