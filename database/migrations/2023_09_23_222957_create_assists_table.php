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
        Schema::create('assists', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('assistant_id');
            $table->foreign('assistant_id')->references('id')->on('assistants')->onDelete('cascade');
            $table->date('fecha_asistencia')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->time('hora_entrada');
            $table->time('hora_salida')->nullable();
            $table->integer('total_horas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assists');
    }
};
