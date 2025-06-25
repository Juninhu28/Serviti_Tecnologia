<!DOCTYPE html>
<html>
<head>
    <title>Serviços</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <h1>Lista de Serviços</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('servicos.create') }}" class="btn btn-primary mb-3">Novo Serviço</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($servicos as $servico)
            <tr>
                <td>{{ $servico->id_servico }}</td>
                <td>{{ $servico->descricao }}</td>
                <td>R$ {{ number_format($servico->preco, 2, ',', '.') }}</td>
                <td>
                    <a href="{{ route('servicos.edit', $servico->id_servico) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('servicos.destroy', $servico->id_servico) }}" method="POST" style="display:inline;">
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
