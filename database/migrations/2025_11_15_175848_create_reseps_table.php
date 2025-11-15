<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reseps', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('portion')->nullable();
            $table->string('energy')->nullable();
            $table->string('protein')->nullable();
            $table->string('fat')->nullable();
            $table->string('carbs')->nullable();
            $table->text('ingridients');
            $table->text('tools');
            $table->text('how_to');
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('reseps');
    }
};
