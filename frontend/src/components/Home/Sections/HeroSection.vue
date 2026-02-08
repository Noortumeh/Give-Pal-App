<script setup>
import { computed, onMounted, onUnmounted, shallowRef } from "vue";
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

const updateSlides = () => {
  slides.value =
    window.innerWidth <= 767
      ? [{ component: HeroSectionImage }]
      : [{ component: HeroSectionImage }, { component: HeroSectionVideo }];
};
// const currentSlide = ref(0);
// const sliderStyle = computed(() => ({
//   transform: locale.value === 'ar' ? `translateX(${currentSlide.value * 100}%)` : `translateX(-${currentSlide.value * 100}%)`,
// }));


onMounted(() => {
  updateSlides();
  window.addEventListener("resize", updateSlides);
});

onUnmounted(() => {
  window.removeEventListener("resize", updateSlides);
});
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
            <component :is="slide.component" class="w-full" />
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
