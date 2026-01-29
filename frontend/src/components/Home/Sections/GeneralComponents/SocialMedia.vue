<script setup>
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { faFacebookF, faLinkedinIn, faTiktok, faTwitter } from '@fortawesome/free-brands-svg-icons'

defineProps({
  color: {
    type: String,
    default: "white",
  },
  spasificStyle: {
    type: String,
    default: "flex"
  },
  spasificIconStyle: {
    type: String,
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
  <div :class="`${spasificStyle} gap-3 w-full`" :style="{ color: color }">
    <FontAwesomeIcon v-for="icon in faIcons" :class="`p-3 cursor-pointer w-full h-full ${spasificIconStyle}`" :icon="icon" />
  </div>
</template>
<style scoped>
</style>