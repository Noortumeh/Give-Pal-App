<script setup>
import Title from "@/components/Title.vue";

const logos = [
  "slack",
  "framer",
  "netflix",
  "google",
  "linkedin",
  "instagram",
  "facebook",
];

const duplicatedLogos = [...logos, ...logos];
</script>

<template>
  <Title title="شركاء النجاح" />
  <div
    class="overflow-hidden w-full relative mx-auto select-none py-20"
  >
    <div
      class="absolute left-0 top-0 h-full w-20 z-10 pointer-events-none bg-gradient-to-r from-white to-transparent"
    ></div>

    <div class="marquee-inner flex min-w-[200%]">
      <div v-for="(logo, index) in duplicatedLogos" class="ml-4 border-2 border-[rgba(140,140,140,0.5)] flex justify-center ">
        <img 
          :key="index"
          :src="`https://raw.githubusercontent.com/prebuiltui/prebuiltui/main/assets/companyLogo/${logo}.svg`"
          :alt="logo"
          class=" h-[190px] w-[190px] object-contain select-none"
          draggable="false"
        />
      </div>
    </div>

    <div
      class="absolute right-0 top-0 h-full w-20 md:w-40 z-10 pointer-events-none bg-gradient-to-l from-white to-transparent"
    ></div>
  </div>
</template>

<style>
.marquee-inner {
  animation: marqueeScroll 20s linear infinite;
}

@keyframes marqueeScroll {
  0% {
    transform: translateX(100%);
  }
  80% {
    transform: translateX(-50%);
  }

}
</style>
