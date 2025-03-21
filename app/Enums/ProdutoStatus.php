<?php 

// Define o namespace da enum
namespace App\Enums;

// Declara uma enum chamada ProdutoStatus, que representa o status de um produto.
enum ProdutoStatus: string
{
    // Define um caso (valor possível) da enum representando um produto ativo.
    case Ativo = 'ativo';

    // Define um caso (valor possível) da enum representando um produto inativo.
    case Inativo = 'inativo';

    // Método público que retorna um rótulo (label) legível para o status do produto.
    public function getLabel(): null|string
    {
        // Utiliza o operador 'match' para retornar o rótulo correspondente ao status.
        return match ($this) {
            self::Ativo => 'Ativo',   // Se o status for 'Ativo', retorna 'Ativo'.
            self::Inativo => 'Inativo', // Se o status for 'Inativo', retorna 'Inativo'.
        };
    }

    // Método público que retorna uma cor associada ao status do produto.
    public function getColor(): string|array|null
    {
        // Utiliza o operador 'match' para definir a cor correspondente ao status.
        return match ($this) {
            self::Ativo => 'green',   // Se o status for 'Ativo', retorna a cor 'green' (verde).
            self::Inativo => 'red',   // Se o status for 'Inativo', retorna a cor 'red' (vermelho).
        };
    }
}
