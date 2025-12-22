<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('job_locations', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('job_id')->constrained()->onDelete('cascade');
            $table->string('city');
            $table->string('province')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('job_locations');
    }
};