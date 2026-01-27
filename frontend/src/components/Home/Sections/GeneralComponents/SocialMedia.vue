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

const faIcons = {
  faFacebookF,
  faLinkedinIn,
  faTiktok,
  faTwitter
};

</script>

<template>
  <div class="flex gap-3" :style="{ color: color }">
    <FontAwesomeIcon v-for="icon in faIcons" :class="`border border-[${borderColor}] p-3 cursor-pointer`" :icon="icon" />
  </div>
</template>
<style scoped>
</style>