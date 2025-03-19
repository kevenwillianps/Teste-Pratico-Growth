<?php

namespace App\Enums;

enum ProdutoStatus: string
{
    case Ativo = 'ativo';
    case Inativo = 'inativo';

    public function getLabel(): null|string
    {
        return match ($this) {
            self::Ativo => 'Ativo',
            self::Inativo => 'Inativo',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::Ativo => 'green',
            self::Inativo => 'red',
        };
    }

}
