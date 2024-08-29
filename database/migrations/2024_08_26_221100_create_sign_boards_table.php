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
        Schema::create('sign_boards', function (Blueprint $table) {
            $table->id();
            $table->string('title');       // Title field
            $table->string('size');        // Size field
            $table->string('type');        // Type field
            $table->boolean('status');     // Status field
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sign_boards');
    }
};
