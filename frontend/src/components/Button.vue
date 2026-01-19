<script setup>
const props = defineProps({
  title: {
    type: String,
    required: true,
  },
});
</script>

<
<template>
  <button
    id="bold-button"
    class="min-w-[120px] border-[color:rgba(1,123,50,1)] border-2 border-solid mt-5 bg-[color:rgba(255,255,255,0.35)] text-[rgba(1,123,50,1)] font-[1000] p-2 px-10"
  >
    {{ title }}
  </button>
</template>
<style>
#bold-button {
  font-weight: bold;
}
</style>
