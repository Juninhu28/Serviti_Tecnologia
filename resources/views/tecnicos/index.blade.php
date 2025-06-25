<!DOCTYPE html>
<html>
<head>
    <title>Técnicos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <h1>Lista de Técnicos</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('tecnicos.create') }}" class="btn btn-primary mb-3">Novo Técnico</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tecnicos as $tecnico)
            <tr>
                <td>{{ $tecnico->id_tecnico }}</td>
                <td>{{ $tecnico->nome }}</td>
                <td>
                    <a href="{{ route('tecnicos.edit', $tecnico->id_tecnico) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('tecnicos.destroy', $tecnico->id_tecnico) }}" method="POST" style="display:inline;">
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
