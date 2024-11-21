<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import PizzaForm from './Components/PizzaForm.vue';

defineProps({
    tamanos: {
        type: Array,
        required: true
    },
    categorias: {
        type: Array,
        required: true
    }
})

</script>

<template>
    <Head title="Registrar Pizza" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Registrar Pizza
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <PizzaForm
                            :tamanos="tamanos"
                            :categorias="categorias"
                        />
                    </div>
                </div>
            </div>
        </div>

    </AuthenticatedLayout>
</template>


