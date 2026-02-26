<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique(); // Ini kolom yang dicari error tadi!
            $table->string('route');
            $table->string('province');
            $table->string('altitude');
            $table->string('duration');
            $table->string('difficulty');
            $table->integer('slot');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('status');
            $table->integer('price');
            $table->string('image_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
