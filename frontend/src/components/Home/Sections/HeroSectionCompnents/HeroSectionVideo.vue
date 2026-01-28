<script setup>
import HeroVideo from "@/assets/HeroVideo.mp4";
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
      <source :src="HeroVideo" type="video/mp4" />
    </video>
  </div>
</template>
