<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Demanda;
use App\Models\Chamado;
use App\Models\Servico;
use App\Models\Tecnico;

class DemandaController extends Controller
{
    public function indexPorChamado($id)
    {
        $chamado = Chamado::with('cliente')->findOrFail($id);

        $demandas = Demanda::with(['servico', 'tecnico'])
            ->where('id_chamado', $id)
            ->get();

        return view('demandas.index', compact('chamado', 'demandas'));
    }

    public function index()
    {
        $demandas = Demanda::with(['chamado', 'servico', 'tecnico'])->get();
        return view('demandas.index', compact('chamados' ,'demandas'));
    }

    public function create($id)
    {
        $chamado = Chamado::findOrFail($id);
        $servicos = Servico::all();
        $tecnicos = Tecnico::all();

        return view('demandas.create', compact('chamado', 'servicos', 'tecnicos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_chamado' => 'required|exists:chamados,id_chamado',
            'id_servico' => 'required|exists:servicos,id_servico',
            'id_tecnico' => 'required|exists:tecnicos,id_tecnico',
            'preco' => 'required|numeric',
            'presencial' => 'required|boolean'
        ]);

        Demanda::create($request->all());

        return redirect()->route('demandas.indexPorChamado', ['id' => $request->id_chamado])
            ->with('success', 'Demanda criada com sucesso!');
    }

    public function destroy($id)
    {
        [$idChamado, $idServico, $idTecnico] = explode('-', $id);

        Demanda::where('id_chamado', $idChamado)
            ->where('id_servico', $idServico)
            ->where('id_tecnico', $idTecnico)
            ->delete();

        return redirect()
    ->route('demandas.indexPorChamado', ['id' => $idChamado])
    ->with('success', 'Demanda excluída com sucesso!');
    }
}
