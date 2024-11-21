<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable =[
        'user_id',
        'ci_nit',
        'numero_telf',
        'direccion'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function pedidos(){
        return $this->hasMany(Pedido::class);
    }

    public function hasCarrito(){
        return $this->pedidos()->where('pedido_estado_id', 1)->first() ?? false;
    }
}
