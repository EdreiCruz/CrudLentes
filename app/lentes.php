<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class lentes extends Model
{
    
	use SoftDeletes;

	protected $dates = ['deleted_at'];

    protected $fillable = ['nombre','codigo','descripcion','precio'];

}
