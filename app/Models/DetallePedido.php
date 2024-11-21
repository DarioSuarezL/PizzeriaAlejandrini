<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    //
    protected $fillable = ['pedido_id', 'pizza_id', 'cantidad', 'subtotal'];

    public function pizza(){
        return $this->belongsTo(Pizza::class);
    }

}
