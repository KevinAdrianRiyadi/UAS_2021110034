<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bahanbaku extends Model
{
        protected $table = 'bahanbaku';
    protected $guarded = ['id'];
    public $timestamps = false;

     public function supplier(){
        return $this->belongsTo(userdata::class,'id_supplier','id');
    }
}
