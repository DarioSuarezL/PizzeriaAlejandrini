<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import CustomButton from '@/Components/CustomButton.vue';

const props = defineProps({
    user: {
        type: Object,
        required: true
    }
});

const form = useForm({});

const submit = () => {
    if (confirm("¿Estás seguro de que deseas eliminar este usuario  ?")) {
        form.delete(route('users.destroy', props.user));
    }
};

</script>

<template>
    <div class="bg-white m-2 rounded-lg flex border justify-between">
        <div>
            <p class=" pt-3 px-3 hover:text-xl hover:text-red-800 font-bold">{{ user.name }}</p>
            <p class=" px-3"><span class="font-bold">Correo:</span> {{ user.email }}</p>

            <div v-if="user.cliente">
                <p class="px-3"><span class="font-bold">Celular:</span> {{ user.cliente.numero_telf }}</p>
                <p class="px-3"><span class="font-bold">Direccion:</span> {{ user.cliente.direccion }}</p>
                <p class="px-3"><span class="font-bold">CI/NIT:</span> {{ user.cliente.ci_nit }}</p>

            </div>
        </div>
        <div class="flex flex-col justify-center">

            <div class="flex justify-around m-3">
                <form @submit.prevent="submit">
                    <CustomButton class="mx-2">
                        Eliminar
                    </CustomButton>
                </form>
            </div>
        </div>
    </div>
</template>
