<!DOCTYPE html>
<html>
<head>
    <title>Nova Demanda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">
<div class="container">
    <h2 class="mb-4">Nova Demanda para o Chamado #{{ $chamado->id_chamado }}</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('demandas.store') }}" method="POST">
        @csrf

        <input type="hidden" name="id_chamado" value="{{ $chamado->id_chamado }}">

        <div class="mb-3">
            <label class="form-label">Serviço</label>
            <select name="id_servico" class="form-select" id="servicoSelect" required>
                @foreach($servicos as $servico)
                    <option value="{{ $servico->id_servico }}" data-preco="{{ $servico->preco }}">
                        {{ $servico->descricao }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Técnico</label>
            <select name="id_tecnico" class="form-select" required>
                @foreach($tecnicos as $tecnico)
                    <option value="{{ $tecnico->id_tecnico }}">{{ $tecnico->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Presencial</label>
            <select name="presencial" class="form-select" required>
                <option value="1">Sim</option>
                <option value="0">Não</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Preço</label>
            <input type="number" step="0.01" name="preco" id="precoInput" class="form-control" required readonly>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">Salvar</button>
            <a href="{{ route('demandas.indexPorChamado', ['id' => $chamado->id_chamado]) }}" class="btn btn-secondary">Voltar</a>
        </div>
    </form>
</div>

<script>
    const servicoSelect = document.getElementById('servicoSelect');
    const precoInput = document.getElementById('precoInput');

    function atualizarPreco() {
        const selectedOption = servicoSelect.options[servicoSelect.selectedIndex];
        const preco = selectedOption.getAttribute('data-preco');
        precoInput.value = preco;
    }

    servicoSelect.addEventListener('change', atualizarPreco);

    atualizarPreco();
</script>

</body>
</html>
