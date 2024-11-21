<script setup>
import { Link, useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    tamanos: {
        type: Array,
        required: true
    },
    categorias: {
        type: Array,
        required: true
    },
    pizza: {
        type: Object,
        required: false
    }

})

const form = useForm({
    nombre: '',
    precio: '',
    tamano_id: '0',
    categoria_id: '0',
    descripcion: '',
    foto: null,
    foto_preview: null,
});

const buttonLabel = props.pizza ? 'Editar pizza' : 'Registrar pizza';

// Asignar valores si existe `pizza`

if (props.pizza) {
    form.nombre = props.pizza.nombre;
    form.precio = props.pizza.precio;
    form.tamano_id = props.pizza.tamano_id;
    form.categoria_id = props.pizza.categoria_id;
    form.descripcion = props.pizza.descripcion;
    form.foto_preview = props.pizza.imagen_url;
}

const handleFileChange = (e) => {
    form.foto = e.target.files[0];
    form.foto_preview = URL.createObjectURL(e.target.files[0]);
};

const submit = () => {
    form.precio = parseFloat(form.precio);
    if (props.pizza) {
        form.put(route('pizzas.update', props.pizza.id));
    } else{
        form.post(route('pizzas.store'));
    }
};





</script>

<template>

<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <div class="flex justify-between">
        <h1 class="mt-3 text-2xl font-medium text-gray-900">
            Formulario de pizzas
        </h1>
    </div>

    <div class="flex flex-col justify-center">
        <form @submit.prevent='submit'>
            <div>
                <InputLabel for="nombre" value="Nombre" />

                <TextInput
                    id="nombre"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.nombre"
                    required
                    autofocus
                />

                <InputError class="mt-2" :message="form.errors.nombre" />
            </div>

            <div class="mt-4">
                <InputLabel for="precio" value="Precio" />

                <TextInput
                    id="precio"
                    type="text"
                    class="mt-1 block w-full"
                    v-model.number="form.precio"
                    required
                />

                <InputError class="mt-2" :message="form.errors.precio" />
            </div>

            <div class="flex justify-around">

            <div class="mt-4">
                <InputLabel for="tamano_id" value="Tamaño" />

                <select
                    name="tamano_id"
                    id="tamano_id"
                    v-model.number="form.tamano_id"
                    class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                >
                    <option value="0" disabled selected hidden>
                        Seleccione el tamaño
                    </option>
                    <option
                        v-for="tamano in tamanos"
                        :key="tamano.id"
                        :value="tamano.id"
                    >
                        {{ tamano.nombre }}
                    </option>
                </select>

                <InputError class="mt-2" :message="form.errors.tamano_id" />
            </div>

            <div class="mt-4">
                <InputLabel for="categoria_id" value="Categoria" />

                <select
                    name="categoria_id"
                    id="categoria_id"
                    v-model.number="form.categoria_id"
                    class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                >
                    <option value="0" disabled selected hidden>
                        Seleccione la categoria
                    </option>
                    <option
                        v-for="categoria in categorias"
                        :key="categoria.id"
                        :value="categoria.id"
                    >
                        {{ categoria.nombre }}
                    </option>
                </select>

                <InputError class="mt-2" :message="form.errors.categoria_id" />
            </div>

        </div>



            <div class="mt-4">
                <InputLabel for="descripcion" value="Descripcion" />

                <TextInput
                    id="descripcion"
                    type="text"
                    class="mt-1 block w-full"
                    v-model="form.descripcion"
                    required
                />

                <InputError class="mt-2" :message="form.errors.descripcion" />
            </div>

            <div class="mt-4">
                <InputLabel for="foto" value="Foto de la pizza" />

                <input
                    id="foto"
                    type="file"
                    name="foto"
                    class="mt-1 block w-full"
                    accept="image/*"
                    @change="handleFileChange"

                />
            </div>

            <div
                v-if="form.foto_preview"
                class="mt-4 w-1/4"
            >
                <p>Preview de la imagen:</p>
                <img
                    width="200"
                    :src="form.foto_preview"
                />
            </div>


            <div class="mt-4 flex items-center justify-end">
                <PrimaryButton
                    class="ms-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                >
                    {{buttonLabel}}
                </PrimaryButton>
            </div>
        </form>
    </div>
</div>


</template>
