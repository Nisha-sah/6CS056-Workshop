<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('courses', 'user_id')) {
            Schema::table('courses', function (Blueprint $table) {
                $table->foreignId('user_id')
                    ->nullable()
                    ->constrained('users')
                    ->cascadeOnDelete();
            });
        }
    }

    public function down(): void
    {
        // This migration repairs schema drift and must not remove existing course ownership data.
    }
};
