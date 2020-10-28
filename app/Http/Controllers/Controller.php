<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Repositories\EntregaRepository;
use App\Repositories\ModoEntregaRepository;
use App\Brinde;


class Controller extends BaseController
{
    
	
	function index(){
		$entregaRepo = new EntregaRepository();
		$entregas = $entregaRepo->list();
		//echo json_encode($entregas);
		return view('index', array('entregas' => $entregas));

	}
	
	function details($id){
		$entregaRepo = new EntregaRepository();
		$modoEntregaRepo = new ModoEntregaRepository();
		$entrega = $entregaRepo->find($id);
		$brinde = $entrega->brinde;
		$modosEntrega = $modoEntregaRepo->list();
		
		$modosEntrega = array_filter($modosEntrega, function($modo) use ($brinde) {
		  return ((!$modo->pesoMax || $brinde->peso < $modo->pesoMax) && $brinde->peso >= $modo->pesoMin);
		});
		$result = array_map(function($modo) use ($entrega){
			return ['modo' => $modo->nomeEmpresa,'val' => $this->calc($modo,$entrega)];
		},$modosEntrega);
		usort($result,function($a,$b){
			return $a['val'] - $b['val'];
		});
		return view('details', array('entrega' => $entrega,'custos' => $result));
	}
	
	function calc($modoEntrega,$entrega){
		return $modoEntrega->valFixo + ($entrega->brinde->peso * $entrega->distancia * $modoEntrega->valDinamico);
	}
}
