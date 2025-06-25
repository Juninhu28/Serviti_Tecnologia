<!DOCTYPE html>
<html>
<head>
    <title>Editar Chamado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
    <h1>Editar Chamado</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach($errors->all() as $erro)<li>{{ $erro }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('chamados.update', $chamado->id_chamado) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Data:</label>
            <input type="date" name="data" class="form-control" value="{{ $chamado->data }}" required>
        </div>

        <div class="mb-3">
            <label>Cliente:</label>
            <select name="id_cliente" class="form-control" required>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id_cliente }}" {{ $cliente->id_cliente == $chamado->id_cliente ? 'selected' : '' }}>
                        {{ $cliente->nome }}
                    </option>
                @endforeach
            </select>
        </div>

      @php
    $valorPreco = old('preco_final') ?? ($chamado->preco_final > 0 ? $chamado->preco_final : $chamado->soma_demandas);
    @endphp

<div class="mb-3">
    <label>Preço Final:</label>
    <input type="number" step="0.01" name="preco_final" class="form-control"
           value="{{ number_format($valorPreco, 2, '.', '') }}" required>
</div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('chamados.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</body>
</html>
