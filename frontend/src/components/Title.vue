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
  <!-- <div class="text-start pr-5 pt-5"> -->
    <h1 class="text-3xl font-semibold absolute">{{ title }}</h1>
    <div class="under-line"></div>
    <p :id="id" :class="[id ? 'text-2xl' : 'text-sm', 'text-slate-500 pt-8']">
      {{ description }}
    </p>
  <!-- </div> -->
</template>
<style>
#p-black{
  color: black;
}
</style>
