<?php

namespace App\Repositories;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\ModoEntrega;

class ModoEntregaRepository
{
	private $initialLoad = [
			 [  'id' => 1,
				'nomeEmpresa' => 'BoaDex',
				'valFixo' => 10,
				'valDinamico' => 0.05,
			],
			 [  'id' => 2,
				'nomeEmpresa' => 'BoaLog',
				'valFixo' => 4.30,
				'valDinamico' => 0.12,
			],
			[  'id' => 3,
				'nomeEmpresa' => 'Transboa',
				'valFixo' => 2.10,
				'valDinamico' => 1.10,
				'pesoMax' => 5,
			],
			[  'id' => 4,
				'nomeEmpresa' => 'Transboa',
				'valFixo' => 10,
				'valDinamico' => 0.01,
				'pesoMin' => 5,
			],
	
	];
    private $modosEntrega = [];
	
	function __construct(){
		$this->init();
	}
	
	function list(){
		return $this->modosEntrega;
	}
	
	function find($id){
		foreach($this->modosEntrega as $modo)
			if($modo->id == $id)
				return $modo;
			
		return null;
	}
	
	private function init(){
		foreach( $this->initialLoad as $item)
			$this->modosEntrega[] = new ModoEntrega($item);
	}
}
