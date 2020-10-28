<?php

namespace App\Repositories;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Brinde;

class BrindeRepository
{
	private $initialLoad = [
			 [  'id' => 1,
					'nome' => 'Fone de Ouvido',
					'peso' => 1
				],
			 [  'id' => 2,
					'nome' => 'Controle Xbox',
					'peso' => 3
				],
			[  'id' => 3,
					'nome' => 'Pc Gamer',
					'peso' => 35
				],
			 [  'id' => 4,
					'nome' => 'Kit Gamer',
					'peso' => 5
				],
			 [  'id' => 5,
					'nome' => 'Teclado + Fone',
					'peso' => 6
				]
	
	];
    private $brindes = [];
	
	function __construct(){
		$this->init();
	}
	
	function list(){
		return $this->brindes;
	}
	
	function find($id){
		foreach($this->brindes as $brinde)
			if($brinde->id == $id)
				return $brinde;
			
		return null;
	}
	
	private function init(){
		foreach( $this->initialLoad as $item)
			$this->brindes[] = new Brinde($item);
	}
}
