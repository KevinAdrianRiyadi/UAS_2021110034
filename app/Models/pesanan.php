<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanan extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];
    protected $table = 'pesanan';

    public function makanan(){
        return $this->hasMany(makanan::class,'id','menu_id');
    }
    public function user(){
        return $this->hasMany(userdata::class,'id','user_id');
    }
    public function minuman(){
        return $this->hasMany(minuman::class,'id','minuman_id');
    }
    public function dessert(){
        return $this->hasMany(dessert::class,'id','dessert_id');
    }
    public function pesanandetail(){
        return $this->hasMany(pesanandetail::class,'id_pesanan','id_detailpesanan');
    }

}
