<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Carrito from './Components/Carrito.vue';

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


</script>
<template>
    <Head title="Carrito" />

    <AuthenticatedLayout>

        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Carrito de compras
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <Carrito :detalles="detalles" :total="total"/>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
