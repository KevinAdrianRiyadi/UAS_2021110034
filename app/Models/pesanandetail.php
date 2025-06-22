<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanandetail extends Model
{
    protected $table = 'pesanandetail';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function makanan()
    {
        return $this->belongsTo(makanan::class,'id_menu');
    }
    public function pesanan()
    {
        return $this->hasMany(pesanan::class,'id_detailpesanan','id_pesanan');
    }

}
