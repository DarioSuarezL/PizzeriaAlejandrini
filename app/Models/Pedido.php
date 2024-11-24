<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    //
    protected $fillable = ['cliente_id', 'total', 'pedido_estado_id', 'pago_estado_id', 'pago_metodo_id'];

    public function detalles(){
        return $this->hasMany(DetallePedido::class);
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }

    public function pagoMetodo(){
        return $this->belongsTo(PagoMetodo::class);
    }

    public function pagoEstado(){
        return $this->belongsTo(PagoEstado::class);
    }

    public function pedidoEstado(){
        return $this->belongsTo(PedidoEstado::class);
    }

}
