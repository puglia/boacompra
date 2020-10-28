<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use App\Repositories\EntregaRepository;

class EntregaRepositoryTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testList()
    {
		$entregaRepo = new EntregaRepository();
		$entregas = $entregaRepo->list();
        $this->assertTrue(!empty($entregas));
    }
	
	public function testFind(){
		$entregaRepo = new EntregaRepository();
		$entrega = $entregaRepo->find(2);
        $this->assertNotNull($entrega);
		$this->assertTrue($entrega->id == 2);
	}
}
