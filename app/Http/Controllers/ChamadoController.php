<?php

namespace App\Http\Controllers;

use App\Models\Chamado;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ChamadoController extends Controller
{
    public function index()
{
    $chamados = Chamado::with(['cliente', 'demandas'])->get();
    return view('chamados.index', compact('chamados'));
}

    public function create()
    {
        $clientes = Cliente::all();
        return view('chamados.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'data' => 'required|date',
            'id_cliente' => 'required|exists:clientes,id_cliente'
        ]);

        Chamado::create([
            'data' => $request->data,
            'preco_final' => 0.00,
            'id_cliente' => $request->id_cliente
        ]);

        return redirect()->route('chamados.index')->with('success', 'Chamado criado com sucesso!');
    }

    public function edit($id)
    {
        $chamado = Chamado::with('demandas')->findOrFail($id);
        $clientes = Cliente::all();
        return view('chamados.edit', compact('chamado', 'clientes'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'data' => 'required|date',
        'id_cliente' => 'required|exists:clientes,id_cliente',
        'preco_final' => 'required|numeric'
    ]);

    $chamado = Chamado::findOrFail($id);

    $chamado->update([
        'data' => $request->input('data'),
        'id_cliente' => $request->input('id_cliente'),
        'preco_final' => $request->input('preco_final')
    ]);

    return redirect()->route('chamados.index')->with('success', 'Chamado atualizado com sucesso!');
}

    public function destroy($id)
    {
        $chamado = Chamado::findOrFail($id);
        $chamado->delete();

        return redirect()->route('chamados.index')->with('success', 'Chamado excluído com sucesso!');
    }
}
