<script setup>
import { computed } from "vue";

const props = defineProps({
  item: {
    type: Object,
    default: () => ({}),
  },
});

const videoUrl = computed(() => props.item.file_path);
</script>
<template>
  <div
    class="relative hidden md:block w-full h-[490px] overflow-hidden video-wrapper"
  >
    <video
      autoplay
      muted
      loop
      playsinline
      class="absolute top-1/2 left-1/2 w-full h-full object-cover -translate-x-1/2 -translate-y-1/2"
    >
      <source :src="videoUrl" type="video/mp4" />
    </video>
    <!-- overlay content similar to image slide -->
    <div
      class="absolute inset-0 flex items-center justify-center pointer-events-none"
    >
      <div class="relative z-10 text-center max-w-xl px-4">
        <h2 class="text-white text-3xl font-bold">
          {{ props.item.title }}
        </h2>
        <p class="text-white mt-2">
          {{ props.item.description }}
        </p>
      </div>
    </div>
  </div>
</template>
