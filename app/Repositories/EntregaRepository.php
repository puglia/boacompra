<?php

namespace App\Repositories;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Entrega;
use App\Brinde;
use App\Repositories\BrindeRepository;

class EntregaRepository
{
	private $initialLoad = [
			[  'id' => 1,
					'brinde' => 1,
					'distancia' => 1
				],
			[  'id' => 2,
					'brinde' => 2,
					'distancia' => 1
				],
			[  'id' => 3,
					'brinde' => 3,
					'distancia' => 1
				],
			[  'id' => 4,
					'brinde' => 1,
					'distancia' => 430
				],
			[  'id' => 5,
					'brinde' => 1,
					'distancia' => 33
				],
			[  'id' => 6,
					'brinde' => 1,
					'distancia' => 50
				],
			[  'id' => 7,
					'brinde' => 2,
					'distancia' => 100
				],
			[  'id' => 8,
					'brinde' => 4,
					'distancia' => 1000
				],
			[  'id' => 9,
					'brinde' => 5,
					'distancia' => 5
				],
			[  'id' => 10,
					'brinde' => 3,
					'distancia' => 1000
				],
	
	];
    private $entregas = [];
	
	function __construct(){
		$this->init();
	}
	
	function list(){
		return $this->entregas;
	}
	
	function find($id){
		foreach($this->entregas as $entrega)
			if($entrega->id == $id)
				return $entrega;
			
		return null;
	}
	
	private function init(){
		$brindesRepo = new BrindeRepository();
		foreach( $this->initialLoad as $item){
			$brinde = $brindesRepo->find($item['brinde']);
			$entrega = new Entrega();
			$entrega->id = $item['id'];
			$entrega->distancia = $item['distancia'];
			$entrega->brinde = $brinde;
			$this->entregas[] = $entrega;
		}
	}
}
