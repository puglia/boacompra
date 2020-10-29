<?php

namespace App\Http\Services;

use App\Repositories\EntregaRepository;
use App\Repositories\ModoEntregaRepository;

class EntregaService
{
	
	public static $instance;

    private function __construct() {
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            self::$instance = new EntregaService();
        }

        return self::$instance;
    }
	
    function buscaEntrega($id){
		$entregaRepo = new EntregaRepository();
		return $entregaRepo->find($id);
	}
	
	function listaEntregas(){
		$entregaRepo = new EntregaRepository();
		return $entregaRepo->list();
	}
	
	function listaModosEntrega(){
		$modoEntregaRepo = new ModoEntregaRepository();
		return $modoEntregaRepo->list();
	}
	
	function geraTabelaCustos($id){
		$entrega = $this->buscaEntrega($id);
		$brinde = $entrega->brinde;
		$modosEntrega = $this->listaModosEntrega();
		//Filtra opções de entrega baseado no peso dos brindes
		$modosEntrega = filtra_modos_aplicaveis($modosEntrega,$brinde);
		
		//Monta tabela de custos
		$tabelaCustos = array_map(function($modo) use ($entrega){
			$item = new \stdClass();
			$item->modo = $modo;
			$item->val =  calcula_custo_entrega($modo,$entrega);
			return $item;
		},$modosEntrega);
		
		return $tabelaCustos;
	}
	
}
