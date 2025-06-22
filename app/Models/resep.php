<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resep extends Model
{
    protected $table = 'resep';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function stokbahanbaku()
    {
        return $this->hasMany(stokbahanbaku::class, 'id', 'id_stokbahanbaku');
    }
}
