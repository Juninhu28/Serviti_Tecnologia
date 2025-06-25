<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Demanda extends Model
{
    protected $table = 'demandas';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_chamado',
        'id_servico',
        'id_tecnico',
        'presencial',
        'preco'
    ];

    public function chamado()
    {
        return $this->belongsTo(Chamado::class, 'id_chamado');
    }

    public function servico()
    {
        return $this->belongsTo(Servico::class, 'id_servico');
    }

    public function tecnico()
    {
        return $this->belongsTo(Tecnico::class, 'id_tecnico');
    }
}

