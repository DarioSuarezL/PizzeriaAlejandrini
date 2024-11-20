<script setup>

import Car from '@/Components/Car.vue';
import CustomButton from '@/Components/CustomButton.vue';

defineProps({
    pizza: {
        type: Object,
        required: true
    }
});

</script>


<template>
    <div class="bg-white m-2 rounded-lg flex border">
                <img :src="pizza.imagen_url" class="rounded-l-lg" width="200" alt="{{pizza.nombre}}">
                <div>
                    <a class=" pt-3 px-3 hover:text-xl font-bold hover:cursor-pointer" href="#">{{pizza.nombre}}</a>
                    <!-- {{route('pizzas.show', pizza.id)}} -->
                    <p class=" px-3"><span class="font-bold">Precio:</span> {{pizza.precio}} Bs.</p>
                    <p class=" px-3 lowercase">
                        <span class="font-bold capitalize">Descripción: </span>
                        {{pizza.descripcion}}
                    </p>

                    <a class="m-3 bg-red-800 hover:bg-red-700 p-5 inline-block rounded-lg" href="#" >
                        <div class="flex justify-center">
                            <p class="text-white">+</p>
                            <!-- <x-car></x-car> -->
                             <Car />
                        </div>
                    </a>


                    <!-- @if (auth()->user()->is_admin) -->
                    <div class="flex justify-around m-3">
                        <div class="bg-green-800 p-2 rounded-lg">
                            <a href="{{route('pizzas.edit', pizza.id)}}">
                                <p class="text-white text-sm uppercase"> Editar </p>
                            </a>
                        </div>

                        <form action="" method="POST">
                            <!-- @csrf
                             {{route('pizzas.destroy', pizza.id)}}
                            @method('DELETE') -->
                            <CustomButton class="mx-2">
                                Eliminar
                            </CustomButton>
                        </form>
                    </div>
                    <!-- @endif -->

                </div>
            </div>
</template>
