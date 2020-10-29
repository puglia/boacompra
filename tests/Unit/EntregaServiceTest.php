<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Http\Services\EntregaService;

class EntregaServiceTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testBuscaEntrega()
    {
		$entrega = EntregaService::getInstance()->buscaEntrega(1);
        $this->assertNotNull($entrega);
		$this->assertTrue($entrega->id == 1);
    }
	
	public function testListaEntregas()
    {
		$entregas = EntregaService::getInstance()->listaEntregas();
        $this->assertNotNull($entregas);
		$this->assertNotEmpty($entregas);
    }
	
	public function testListaModosEntrega()
    {
		$modosEntrega = EntregaService::getInstance()->listaModosEntrega();
        $this->assertNotNull($modosEntrega);
		$this->assertNotEmpty($modosEntrega);
    }
	
	public function testGeraTabelaCustos()
    {
		$custos = EntregaService::getInstance()->geraTabelaCustos(1);
        $this->assertNotNull($custos);
		$this->assertNotEmpty($custos);
    }
}
