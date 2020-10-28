<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrega extends Model
{
    protected $fillable = ['distancia','brinde'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
	
	public function brinde()
    {
        return $this->hasOne('App\Brinde');
    }
}
