<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import VisitasFooter from '@/Components/VisitasFooter.vue';
import PizzaSearch from './Components/PizzaSearch.vue';
import { ref, onMounted } from 'vue';
import { Head } from '@inertiajs/vue3';
import Pizzas from './Components/Pizzas.vue';

const props = defineProps({
    pizzas: {
        type: Array,
        required: true
    },
    visitas: {
        type: Object,
        required: true
    }
});

const pizzaList = ref([]);

onMounted(() => {
    pizzaList.value = props.pizzas;
});

const searchPizzas = (search) => {
    pizzaList.value = props.pizzas.filter(pizza =>
        pizza.nombre.toLowerCase().includes(search.toLowerCase()) ||
        pizza.descripcion.toLowerCase().includes(search.toLowerCase()) ||
        pizza.tamano.toLowerCase().includes(search.toLowerCase()) ||
        pizza.categoria.toLowerCase().includes(search.toLowerCase())
    );
    // pizzaList.value = props.pizzas.filter(pizza => pizza.tamano.toLowerCase().includes(search.toLowerCase()));

}

</script>


<template>

    <Head title="Pizzas" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Pizzas
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <PizzaSearch @searchPizzas="searchPizzas" />
                        <Pizzas :pizzas="pizzaList" />
                    </div>
                </div>
            </div>
        </div>

        <VisitasFooter :visitas="visitas.cant" />

    </AuthenticatedLayout>
</template>
