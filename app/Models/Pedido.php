<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    //
    protected $fillable = ['cliente_id', 'total', 'pedido_estado_id', 'pago_estado_id', 'pago_metodo_id'];

    public function pedido(){
        return $this->belongsTo(Pedido::class);
    }

    public function pizza(){
        return $this->belongsTo(Pizza::class);
    }
}
