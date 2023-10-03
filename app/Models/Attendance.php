<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $table = 'assists';
    
    protected $fillable = [
        'fecha_asistencia',
        'hora_entrada',
        'hora_salida',
        'total_horas',
    ];
}
