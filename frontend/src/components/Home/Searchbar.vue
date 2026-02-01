<!-- SearchBar.vue -->
<template>
  <div class="relative">
    <input
      v-model="searchQuery"
      type="text"
      placeholder="Search..."
      class="w-full py-2 pl-10 pr-4 text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
      @input="handleInput"
    />
  </div>
</template>

<script setup>
import { ref, watch } from 'vue';

const searchQuery = ref('');

const emit = defineEmits(['search']);

watch(searchQuery, (newValue) => {
    console.log(newValue);
  emit('search', newValue);
});
</script>
