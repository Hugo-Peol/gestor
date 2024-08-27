<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'produtos';

    protected $fillable = [
        'nome',
        'descricao',
        'peso',
        'unidade_id',
        'fornecedor_id'
    ];

    /**
     * Get the item detail associated with the item.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function itemDetalhe()
    {
        return $this->hasOne(ItemDetalhe::class, 'produto_id', 'id');
    }

    /**
     * Get the fornecedor that owns the item.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function fornecedor()
    {
        return $this->belongsTo(Fornecedor::class);
    }

    /**
     * The pedidos that belong to the item.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function pedidos()
    {
        return $this->belongsToMany(
            Pedido::class,
            'pedidos_produtos',
            'produto_id',
            'pedido_id'
        );
    }
}
