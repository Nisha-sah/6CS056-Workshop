<?php

namespace Tests\Feature;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class ApiStudentsTest extends TestCase
{
    public function test_students_can_be_created_and_listed_as_json(): void
    {
        Schema::create('students', function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->text('address')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->timestamps();
        });

        $studentData = [
            'name' => 'Avery Student',
            'email' => 'avery@example.test',
            'phone' => '555-0100',
            'address' => '1 Example Street',
            'date_of_birth' => '2000-01-15',
        ];

        $this->postJson('/api/students', $studentData)
            ->assertCreated()
            ->assertJsonPath('data.name', 'Avery Student')
            ->assertJsonPath('data.email', 'avery@example.test');

        $this->assertDatabaseHas('students', [
            'email' => 'avery@example.test',
            'name' => 'Avery Student',
        ]);

        $this->getJson('/api/students')
            ->assertOk()
            ->assertJsonPath('data.0.email', 'avery@example.test');
    }
}
