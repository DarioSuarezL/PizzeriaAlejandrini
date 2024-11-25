<script setup>
import TextInput from '@/Components/TextInput.vue';
import { ref } from 'vue';

const search = ref('');

</script>

<template>

<div class="flex justify-center">
    <TextInput
        v-model="search"
        class="w-full"
        placeholder="Buscar una pizza..."
        @input="$emit('searchPizzas', search)"
    />
</div>

</template>
