<?php

namespace Tests\Feature;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class ApiCourseRoutesTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Schema::create('courses', function (Blueprint $table): void {
            $table->id();
        });
    }

    public function test_course_collection_is_available_at_singular_and_plural_paths(): void
    {
        $this->getJson('/api/course')
            ->assertOk()
            ->assertJsonPath('data', []);

        $this->getJson('/api/courses')
            ->assertOk()
            ->assertJsonPath('data', []);
    }
}
