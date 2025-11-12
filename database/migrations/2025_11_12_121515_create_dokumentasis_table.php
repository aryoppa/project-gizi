<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dokumentasis', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(); // optional title/caption
            $table->string('image');             // path to file
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dokumentasis');
    }
};
