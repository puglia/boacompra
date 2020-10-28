<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

use App\Repositories\BrindeRepository;
use App\Brinde;

class BrindeRepositoryTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testList()
    {
		$brindeRepo = new BrindeRepository();
		$brindes = $brindeRepo->list();
        $this->assertNotEmpty($brindes);
    }
	
	public function testFind(){
		$brindeRepo = new BrindeRepository();
		$brinde = $brindeRepo->find(4);
        $this->assertNotNull($brinde);
		$this->assertTrue($brinde->id == 4);
	}
}
