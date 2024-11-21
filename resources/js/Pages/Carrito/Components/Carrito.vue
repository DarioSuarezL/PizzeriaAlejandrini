<script setup>

const props = defineProps({
    pedido: {
        type: Object,
    },
    detalles: {
        type: Array,
    },
    total: {
        type: Number,
    }
})

const checkout = () => {
    console.log('checkout');
}

</script>

<template>
    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
        <div class="bg-gray-200 rounded-lg">
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="px-3 py-3 ">Pizza</th>
                        <th class="px-3 py-3 ">Cantidad</th>
                        <th class="px-3 py-3 ">Precio Unitario</th>
                        <th class="px-3 py-3 ">Subtotal</th>
                        <th class="px-3 py-3 ">Opciones</th>
                    </tr>
                </thead>
                <!-- @foreach ($detalles as $detalle) -->
                <tbody>
                    <tr class="border-t border-gray-200" v-for="detalle in detalles" :key="detalle.id">
                        <td class=" px-6 py-4 text-center">{{ detalle.pizza.nombre }}</td>
                        <td class=" px-6 py-4 text-center">{{ detalle.cantidad }}</td>
                        <td class=" px-6 py-4 text-center">{{ detalle.pizza.precio }} Bs.</td>
                        <td class=" px-6 py-4 text-center">{{ detalle.subtotal }} Bs.</td>
                        <td class=" px-6 py-4 text-center">
                            <!-- <button wire:click="delete({{$detalle->id}})" class="bg-red-800 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-lg ">
                            Eliminar
                        </button> -->
                        </td>
                    </tr>
                </tbody>
                <!-- @endforeach -->
            </table>
        </div>

        <div class="mt-8 flex justify-end">

            <div class="bg-gray-200 p-3 rounded-lg">
                <p>
                    <span class="font-bold ">Total: </span>
                    <span class="">{{ total }} Bs.</span>
                </p>
                <div class="p-3" v-if="detalles != []">
                    <button @click="checkout()" class="bg-green-800 p-2 text-white rounded-lg hover:bg-green-600">
                        Realizar pedido
                    </button>
                </div>
            </div>
        </div>


        <!-- <div class="mt-8 flex justify-between">
        <div class="bg-gray-200 p-3 rounded-lg">
            <p>
                <span class="font-bold ">Total: </span>
                <span class="">{{$total}} Bs.</span>
            </p>
        </div>

        @if($detalles != [])
        <div class="p-3">
            <button wire:click="checkout()" class="bg-green-800 p-2 text-white rounded-lg hover:bg-green-600">
                Realizar pedido
            </button>
        </div>
        @endif
    </div>
    @if ($QR)
    <div class="flex justify-center">
        <img src="{{$QR}}" alt="">
    </div>
    @endif -->
    </div>
</template>
