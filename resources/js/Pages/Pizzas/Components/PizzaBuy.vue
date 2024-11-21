<script setup>
import CustomButton from '@/Components/CustomButton.vue';
import { useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';


const props = defineProps({
    pizza: {
        type: Object,
        required: true
    },
    tamano: {
        type: Object,
        required: true
    },
    categoria: {
        type: Object,
        required: true
    }
});

const form = useForm({
    cantidad: 1,
    pizza_id: props.pizza.id,
});

const submit = () => {
    form.post(route('carrito.store'), {
        onFinish: () => form.reset('cantidad'),
    });
};

</script>
<template>
    <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
        <!-- {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}} -->

        <div class="bg-white m-2 rounded-lg flex border">
            <img :src="pizza.imagen_url" class="rounded-l-lg" width="500" :alt="pizza.nombre">
            <div class=" flex flex-col justify-center">
                <p class=" pt-3 px-3 text-xl font-bold uppercase">{{ pizza.nombre }} - {{ tamano.nombre }}</p>
                <p class=" px-3"><span class="font-bold">Precio:</span> {{ pizza.precio }} Bs.</p>
                <p class=" px-3 lowercase">
                    <span class="font-bold capitalize">Descripción: </span>
                    {{ pizza.descripcion }}
                </p>
                <p class=" px-3 lowercase">
                    <span class="font-bold capitalize">Categoria: </span>
                    {{ categoria.nombre }}
                </p>

                <form @submit.prevent="submit" class="px-3 mt-5">
                    <InputLabel for="cantidad" value="Cantidad" />

                    <TextInput id="cantidad" type="number" class="my-1 block w-full" v-model.number="form.cantidad" required autofocus/>

                    <InputError class="m-2" :message="form.errors.cantidad" />
                    <CustomButton>
                        Agregar al carrito
                    </CustomButton>
                </form>

                <!-- {{-- formulario para cantidad de compra --}}
            <form wire:submit.prevent='carrito' class="px-3 mt-5">
                <x-label for="cantidad" value="{{ __('Cantidad') }}"/>
                <x-input type="number" wire:model="cantidad" id="cantidad" min="1" value="{{old('cantidad')}}"/>
                <x-button>
                    Agregar al carrito
                </x-button>
            </form> -->

            </div>
        </div>

    </div>
</template>
