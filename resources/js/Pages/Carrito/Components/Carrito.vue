<script setup>
import { useForm } from '@inertiajs/vue3';
import axios from 'axios';
import { ref } from 'vue';


const props = defineProps({
    pedido: {
        type: Object,
        required: true
    },
    detalles: {
        type: Array,
        required: true
    },
    total: {
        type: Number,
        required: true
    }
})

const qr = ref([])


const checkout = () => {

    try {
        const url = `/carrito/${props.pedido.id}/checkout`;
        axios.get(url)
        .then(response => {
            qr.value = response.data.qr;
            console.log(response.data.qr);
        });
    } catch (error) {
        console.log(error);
    }




}

const del = (detalle) => {
    const form = useForm({
        detalle: detalle
    })

    form.delete(route('carrito.destroy', detalle));

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
                <tbody>
                    <tr class="border-t border-gray-200" v-for="detalle in detalles" :key="detalle.id">
                        <td class=" px-6 py-4 text-center">{{ detalle.pizza.nombre }}</td>
                        <td class=" px-6 py-4 text-center">{{ detalle.cantidad }}</td>
                        <td class=" px-6 py-4 text-center">{{ detalle.pizza.precio }} Bs.</td>
                        <td class=" px-6 py-4 text-center">{{ detalle.subtotal }} Bs.</td>
                        <td class=" px-6 py-4 text-center">
                            <button
                                @click="del(detalle)"
                                class="bg-red-800 hover:bg-red-700 text-white font-bold py-2 px-4  rounded-full"
                            >
                                X
                            </button>
                        </td>
                    </tr>
                </tbody>
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

        <div class="flex justify-center" v-if="qr.length > 0">
            <img :src="qr" alt="qr">
        </div>

    </div>
</template>
