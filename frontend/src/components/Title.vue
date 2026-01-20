<script setup>
const props = defineProps({
  title: {
    type: String,
    required: true,
  },
  description: {
    type: String,
    required: false,
  },
  id:{
    type: String,
  }
});
</script>
<template>
    <h1 class="text-3xl font-semibold absolute">{{ title }}</h1>
    <div class="under-line"></div>
    <p :id="id" :class="[id ? 'text-2xl' : 'text-sm', 'text-slate-500 pt-8']">
      {{ description }}
    </p>
</template>
<style>
#p-black{
  color: black;
}
</style>
