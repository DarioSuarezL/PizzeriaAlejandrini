<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import VisitasFooter from '@/Components/VisitasFooter.vue';
import { Head } from '@inertiajs/vue3';
import { Bar } from 'vue-chartjs';
import {
    Chart as ChartJS,
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale,
} from 'chart.js';

ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale);

const props = defineProps({
    visitas: {
        type: Object,
        required: true
    },
    'cantUser': {
        type: Number,
    },
    'cantAdmin': {
        type: Number,
    },
    'cantCajero': {
        type: Number,
    },
    'cantCliente': {
        type: Number,
    },
    'pizzaMasVendida': {
        type: Object,
    },
    'pizzaMenosVendida': {
        type: Object,
    },
    'totalVentas': {
        type: String,
    },
    'chartData': {
        type: Object,
    },

});

const pedidosChartData = {
    labels: Object.keys(props.chartData.pedidos).map((day) => `Dia ${day}`),
    datasets: [
        {
            label: 'Pedidos',
            data: Object.values(props.chartData.pedidos),
            backgroundColor: 'rgba(153, 102, 255, 0.2)',
            borderColor: 'rgba(153, 102, 255, 1)',
            borderWidth: 1,
        },
    ],
};

const usersChartData = {
    labels: Object.keys(props.chartData.users).map((day) => `Dia ${day}`),
    datasets: [
        {
            label: 'Usuarios',
            data: Object.values(props.chartData.users),
            backgroundColor: 'rgba(153, 102, 255, 0.2)',
            borderColor: 'rgba(153, 102, 255, 1)',
            borderWidth: 1,
        },
    ],
};


</script>

<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">

                    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                        <h3 class="font-semibold text-lg">Estadisticas</h3>
                        <div class="flex gap-2">
                            <div class="bg-green-200 mt-5 p-3 rounded-lg flex flex-col justify-center">
                                <p class="font-bold">Pizza mas vendida: <span class="font-normal">{{
                                    pizzaMasVendida.pizza.nombre ?? 'N/A' }}</span></p>
                                <p>Vendida: <span>{{ pizzaMasVendida.total_pedidos ?? 0 }}</span> veces</p>
                            </div>
                            <div class="bg-red-200 mt-5 p-3 rounded-lg flex flex-col justify-center">
                                <p class="font-bold">Pizza menos vendida: <span class="font-normal">{{
                                    pizzaMenosVendida.pizza.nombre ?? 'N/A' }}</span></p>
                                <p>Vendida: <span>{{ pizzaMenosVendida.total_pedidos ?? 0 }}</span> veces</p>
                            </div>
                            <div class="bg-yellow-200 mt-5 p-3 rounded-lg flex flex-col justify-center">
                                <p class="font-bold">Total de ganancia: <span class="font-normal"> {{ totalVentas ??
                                    '0'
                                        }} Bs.</span></p>
                            </div>
                            <div class="bg-blue-200 mt-5 p-3 rounded-lg">
                                <p class="font-bold">Cantidad de usuarios: <span class="font-normal">{{ cantUser
                                        }}</span></p>
                                <p>Cantidad de clientes: <span>{{ cantCliente }}</span></p>
                                <p>Cantidad de administradores: <span>{{ cantAdmin }}</span></p>
                                <p>Cantidad de cajeros: <span>{{ cantCajero }}</span></p>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="mt-5 p-3 rounded-lg">
                                <h3 class="font-semibold text-lg">
                                    Usuarios nuevos por dia
                                </h3>
                                <Bar :data="usersChartData" :options="{ responsive: true }" />
                                <!-- <p>{{ chartData.users }}</p> -->
                            </div>
                            <div class="mt-5 p-3 rounded-lg">
                                <h3 class="font-semibold text-lg">
                                    Pedidos por dia
                                </h3>
                                <Bar :data="pedidosChartData" :options="{ responsive: true }" />
                                <!-- <p>{{ chartData.pedidos }}</p> -->

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <VisitasFooter :visitas="visitas.cant" />

    </AuthenticatedLayout>
</template>
