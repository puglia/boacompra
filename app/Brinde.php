<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brinde extends Model
{
    //private $produto;
	//private $distancia
	//private $peso;
	
	protected $fillable = ['id','nome', 'peso'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
	
	
}
