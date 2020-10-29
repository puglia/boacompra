<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Brinde;
use App\Http\Services\EntregaService;

class Controller extends BaseController
{
    
	
	function index(){
		$service = EntregaService::getInstance();
		$entregas = $service->listaEntregas();
		return view('index', array('entregas' => $entregas));
	}
	
	function details($id){
		$service = EntregaService::getInstance();
		$entrega =  $service->geraTabelaCustos($id);
		$tabelaCustos = $service->geraTabelaCustos($id);
		
		//Ordena pelo valor ascendente
		usort($tabelaCustos,function($a,$b){
			return $a->val - $b->val;
		});
		
		return view('details', array('entrega' => $entrega,'custos' => $tabelaCustos));
	}
	
}
