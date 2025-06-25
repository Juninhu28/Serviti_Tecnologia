<!DOCTYPE html>
<html>
<head>
    <title>Novo Chamado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <h1>Novo Chamado</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $erro)<li>{{ $erro }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('chamados.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Data:</label>
            <input type="date" name="data" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Cliente:</label>
            <select name="id_cliente" class="form-control" required>
                <option value="">Selecione um cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id_cliente }}">{{ $cliente->nome }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('chamados.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</body>
</html>
