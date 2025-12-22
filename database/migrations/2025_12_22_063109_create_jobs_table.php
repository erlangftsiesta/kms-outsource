<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('category_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('position');
            $table->integer('salary_min')->nullable();
            $table->integer('salary_max')->nullable();
            $table->json('requirements')->nullable();
            $table->json('descriptions')->nullable();
            $table->boolean('is_urgent')->default(false);
            $table->boolean('is_active')->default(true);
            $table->date('closed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};