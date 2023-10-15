<?php

namespace App\Http\Controllers;

use App\Models\Assistant;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;

class PDFController extends Controller
{
    public function reportIndividual(Request $request)
    {
        $errors = new MessageBag();

        $matricula = $request->input('matricula');

        $dateStartComplete = $request->input('fecha_inicial');
        $dateEndComplete = $request->input('fecha_final');

        $dateStartParsed = Carbon::parse($dateStartComplete, 'GMT-6');
        $dateEndParsed = Carbon::parse($dateEndComplete, 'GMT-6');

        if ($dateEndParsed->isBefore($dateStartParsed)) {
            $errors->add('Error', 'La fecha final debe ser posterior o igual a la fecha inicial.');
            return redirect()->back()->withErrors($errors);
        }

        $dateStart = $dateStartParsed->toDateString();
        $dateEnd = $dateEndParsed->toDateString();

        $user = Assistant::where('matricula', $matricula)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'No se encontró ningún usuario con esa matrícula.');
        }

        $dataAttendance = DB::table('assists')
            ->selectRaw('COUNT(*) as total_asistencias, SUM(total_horas) as total_horas')
            ->where('assistant_id', $user->id)
            ->whereBetween('fecha_asistencia', [$dateStart, $dateEnd])
            ->get();

        $assists = DB::table('assists')
            ->select('fecha_asistencia', 'hora_entrada', 'hora_salida', 'total_horas')
            ->where('assistant_id', $user->id)
            ->whereBetween('fecha_asistencia', [$dateStart, $dateEnd])
            ->get();

        $pdf = Pdf::loadView('PDF.individual', compact('user', 'assists', 'dataAttendance', 'dateStart', 'dateEnd'));

        $namePDF = 'Reporte De ' . $user->matricula . '.pdf';

        return $pdf->download($namePDF);
    }

    public function reportGeneral(Request $request)
    {
        $errors = new MessageBag();

        $dateStartComplete = $request->input('fecha_inicial');
        $dateEndComplete = $request->input('fecha_final');

        $dateStartParsed = Carbon::parse($dateStartComplete, 'GMT-6');
        $dateEndParsed = Carbon::parse($dateEndComplete, 'GMT-6');

        if ($dateEndParsed->isBefore($dateStartParsed)) {
            $errors->add('Error', 'La fecha final debe ser posterior o igual a la fecha inicial.');
            return redirect()->back()->withErrors($errors);
        }

        $dateStart = $dateStartParsed->toDateString();
        $dateEnd = $dateEndParsed->toDateString();

        $users = Assistant::where('estado', 'Activo')->count();

        $dataAttendance = DB::table('assists')
            ->join('assistants', 'assists.assistant_id', '=', 'assistants.id')
            ->selectRaw('COUNT(*) as total_asistencias, SUM(total_horas) as total_horas, COUNT(DISTINCT assistant_id) as total_asistentes')
            ->whereBetween('fecha_asistencia', [$dateStart, $dateEnd])
            ->where('assistants.estado', 'Activo')
            ->get();

        $dataCareers = DB::table('assists')
            ->join('assistants', 'assists.assistant_id', '=', 'assistants.id')
            ->select(
                'assistants.carrera',
                DB::raw('COUNT(*) AS total_asistencias'),
                DB::raw('SUM(assists.total_horas) AS total_horas')
            )
            ->whereBetween('fecha_asistencia', [$dateStart, $dateEnd])
            ->where('assistants.estado', 'Activo')
            ->where('assistants.tipo_usuario', 'Estudiante')
            ->groupBy('assistants.carrera')
            ->get();

        $dataOthers = DB::table('assists')
        ->join('assistants', 'assists.assistant_id', '=', 'assistants.id')
            ->select('tipo_usuario', DB::raw('COUNT(*) as total_asistencias'), DB::raw('SUM(total_horas) as total_horas'))
            ->whereBetween('fecha_asistencia', [$dateStart, $dateEnd])
            ->whereIn('tipo_usuario', ['Externo', 'Personal'])
            ->groupBy('tipo_usuario')
            ->get();

        $pdf = Pdf::loadView('PDF.general', compact('users', 'dataAttendance', 'dataCareers', 'dataOthers', 'dateStart', 'dateEnd'));

        $namePDF = 'Reporte General' . '.pdf';

        return $pdf->download($namePDF);
    }
}