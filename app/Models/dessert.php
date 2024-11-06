<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dessert extends Model
{
    protected $table = 'dessert';
    protected $guarded = ['id'];
    public $timestamps = false;
}
