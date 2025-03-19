<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique(); // task title= unique= to avoid duplicates)
            $table->boolean('completed')->default(false);
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};


