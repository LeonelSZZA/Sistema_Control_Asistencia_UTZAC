<!DOCTYPE html>
<html>

<head>
    <title>Reporte General</title>
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

        .fix {
         font-size: 18px;   
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
    </style>
</head>

<body>
    <div class="header">
        <div class="titulo">Historial De Asistencia</div>
        <div class="subtitulo">Período: {{ $dateStart }} | {{ $dateEnd }}</div>
    </div>
    <table class="tabla">
        <thead>
            <tr>
                <th>Usuarios Activos</th>
                <th>Asistentes</th>
                <th>Asistencias</th>
                <th>Horas Totales</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $users }}</td>
                <td>{{ $dataAttendance[0]->total_asistentes }}</td>
                <td>{{ $dataAttendance[0]->total_asistencias }}</td>
                <td>{{ $dataAttendance[0]->total_horas }}</td>
            </tr>
        </tbody>
    </table>
    <table class="tabla">
        <thead>
            <tr>
                <th>Carrera</th>
                <th>Asistencias</th>
                <th>Horas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataCareers as $careers)
                <tr>
                    <td>{{ $careers->carrera }}</td>
                    <td>{{ $careers->total_asistencias }}</td>
                    <td>{{ $careers->total_horas }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>