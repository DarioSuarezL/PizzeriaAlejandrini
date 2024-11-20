<script setup>
import Pizza from './Pizza.vue';

defineProps({
    pizzas: {
        type: Array,
        required: true
    },
});

</script>

<template>
    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <!-- <livewire:search-pizzas/> -->

    <div class="flex justify-between">
        <h1 class="mt-3 text-2xl font-medium text-gray-900">
            Menú de pizzas
        </h1>
        <a class="m-5 p-2 bg-red-800 hover:bg-red-700 rounded-lg" href="#">
            <p class="text-white">+ Nueva pizza</p>
        </a>
    </div>

    <div class="flex flex-col lg:grid lg:grid-cols-2 lg:grid-rows-5">
        <Pizza v-for="pizza in pizzas" :key="pizza.id" :pizza="pizza" />
    </div>

    <!-- <div class="mt-6">
        {{$pizzas->links()}}
    </div> -->

    </div>
</template>
