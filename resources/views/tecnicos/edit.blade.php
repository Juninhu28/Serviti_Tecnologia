<!DOCTYPE html>
<html>
<head>
    <title>Editar Técnico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <h1>Editar Técnico</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $erro)<li>{{ $erro }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('tecnicos.update', $tecnico->id_tecnico) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Nome:</label>
            <input type="text" name="nome" class="form-control" value="{{ $tecnico->nome }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('tecnicos.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</body>
</html>
