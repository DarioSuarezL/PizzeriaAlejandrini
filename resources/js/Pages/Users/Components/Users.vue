<script setup>
import User from './User.vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    users: {
        type: Array,
        required: true
    }
});

</script>

<template>
    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
        <div class="flex justify-between">
            <h1 class="mt-3 text-2xl font-medium text-gray-900">
                Usuarios del sistema
            </h1>
        </div>

        <div class="flex flex-col lg:grid lg:grid-cols-2 lg:grid-rows-5">
            <User v-for="user in users" :key="user.id" :user="user" />
        </div>

    </div>
</template>
