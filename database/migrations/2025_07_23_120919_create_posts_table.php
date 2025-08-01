<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // Primary key: unsignedBigInteger
            $table->string('title');
            $table->text('body');
            $table->string('image_path')->nullable();
            $table->timestamps(); // Includes created_at and updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
