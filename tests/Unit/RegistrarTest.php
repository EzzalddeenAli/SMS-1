<?php

namespace Tests\Unit;

use App\Registrar;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegistrarTest extends TestCase
{
    use RefreshDatabase;

    public function testRegistrarLogin()
    {
        $registrar = factory(Registrar::class)->create();
        $response = $this->actingAs($registrar, 'registrar')
            ->get('/registrar');

        $response->assertStatus(200);
        $this->assertDatabaseHas('registrars', ['id' => $registrar->id]);
        $response->assertViewIs('dashboard.registrar');
    }

    public function testGuestLogin()
    {
        $response = $this->get('/registrar');
        $response->assertStatus(302);
        $response->assertRedirect('/registrar/login');
    }
}
