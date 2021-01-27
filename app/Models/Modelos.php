<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modelos extends Model
{
    protected $table = 'modelos';
    protected $fillable = ['name', 'ano', 'marca_id'];
}