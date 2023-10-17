<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assistant;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\MessageBag;

class AssistantController extends Controller
{
    public function index()
    {
        $assistants = Assistant::where('estado', 'Activo')->paginate(6);

        return view('assistants.index', ['assistants' => $assistants]);
    }

    public function create()
    {
        return view('assistants.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'matricula' => ['required', 'numeric', 'unique:assistants'],
            'nombre' => ['required', 'string'],
            'apellido_paterno' => ['required', 'string'],
            'apellido_materno' => ['required', 'string'],
            'carrera' => ['required', 'string'],
            'grado' => ['required', 'numeric'],
            'grupo' => ['required', 'string'],
        ]);

        Assistant::create($request->all());

        return redirect()->route('assistants.index')->with('success', 'Estudiante Registrado Correctamente.');
    }

    public function show()
    {
        return view('assistants.show');
    }

    public function edit(Assistant $assistant)
    {
        return view('assistants.edit', compact('assistant'));
    }

    public function update(Request $request, Assistant $assistant)
    {
        $request->validate([
            'nombre' => ['required', 'string'],
            'apellido_paterno' => ['required', 'string'],
            'apellido_materno' => ['required', 'string'],
            'carrera' => ['required', 'string'],
            'grado' => ['required', 'numeric'],
            'grupo' => ['required', 'string'],
            'estado' => ['required', 'string'],
        ]);

        $assistant->update($request->all());

        return redirect()->route('assistants.index')->with('success', 'Usuario Actualizado Correctamente.');
    }

    public function viewInactive()
    {
        $usersInactive = Assistant::where('estado', 'Inactivo')->paginate(6);

        return view('assistants.inactive', ['usersInactive' => $usersInactive]);
    }

    public function searchUser(Request $request)
    {
        $errors = new MessageBag();

        $matricula = $request->matricula;

        $assistant = Assistant::where('matricula', $matricula)->first();

        if ($assistant) {
            return view('assistants.show', compact('assistant'));
        } else {
            $errors->add('Error', 'No se encontró ningún usuario con esa matrícula.');

            return redirect()->back()->withErrors($errors);
        }
    }

    public function viewExternal()
    {
        $number = Assistant::max('id');

        $lastNumber = $number + 1;

        $clue = 'EXTERNO-' . $lastNumber;

        return view('assistants.external', ['clue' => $clue]);
    }

    public function viewPersonal()
    {
        $number = Assistant::max('id');

        $lastNumber = $number + 1;

        $clue = 'PERSONAL-' . $lastNumber;

        return view('assistants.personal', ['clue' => $clue]);
    }

    public function createExternal(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string'],
            'apellido_paterno' => ['required', 'string'],
            'apellido_materno' => ['required', 'string'],
        ]);

        $number = Assistant::max('id');

        $lastNumber = $number + 1;

        $clue = 'EXTERNO-' . $lastNumber;

        $assistant = new Assistant();
        $assistant->matricula = $clue;
        $assistant->nombre = $request->nombre;
        $assistant->apellido_paterno = $request->apellido_paterno;
        $assistant->apellido_materno = $request->apellido_materno;
        $assistant->carrera = null;
        $assistant->grado = null;
        $assistant->grupo = null;
        $assistant->tipo_usuario = "Externo";
        $assistant->save();

        return redirect()->route('assistants.index')->with('success', 'Usuario Externo Registrado Correctamente.');
    }

    public function createPersonal(Request $request)
    {
        $request->validate([
            'nombre' => ['required', 'string'],
            'apellido_paterno' => ['required', 'string'],
            'apellido_materno' => ['required', 'string'],
        ]);

        $number = Assistant::max('id');

        $lastNumber = $number + 1;

        $clue = 'PERSONAL-' . $lastNumber;

        $assistant = new Assistant();
        $assistant->matricula = $clue;
        $assistant->nombre = $request->nombre;
        $assistant->apellido_paterno = $request->apellido_paterno;
        $assistant->apellido_materno = $request->apellido_materno;
        $assistant->carrera = $request->carrera;
        $assistant->grado = null;
        $assistant->grupo = null;
        $assistant->tipo_usuario = "Personal";
        $assistant->save();
        
        return redirect()->route('assistants.index')->with('success', 'Personal Registrado Correctamente.');
    }
}