<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;


use App\Repositories\ModoEntregaRepository;

class ModoEntregaRepositoryTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testList()
    {
		$modoRepo = new ModoEntregaRepository();
		$modos = $modoRepo->list();
        $this->assertTrue(!empty($modos));
    }
	
	public function testFind(){
		$modoRepo = new ModoEntregaRepository();
		$modo = $modoRepo->find(3);
        $this->assertNotNull($modo);
		$this->assertTrue($modo->id == 3);
	}
}
