<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Repositories\EntregaRepository;

class ControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get('/');
		
		$entregasRepo = new EntregaRepository();
		$entregas = $entregasRepo->list();

        $response->assertStatus(200);
		
		foreach($entregas as $entrega)
			$response->assertSee($entrega->brinde->name);
    }
	
	public function testDetails()
    {
        $response = $this->get('/entrega/2');
		
		$entregasRepo = new EntregaRepository();
		$entrega = $entregasRepo->find(2);

        $response->assertStatus(200);
		
		$response->assertSee($entrega->brinde->name);
    }
}
