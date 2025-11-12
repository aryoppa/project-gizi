<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->string('path');
            $table->string('method', 10)->nullable();
            $table->string('ip')->nullable();
            $table->string('session_id')->nullable();
            $table->text('user_agent')->nullable();
            $table->timestamp('visited_at')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
