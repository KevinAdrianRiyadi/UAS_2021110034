<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logpemakaianbahanbaku extends Model
{
    protected $table = 'logpemakaianbahanbaku';
    protected $guarded = ['id'];
    public $timestamps = false;

        public function makanan() {
        return $this->belongsTo(makanan::class);
    }

    public function stokbahan() {
        return $this->belongsTo(stokbahanbaku::class);
    }

    public function namamenu ()
    {
        return $this->hasMany(makanan::class, 'id', 'id_menu');
    }
    public function namastok ()
    {
        return $this->hasMany(stokbahanbaku::class, 'id', 'id_stokbahanbaku');
    }
}
