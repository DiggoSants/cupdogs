<?php

use App\Models\Produtos;
use App\Http\Controllers\Controller;

class ProdutosController extends Controller
{
    public function run()
    {
        Produtos::create([
            'nome' => 'Produto 1',
            'descricao' => 'Descrição do Produto 1',
            'preco' => 10.99,
        ]);

        Produtos::create([
            'nome' => 'Produto 2',
            'descricao' => 'Descrição do Produto 2',
            'preco' => 19.99,
        ]);

        Produtos::create([
            'nome' => 'Produto 3',
            'descricao' => 'Descrição do Produto 3',
            'preco' => 5.49,
        ]);
    }
}