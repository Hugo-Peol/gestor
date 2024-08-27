<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemDetalhe extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'produto_detalhes';

    // Atributos que são atribuíveis em massa
    protected $fillable = [
        'produto_id',
        'comprimento',
        'largura',
        'altura',
        'unidade_id'
    ];

    /**
     * Get the item that owns the item detail.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function item()
    {
        return $this->belongsTo(Item::class, 'produto_id', 'id');
    }
}
