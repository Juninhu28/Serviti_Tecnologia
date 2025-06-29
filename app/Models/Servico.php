<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $table = 'servicos';

    protected $primaryKey = 'id_servico';

    protected $fillable = ['descricao', 'preco'];
}
