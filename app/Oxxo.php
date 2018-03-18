<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oxxo extends Model
{
    protected $table = "oxxos";
    protected $fillable = ['ciudad', 'estado'];
}
