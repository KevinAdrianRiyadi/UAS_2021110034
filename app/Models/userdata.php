<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class userdata extends Authenticatable
{
    protected $guarded = ['id'];
    protected $table = 'userdatas';
    public $timestamps = false;

    
}
