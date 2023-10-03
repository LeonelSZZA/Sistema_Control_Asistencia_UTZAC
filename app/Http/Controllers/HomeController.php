<?php

namespace App\Http\Controllers;

use App\Models\Assistant;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = Assistant::where('estado', 'Activo')->count();

        $asistenciasPorMes = DB::table('assists')
            ->select(DB::raw('MONTH(fecha_asistencia) as mes'), DB::raw('COUNT(*) as total'))
            ->whereYear('fecha_asistencia', now()->year)
            ->groupBy('mes')
            ->orderBy('mes')
            ->get();

        $meses = [];
        $datosAsistencias = [];

        for ($mes = 1; $mes <= 12; $mes++) {
            $meses[] = DateTime::createFromFormat('!m', $mes)->format('F');
            $dato = $asistenciasPorMes->firstWhere('mes', $mes);
            $datosAsistencias[] = $dato ? $dato->total : 0;
        }

        $dataAttendance = DB::table('assists')
            ->join('assistants', 'assists.assistant_id', '=', 'assistants.id')
            ->selectRaw('COUNT(*) as total_asistencias, SUM(total_horas) as total_horas')
            ->where('assistants.estado', 'Activo')
            ->get();

        $fechaActual = Carbon::now('GMT-6');

        $cantidadUsuariosAsistieron = DB::table('assists')
            ->whereDate('fecha_asistencia', $fechaActual->toDateString())
            ->count();

        return view('home', compact('meses', 'datosAsistencias', 'cantidadUsuariosAsistieron', 'dataAttendance', 'users'));
    }
}