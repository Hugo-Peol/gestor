<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{

    use HasFactory, SoftDeletes;

    /**
     * The produtos that belong to the pedido.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function produtos()
    {
        return $this->belongsToMany(Item::class, 'pedidos_produtos', 'pedido_id', 'produto_id')
                    ->withPivot('id', 'created_at', 'updated_at');
    }
}
