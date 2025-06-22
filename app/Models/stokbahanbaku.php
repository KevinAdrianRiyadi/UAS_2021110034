<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stokbahanbaku extends Model
{
    public $timestamps = false;
    protected $guarded = ['id'];
    protected $table = 'stokbahanbaku';

     public function makanan()
    {
        return $this->belongsToMany(makanan::class, 'resep', 'id_bahanbaku', 'id_menu')
                    ->withPivot('jumlah_dibutuhkan');
    }
}
