<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Pizza;
use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Models\DetallePedido;
use GuzzleHttp\Client;

class CarritoController extends Controller
{
    public function index(){
        $pedido = Pedido::where('cliente_id', auth()->user()->id)->where('pedido_estado_id', '1')->first();
        if($pedido){
            $detalles = DetallePedido::where('pedido_id', $pedido->id)->get()->map(function($detalle){
                return [
                    'id' => $detalle->id,
                    'pedido_id' => $detalle->pedido_id,
                    'pizza_id' => $detalle->pizza_id,
                    'cantidad' => $detalle->cantidad,
                    'subtotal' => $detalle->subtotal,
                    'pizza' => $detalle->pizza
                ];
            });
            $total = $detalles->sum('subtotal');
            return Inertia::render('Carrito/Index',[
                'pedido' => $pedido,
                'detalles' => $detalles,
                'total' => $total
            ]);
        }


        return Inertia::render('Carrito/Index',[
            'pedido' => null,
            'detalles' => null,
            'total' => 0
        ]);
    }

    public function store(Request $request){
        if(auth()->user()->cliente->hasCarrito()){
            $pedido = auth()->user()->cliente->hasCarrito();
        }else{
            $pedido = Pedido::create([
                'cliente_id' => auth()->user()->cliente->id,
                'pedido_estado_id' => 1,
                'total' => 0,
                'pago_metodo_id' => 4,
                'pago_estado_id' => 1,
            ]);
        }

        $pizza = Pizza::find($request->pizza_id);

        $detalle = DetallePedido::where('pedido_id', $pedido->id)->where('pizza_id', $pizza->id)->first();
        if($detalle){
            $detalle->cantidad = $detalle->cantidad + $request->cantidad;
            $detalle->subtotal = $detalle->cantidad * $pizza->precio;
            $detalle->save();
        }else{
            $detalle = DetallePedido::create([
                'pedido_id' => $pedido->id,
                'pizza_id' => $pizza->id,
                'cantidad' => $request->cantidad,
                'subtotal' => $request->cantidad * $pizza->precio
            ]);
        }

        $pedido->total = $pedido->total + $detalle->subtotal;
        $pedido->save();
        return redirect()->route('carrito.index');

    }

    public function destroy(DetallePedido $detalle){
        $pedido = Pedido::find($detalle->pedido_id);
        $pedido->total = $pedido->total - $detalle->subtotal;
        $pedido->save();
        $detalle->delete();
        if($pedido->total == 0){
            $pedido->delete();
        }
        return redirect()->route('carrito.index');
    }


    public function checkout(Request $request){

        $pedido = Pedido::find($request->id);

        $tcCommerceID = env('PAGOFACIL_COMMERCEID');
        $AccessToken = env('PAGOFACIL_ACCESSTOKEN');
        // $tcTokenServicio = env('PAGOFACIL_TOKENSERVICE');
        // $tcTokenSecret = env('PAGOFACIL_TOKENSECRET');
        $tcUrlCallBack =  env('PAGOFACIL_URLCALLBACK');
        $tcUrlReturn = env('PAGOFACIL_URLRETURN');

        $url = "https://serviciostigomoney.pagofacil.com.bo/api/servicio/pagoqr";

        $dataHeader = [
            "Accept" => "*/*",
            "Authorization" => "Bearer ".$AccessToken,
            "Content-Type" => "application/json"
        ];

        $taPedidoDetalle = [
            "Serial" => $pedido->id,
            "Producto" => "Pedido ".$pedido->id,
            "Cantidad" => 1,
            "Precio" => $pedido->total,
            "Descuento" => 0,
            "Total" => $pedido->total,
        ];

        $dataBody = [
            "tcCommerceID"          => $tcCommerceID,
            "tcNroPago"             => "pago ".rand(1000, 9999),
            "tcNombreUsuario"       => $pedido->cliente->user->name,
            "tnCiNit"               => (int)$pedido->cliente->ci_nit,
            "tnTelefono"            => (int)$pedido->cliente->numeroTelf,
            "tcCorreo"              => $pedido->cliente->user->email,
            "tcCodigoClienteEmpresa"=> $pedido->cliente->id,
            "tnMontoClienteEmpresa" => (int)$pedido->total,
            "tnMoneda"              => 2,
            "tcUrlCallBack"         => $tcUrlCallBack,
            "tcUrlReturn"           => $tcUrlReturn,
            "taPedidoDetalle"       => $taPedidoDetalle,
            // "tcTokenSecret"         => $tcTokenSecret,
            // "tcTokenServicio"       => $tcTokenServicio,
            // "tcPedidoID"            => $this->pedido->id,
        ];

        $clienteHTTP = new Client();

        $response = $clienteHTTP->request('POST', $url, [
            'headers' => $dataHeader,
            'json' => $dataBody
        ]);

        $decodedJSON = json_decode($response->getBody()->getContents());

        $values = explode(";", $decodedJSON->values)[1];
        $QR = "data:image/png;base64,".json_decode($values)->qrImage;

        return response()->json(['qr' => $QR]);
    }

    public function pagado(){
        return Inertia::render('Carrito/Pagado');
    }

}
