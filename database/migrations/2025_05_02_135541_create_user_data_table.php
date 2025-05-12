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
        Schema::create('user_data', function (Blueprint $table) {
            $table->foreignIdFor(\App\Models\User::class)->unique()->constrained()->cascadeOnDelete();
            $table->string('filename')->nullable();
            $table->string('cover')->nullable();
            $table->string('career')->nullable();
            $table->string('phone')->nullable()->unique();
            $table->string('address')->nullable();
            $table->text('summary')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_data');
    }
};
