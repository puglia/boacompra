<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModoEntrega extends Model
{
	protected $fillable = ['id','nomeEmpresa','valFixo', 'valDinamico', 'pesoMax', 'pesoMin'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

	
}
