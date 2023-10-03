<?php

namespace App\Http\Controllers;

use App\Models\Assistant;
use App\Models\Attendance;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

class AttendanceController extends Controller
{
    public function viewWelcome()
    {
        return view('welcome');
    }

    public function viewInput()
    {
        return view('attendance.input');
    }

    public function input(Request $request)
    {
        $errors = new MessageBag();

        $matricula = $request->matricula;

        $assistant = Assistant::where('matricula', $matricula)
            ->where('estado', 'Activo')
            ->first();

        if (!$assistant) { // Si no encuentra un usuario mediante esa matrícula...
            $errors->add('Error', 'No se encontró ningún usuario con esa matrícula.');

            return redirect()->back()->withErrors($errors);
        }

        $fechaActual = Carbon::now('GMT-6')->format('Y-m-d');
        $existingAttendance = Attendance::where('assistant_id', $assistant->id)
            ->where('fecha_asistencia', $fechaActual)
            ->first();

        if ($existingAttendance) { // Si encuentra un registro de asistencia para el día de hoy...
            $errors->add('Error', 'Ya has registrado tu hora de entrada para el día de hoy.');

            return redirect()->back()->withErrors($errors);
        }

        $horaEntrada = Carbon::now('GMT-6')->format('H:i:s');

        $newAttendance = new Attendance();
        $newAttendance->assistant_id = $assistant->id;
        $newAttendance->hora_entrada = $horaEntrada;
        $newAttendance->save();

        $day = Carbon::now('GMT-6')->format('d');
        $month = Carbon::now('GMT-6')->format('F');
        $year = Carbon::now('GMT-6')->format('Y');

        return view('attendance.input', compact('assistant', 'horaEntrada', 'day', 'month', 'year'));
    }


    public function viewOutput()
    {
        return view('attendance.output');
    }

    public function output(Request $request)
    {
        $errors = new MessageBag();

        $matricula = $request->matricula;

        $assistant = Assistant::where('matricula', $matricula)
            ->where('estado', 'Activo')
            ->first();

        if (!$assistant) { // Si no encuentra un usuario mediante esa matrícula...
            $errors->add('Error', 'No se encontró ningún usuario con esa matrícula.');
            return redirect()->back()->withErrors($errors);
        }

        $fechaActual = now('GMT-6')->format('Y-m-d');

        $existingAttendance = Attendance::where('assistant_id', $assistant->id)
            ->where('fecha_asistencia', $fechaActual)
            ->first();

        if (!$existingAttendance) { // Si no encuentra un registro de entrada para el día actual...
            $errors->add('Error', 'No se encontró ningún registro de asistencia para el día actual.');
            return redirect()->back()->withErrors($errors);
        }

        if ($existingAttendance->hora_salida) { // Si encuentra un registro de asistencia completo...
            $errors->add('Error', 'Ya has registrado tu hora de salida para  el día de hoy.');
            return redirect()->back()->withErrors($errors);
        }

        $entryTime = Carbon::parse($existingAttendance->hora_entrada, 'GMT-6');
        $exitTime = Carbon::parse($existingAttendance->hora_salida, 'GMT-6');

        $timeDifference = $exitTime->diffInHours($entryTime);

        $existingAttendance->hora_salida = Carbon::now('GMT-6')->format('H:i:s');
        $existingAttendance->total_horas = $timeDifference;
        $existingAttendance->save();

        $day = Carbon::now('GMT-6')->format('d');
        $month = Carbon::now('GMT-6')->format('F');
        $year = Carbon::now('GMT-6')->format('Y');

        return view('attendance.output', compact('assistant', 'existingAttendance', 'day', 'month', 'year'));
    }
}