<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;


class CatUnitTest extends TestCase
{
    public function testShow()
    {
    	$response = $this->json('GET', 'http://127.0.0.1:8000/api/task/5');
        $response->assertStatus(500);
    }

    public function testDelete()
    {
        $response = $this->json('DELETE', 'http://127.0.0.1:8000/api/task/1');
        $response->assertStatus(200);
    }

    public function testUpdate()
    {
        $response = $this->json('PATCH', 'http://127.0.0.1:8000/api/task/3', [
            'name' => 'sharik',
            'age' => '7',
            'weight' => '10',
            'amount_of_legs' => '4'
        ]);
        $response->assertStatus(200);
    }

    public function testCreate()
    {
        $response = $this->json('POST', 'http://127.0.0.1:8000/api/task', [
            'name' => 'tuzik',
            'age' => '4',
            'weight' => '4',
            'amount_of_legs' => '1'
        ]);
		$response->assertStatus(201);
	}

}
