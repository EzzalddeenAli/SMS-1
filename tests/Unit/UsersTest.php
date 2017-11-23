<?php

namespace Tests\Unit;

use App\Student;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testStudentLogin()
    {
        $student = factory(Student::class)->create();
        $response = $this->actingAs($student, 'student')
            ->get('/student');

        $response->assertStatus(200);
    }
}
