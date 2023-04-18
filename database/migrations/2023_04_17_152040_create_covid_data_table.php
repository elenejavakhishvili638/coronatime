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
        Schema::create('covid_data', function (Blueprint $table) {
            $table->id();
            $table->string('country');
            $table->string('code');
            $table->foreignId('country_id')->constrained();
            $table->integer('confirmed');
            $table->integer('recovered');
            $table->integer('critical');
            $table->integer('deaths');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('covid_data');
    }
};
