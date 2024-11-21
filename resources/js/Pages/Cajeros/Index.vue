<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import VisitasFooter from '@/Components/VisitasFooter.vue';
import { Head } from '@inertiajs/vue3';

import Users from '../Users/Components/Users.vue';

defineProps({
    users: {
        type: Array,
        required: true
    },
    visitas: {
        type: Object,
        required: true
    }
});

</script>


<template>

    <Head title="Cajeros" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Cajeros
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <Users :users="users"/>
                    </div>
                </div>
            </div>
        </div>

        <VisitasFooter :visitas="visitas.cant" />

    </AuthenticatedLayout>
</template>
