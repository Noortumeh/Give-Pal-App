<script setup>
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import {
  faFacebookF,
  faLinkedinIn,
  faTiktok,
  faTwitter,
} from "@fortawesome/free-brands-svg-icons";
import { computed } from "vue";

const props = defineProps({
  color: {
    type: String,
    default: "white",
  },
  spasificStyle: {
    type: String,
    default: "flex",
  },
  spasificIconStyle: {
    type: String,
  },
  data: {
    type: Array,
  },
});

const iconMap = {
  facebook: faFacebookF,
  linkedin: faLinkedinIn,
  tiktok: faTiktok,
  twitter: faTwitter,
};

const icons = computed(() => {
  return props.data?.map((item) => ({
    icon: iconMap[item.name],
    href: item.href,
  }));
});
</script>

<template>
  <div :class="`${spasificStyle} gap-3 w-full`" :style="{ color: color }">
    <a v-for="(icon, i) in icons" :key="i" :href="icon.href" target="_blank">
      <FontAwesomeIcon
        v-if="icon.icon"
        :icon="icon.icon"
        :class="`p-3 cursor-pointer w-full h-full ${spasificIconStyle}`"
      />
    </a>
  </div>
</template>
<style scoped></style>
