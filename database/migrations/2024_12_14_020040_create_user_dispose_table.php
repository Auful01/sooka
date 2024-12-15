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
        Schema::create('user_dispose', function (Blueprint $table) {
            $table->id();
            $table->date('date')->default(date('Y-m-d'));
            $table->string('user_id');
            $table->string('category_id');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->integer('point')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_dispose');
    }
};
