<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import Pedidos from './Components/Pedidos.vue';

defineProps({

    pedidos: {
        type: Array,
        required: true
    }


});

</script>


<template>

    <Head title="Historial" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Tu historial de compras
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <Pedidos :pedidos="pedidos" />
                    </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>
