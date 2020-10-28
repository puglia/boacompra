<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModoEntrega extends Model
{
    //private $nomeEmpresa;
	//private $valFixo;
	//private $valDinamico;
	//private $pesoMax;
	//private $pesoMin;
	
	protected $fillable = ['nomeEmpresa','valFixo', 'valDinamico', 'pesoMax', 'pesoMin'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

	
}
