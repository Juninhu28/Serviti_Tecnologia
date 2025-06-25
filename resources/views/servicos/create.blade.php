<!DOCTYPE html>
<html>
<head>
    <title>Novo Serviço</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <h1>Novo Serviço</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $erro)<li>{{ $erro }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('servicos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Descrição:</label>
            <input type="text" name="descricao" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Preço (R$):</label>
            <input type="number" step="0.01" name="preco" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('servicos.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</body>
</html>
