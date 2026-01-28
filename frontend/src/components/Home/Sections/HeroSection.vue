<script setup>
import { ref, computed, onMounted, onUnmounted } from "vue";
import HeroSectionVideo from "./HeroSectionCompnents/HeroSectionVideo.vue";
import HeroSectionImage from "./HeroSectionCompnents/HeroSectionImage.vue";

/* slides as components */
const slides = ref([]);
const currentSlide = ref(0);
let interval = null;

const totalSlides = computed(() => slides.value.length);

const updateSlides = () => {
  slides.value =
    window.innerWidth <= 765
      ? [{ component: HeroSectionImage }]
      : [{ component: HeroSectionImage }, { component: HeroSectionVideo }];
  currentSlide.value = 0;
};

const sliderStyle = computed(() => ({
  transform: `translateX(${currentSlide.value * 100}%)`,
}));

function autoSlide() {
  if (totalSlides.value === 0) {
    return;
  }
  currentSlide.value = (currentSlide.value + 1) % totalSlides.value;
}

onMounted(() => {
  updateSlides();
  window.addEventListener("resize", updateSlides);
  interval = setInterval(autoSlide, 3000);
});

onUnmounted(() => {
  window.removeEventListener("resize", updateSlides);
  clearInterval(interval);
});
</script>

<template>
  <div class="flex flex-col items-center">
    <div class="w-full overflow-hidden relative">
      <div
        class="flex transition-transform duration-500 ease-in-out"
        :style="sliderStyle"
      >
        <component
          v-for="(slide, index) in slides"
          :key="index"
          :is="slide.component"
          class="w-full shrink-0"
        />
      </div>
    </div>
  </div>
</template>

<style scoped></style>
