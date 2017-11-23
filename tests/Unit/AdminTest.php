<?php

namespace Tests\Unit;

use App\Admin;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminTest extends TestCase
{
    use RefreshDatabase;

    public function testAdminLogin()
    {
        $admin = factory(Admin::class)->create();
        $response = $this->actingAs($admin, 'admin')
            ->get('/admin');

        $response->assertStatus(200);
        $this->assertDatabaseHas('admins', ['id' => $admin->id]);
        $response->assertViewIs('dashboard.admin');
    }

    public function testGuestLogin()
    {
        $response = $this->get('/admin');
        $response->assertStatus(302);
        $response->assertRedirect('/admin/login');
    }
}
