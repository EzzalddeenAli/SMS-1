<?php

namespace Tests\Unit;

use App\Student;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StudentTest extends TestCase
{
    use RefreshDatabase;

    public function testStudentLogin()
    {
        $student = factory(Student::class)->create();
        $response = $this->actingAs($student, 'student')
            ->get('/student');

        $response->assertStatus(200);
        $this->assertDatabaseHas('students', ['id' => $student->id]);
        $response->assertViewIs('dashboard.student');
    }

    public function testGuestLogin()
    {
        $response = $this->get('/student');
        $response->assertStatus(302);
        $response->assertRedirect('/student/login');
    }
}
