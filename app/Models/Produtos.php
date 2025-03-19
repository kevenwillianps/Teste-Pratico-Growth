<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Enums\ProdutoStatus;

class Produtos extends Model
{

    Use SoftDeletes;

    protected $fillable = ['nome', 'descricao', 'preco', 'estoque'];

    protected $casts = [
        'status' => ProdutoStatus::class, // Converte automaticamente o Enum
    ];

}
