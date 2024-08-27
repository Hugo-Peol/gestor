<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProdutoDetalhe extends Model
{

    use HasFactory, SoftDeletes;
    protected $fillable = ['produto_id', 'comprimento', 'largura', 'altura', 'unidade_id'];

    /**
     * Get the product that owns the detail.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function produto()
    {
        return $this->belongsTo(Produto::class, 'produto_id', 'id');
    }
}
