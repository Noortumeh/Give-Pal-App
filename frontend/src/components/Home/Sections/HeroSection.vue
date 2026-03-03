<script setup>
import { computed, onMounted, onUnmounted, shallowRef, watch } from "vue";
import HeroSectionVideo from "./HeroSectionCompnents/HeroSectionVideo.vue";
import HeroSectionImage from "./HeroSectionCompnents/HeroSectionImage.vue";
import { useI18n } from "vue-i18n";
import { Swiper, SwiperSlide } from "swiper/vue";
import { Pagination, Autoplay } from "swiper/modules";
import "swiper/css";
import "swiper/css/pagination";

const modules = [Pagination, Autoplay];
const slides = shallowRef([]);
const { locale } = useI18n();

const props = defineProps({
  data: {
    type: Object,
  },
});

// build slide objects based on API data and current viewport width
const updateSlides = () => {
  if (!props.data || !Array.isArray(props.data.children)) {
    slides.value = [];
    return;
  }

  const children = props.data.children;

  if (window.innerWidth <= 767) {
    // on mobile only show the first image slide (if exists)
    const img = children.find((c) => c.file_type === "image");
    slides.value = img
      ? [{ component: HeroSectionImage, item: img }]
      : [];
  } else {
    // on desktop show all available slides in order
    slides.value = children.map((c) => {
      const component = c.file_type === "video" ? HeroSectionVideo : HeroSectionImage;
      return { component, item: c };
    });
  }
};

onMounted(() => {
  updateSlides();
  window.addEventListener("resize", updateSlides);
});

onUnmounted(() => {
  window.removeEventListener("resize", updateSlides);
});

// also recalc when the prop data changes
watch(
  () => props.data,
  () => {
    updateSlides();
  },
  { immediate: false }
);

</script>

<template>
  <div class="flex flex-col items-center">
    <div class="w-full overflow-hidden relative">
      <div class="flex transition-transform duration-500 ease-in-out">
        <Swiper
          :modules="modules"
          :slides-per-view="1"
          :pagination="{ clickable: true }"
          :autoplay="{ delay: 5000 }"
          :dir="locale === 'ar' ? 'ltr' : 'ltr'"
          class="w-full"
        >
          <SwiperSlide v-for="(slide, index) in slides" :key="index">
            <component :is="slide.component" class="w-full" :item="slide.item" />
          </SwiperSlide>
        </Swiper>
      </div>
    </div>
  </div>
</template>
<style scoped>
:deep(.swiper-pagination) {
  bottom: 30px;
}
</style>
