<?php

if (! function_exists('calcula_custo_entrega')) {
    function calcula_custo_entrega($modoEntrega,$entrega){
		return $modoEntrega->valFixo + ($entrega->brinde->peso * $entrega->distancia * $modoEntrega->valDinamico);
	}
}

if (! function_exists('modos_aplicaveis')) {
    function filtra_modos_aplicaveis($modosEntrega,$brinde){
		$modosFiltrados = array_filter($modosEntrega, function($modo) use ($brinde) {
		  return ((!$modo->pesoMax || $brinde->peso < $modo->pesoMax) && $brinde->peso >= $modo->pesoMin);
		});
		return	$modosFiltrados;
	}
}
