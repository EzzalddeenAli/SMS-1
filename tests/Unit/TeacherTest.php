<?php

namespace Tests\Unit;

use App\Teacher;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TeacherTest extends TestCase
{
    use RefreshDatabase;

    public function testTeacherLogin()
    {
        $teacher = factory(Teacher::class)->create();
        $response = $this->actingAs($teacher, 'teacher')
            ->get('/teacher');

        $response->assertStatus(200);
        $this->assertDatabaseHas('teachers', ['id' => $teacher->id]);
        $response->assertViewIs('dashboard.teacher');
    }

    public function testGuestLogin()
    {
        $response = $this->get('/teacher');
        $response->assertStatus(302);
        $response->assertRedirect('/teacher/login');
    }
}
