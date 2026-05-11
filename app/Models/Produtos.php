<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    protected $table = 'produtos';
    protected $fillable = [
        'nome', 
        'descricao', 
        'preco'
    ];

    public function produtos()
    {
        return $this->hasMany(Produtos::class);
    }
}