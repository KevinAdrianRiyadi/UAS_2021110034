<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class makanan extends Model
{
    protected $table = 'makanan';
    protected $guarded = ['id'];
    public $timestamps = false;

        public function stokbahanbaku()
    {
        return $this->belongsToMany(stokbahanbaku::class, 'resep', 'id_menu', 'id_stokbahanbaku')
                    ->withPivot('jumlah_dibutuhkan');
    }
}
