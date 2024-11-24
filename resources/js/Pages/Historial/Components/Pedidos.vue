<script setup>

defineProps({
    pedidos: {
        type: Array,
        required: true
    }
})

</script>

<template>
<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
        <div class="bg-gray-200 rounded-lg">
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="px-3 py-3 ">#</th>
                        <th class="px-3 py-3 ">Fecha</th>
                        <th class="px-3 py-3 ">Total</th>
                        <th class="px-3 py-3 ">Metodo de pago</th>
                        <th class="px-3 py-3 ">Estado</th>
                        <th class="px-3 py-3 ">Estado del pago</th>
                        <th class="px-3 py-3 ">Detalles</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-t border-gray-200" v-for="pedido in pedidos" :key="pedido.id">
                        <td class=" px-6 py-4 text-center">{{ pedido.id }}</td>
                        <td class=" px-6 py-4 text-center">{{ pedido.fecha_literal }}</td>
                        <td class=" px-6 py-4 text-center">{{ pedido.total }}</td>
                        <td class=" px-6 py-4 text-center">{{ pedido.pago_metodo.nombre }}</td>
                        <td class=" px-6 py-4 text-center">{{ pedido.pedido_estado.nombre }}</td>
                        <td class=" px-6 py-4 text-center">{{ pedido.pago_estado.nombre }}</td>
                        <td class=" px-6 py-4 text-center">
                            <button
                                class="bg-blue-800 hover:bg-blue-700 text-white font-bold py-2 px-4  rounded-full"
                            >
                                Ver
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>



</div>
</template>
