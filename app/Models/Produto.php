<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produto extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id'];

    /**
     * Get the detail record associated with the product.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function produtoDetalhe()
    {
        return $this->hasOne(ProdutoDetalhe::class, 'produto_id', 'id');
    }
}
