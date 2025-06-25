<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;
use App\Models\Demanda;

class Chamado extends Model
{
    protected $table = 'chamados';

    protected $primaryKey = 'id_chamado';

    protected $fillable = ['data', 'preco_final', 'id_cliente'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function demandas()
    {
        return $this->hasMany(Demanda::class, 'id_chamado');
    }

    public function getSomaDemandasAttribute()
    {
        return $this->demandas->sum('preco');
    }

    public function getPrecoFinalAttribute($value)
    {
        if ($value && $value > 0) {
            return $value;
        }

        return $this->demandas->sum('preco');
    }
}
