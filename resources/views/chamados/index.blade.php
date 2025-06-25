<!DOCTYPE html>
<html>
<head>
    <title>Chamados</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <h1>Lista de Chamados</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('chamados.create') }}" class="btn btn-primary mb-3">Novo Chamado</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Data</th>
                <th>Cliente</th>
                <th>Preço Final</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($chamados as $chamado)
            <tr>
                <td>{{ $chamado->id_chamado }}</td>
                <td>{{ $chamado->data }}</td>
                <td>{{ $chamado->cliente->nome }}</td>
                <td>R$ {{ number_format($chamado->preco_final, 2, ',', '.') }}</td>
               <td>
    <a href="{{ route('chamados.edit', $chamado->id_chamado) }}" class="btn btn-warning btn-sm">Editar</a>

    <a href="{{ route('demandas.indexPorChamado', ['id' => $chamado->id_chamado]) }}" class="btn btn-info btn-sm">
        Ver Demandas
    </a>

    <form action="{{ route('chamados.destroy', $chamado->id_chamado) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza?')">Excluir</button>
    </form>
</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
