<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    public function testExample()
    {
        $response = $this->json('POST', '/api/v1/requestToken', ['email' => 'nunooo@hotmail.com.br','password'=>'1234567893']);
        $response
            ->assertStatus(200);
    }
}
