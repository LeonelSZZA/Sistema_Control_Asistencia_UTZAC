<!DOCTYPE html>
<html>

<head>
    <title>Reporte De Asistencia</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .titulo {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .subtitulo {
            font-size: 18px;
            margin-bottom: 20px;
        }

        .info {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .tabla {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .tabla th,
        .tabla td {
            border: 2 solid gray;
            padding: 8px;
            text-align: center;
        }

        .total {
            font-weight: bold;
            margin-top: 10px;
        }

        thead {
            background: #000;
            color: #fff;
            height: 70px;
        }
    </style>
</head>

<body>
    <div class="header">
        <div class="titulo">Historial De Asistencia</div>
        <div class="subtitulo">Período: {{ $dateStart }} | {{ $dateEnd }}</div>
    </div>
    <div class="info">
        @if ($user->tipo_usuario === 'Externo' || $user->tipo_usuario === 'Personal')
            <p><b>Clave: </b>{{ $user->matricula }}</p>
        @else
            <p><b>Matrícula: </b>{{ $user->matricula }}</p>
        @endif
        <p><b>Nombre: </b>{{ $user->nombre }} {{ $user->apellido_paterno }} {{ $user->apellido_materno }}</p>
        @if ($user->tipo_usuario === 'Externo')
        @else
            <p><b>Carrera </b>{{ $user->carrera }}</p>
        @endif
        @if ($user->tipo_usuario === 'Externo' || $user->tipo_usuario === 'Personal')
        @else
            <p><b>Grado: </b>{{ $user->grado }}</p>
            <p><b>Grupo: </b>{{ $user->grupo }}</p>
        @endif
        <p><b>Estado: </b>{{ $user->estado }}</p>
        <p><b>Usuario: </b>{{ $user->tipo_usuario }}</p>
    </div>
    <table class="tabla">
        <thead>
            <tr>
                <th>Asistencias</th>
                <th>Horas</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $dataAttendance[0]->total_asistencias }}</td>
                <td>{{ $dataAttendance[0]->total_horas }}</td>
            </tr>
        </tbody>
    </table>
    <table class="tabla">
        <thead>
            <tr>
                <th>Fecha De Asistencia</th>
                <th>Hora De Entrada</th>
                <th>Hora de Salida</th>
                <th>Total De Horas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($assists as $attendance)
                <tr>
                    <td>{{ $attendance->fecha_asistencia }}</td>
                    <td>{{ $attendance->hora_entrada }}</td>
                    <td>{{ $attendance->hora_salida }}</td>
                    <td>{{ $attendance->total_horas }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
