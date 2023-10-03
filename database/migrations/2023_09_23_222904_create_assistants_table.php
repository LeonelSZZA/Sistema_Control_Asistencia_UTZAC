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
        Schema::create('assistants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('matricula')->unique();
            $table->string('nombre');
            $table->string('apellido_paterno');
            $table->string('apellido_materno');
            $table->string('carrera');
            $table->string('grado');
            $table->string('grupo');
            $table->string('estado')->default('Activo');
            $table->timestamps();
        });

        DB::table('assistants')->insert([
            'matricula' => '482100078',
            'nombre' => 'Edgar Leonel',
            'apellido_paterno' => 'Acevedo',
            'apellido_materno' => 'Cuevas',
            'carrera' => 'Tecnologías de la Información - Desarrollo de Software Multiplataforma',
            'grado' => '7',
            'grupo' => 'A'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assistants');
    }
};
