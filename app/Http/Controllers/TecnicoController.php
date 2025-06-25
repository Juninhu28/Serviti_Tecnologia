<?php

namespace App\Http\Controllers;

use App\Models\Tecnico;
use Illuminate\Http\Request;

class TecnicoController extends Controller
{
    public function index()
    {
        $tecnicos = Tecnico::all();
        return view('tecnicos.index', compact('tecnicos'));
    }

    public function create()
    {
        return view('tecnicos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:50'
        ]);

        Tecnico::create($request->all());
        return redirect()->route('tecnicos.index')->with('success', 'Técnico criado com sucesso!');
    }

    public function edit($id)
    {
        $tecnico = Tecnico::findOrFail($id);
        return view('tecnicos.edit', compact('tecnico'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|max:50'
        ]);

        $tecnico = Tecnico::findOrFail($id);
        $tecnico->update($request->all());

        return redirect()->route('tecnicos.index')->with('success', 'Técnico atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $tecnico = Tecnico::findOrFail($id);
        $tecnico->delete();

        return redirect()->route('tecnicos.index')->with('success', 'Técnico excluído com sucesso!');
    }
}
