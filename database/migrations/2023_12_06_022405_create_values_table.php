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
        Schema::create('values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alternative_id');
            $table->foreign('alternative_id')->references('id')->on('alternatives')->onDelete('cascade');
            $table->unsignedBigInteger('criteria_id');
            $table->foreign('criteria_id')->references('id')->on('criterias')->onDelete('cascade');
            $table->double('value');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('values');
    }
};
