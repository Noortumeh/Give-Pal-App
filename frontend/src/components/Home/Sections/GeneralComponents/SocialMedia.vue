<script setup>
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { faFacebookF, faLinkedinIn, faTiktok, faTwitter } from '@fortawesome/free-brands-svg-icons'

defineProps({
  color: {
    type: String,
    default: "white",
  },
  borderColor: {
    type: String,
    default: "rgba(255,255,255,0.5)",
  },
});
</script>

<template>
  <div class="flex gap-3" :style="{ color: color }">
    <FontAwesomeIcon :class="`border border-[${borderColor}] p-3`" :icon="faFacebookF" />
    <FontAwesomeIcon :class="`border border-[${borderColor}] p-3`" :icon="faLinkedinIn" />
    <FontAwesomeIcon :class="`border border-[${borderColor}] p-3`" :icon="faTiktok" />
    <FontAwesomeIcon :class="`border border-[${borderColor}] p-3`" :icon="faTwitter" />
  </div>
</template>
<style scoped>
</style>