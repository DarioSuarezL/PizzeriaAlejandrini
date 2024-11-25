<script setup>

defineProps({
    detalles: {
        type: Array,
        required: true
    },
    total: {
        type: Number,
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
                        <th class="px-3 py-3 ">Pizza</th>
                        <th class="px-3 py-3 ">Cantidad</th>
                        <th class="px-3 py-3 ">Precio Unitario</th>
                        <th class="px-3 py-3 ">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-t border-gray-200" v-for="detalle in detalles" :key="detalle.id">
                        <td class=" px-6 py-4 text-center">{{ detalle.pizza.nombre }}</td>
                        <td class=" px-6 py-4 text-center">{{ detalle.cantidad }}</td>
                        <td class=" px-6 py-4 text-center">{{ detalle.pizza.precio }} Bs.</td>
                        <td class=" px-6 py-4 text-center">{{ detalle.subtotal }} Bs.</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-2 flex justify-end">
            <div class="bg-gray-200 p-3 rounded-lg">
                <p>
                    <span class="font-bold ">Total: </span>
                    <span class="">{{ total }} Bs.</span>
                </p>
            </div>
        </div>
    </div>
</template>
