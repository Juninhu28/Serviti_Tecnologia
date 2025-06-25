<!DOCTYPE html>
<html>
<head>
    <title>Demandas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <h1>Lista de Demandas</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('demandas.create', ['id' => $chamado->id_chamado]) }}" class="btn btn-success mb-3">
    Cadastrar novo serviço para este chamado
</a>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Chamado</th>
                <th>Serviço</th>
                <th>Técnico</th>
                <th>Presencial</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($demandas as $d)
            <tr>
                <td>{{ $d->chamado->id_chamado }}</td>
                <td>{{ $d->servico->descricao }}</td>
                <td>{{ $d->tecnico->nome }}</td>
                <td>{{ $d->presencial ? 'Sim' : 'Não' }}</td>
                <td>R$ {{ number_format($d->preco, 2, ',', '.') }}</td>
                <td>
                    <form action="{{ route('demandas.destroy', $d->id_chamado . '-' . $d->id_servico . '-' . $d->id_tecnico) }}" method="POST" onsubmit="return confirm('Tem certeza?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
