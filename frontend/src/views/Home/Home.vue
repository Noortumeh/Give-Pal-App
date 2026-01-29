<script setup>
import { API_HEADER } from "@/APIs/ApiHeader";
import Footer from "@/components/Home/Footer.vue";
import FinallSection from "@/components/Home/Sections/FinallSection.vue";
import HeroSection from "@/components/Home/Sections/HeroSection.vue";
import MediaSection from "@/components/Home/Sections/MediaSection.vue";
import NewsSection from "@/components/Home/Sections/NewsSection.vue";
import ProjectsSection from "@/components/Home/Sections/ProjectsSection.vue";
import ServicesSection from "@/components/Home/Sections/ServicesSection.vue";
import StatisticsSection from "@/components/Home/Sections/StatisticsSection.vue";
import SuccessPartners from "@/components/Home/Sections/SuccessPartners.vue";
import SuccessStories from "@/components/Home/Sections/SuccessStories.vue";
import UnderFooterLine from "@/components/Home/UnderFooterLine.vue";
import { onMounted, ref } from "vue";

// const data = ref();
// onMounted(async () => {
//   try {
//     const res = await fetch('http://127.0.0.1:8000/home-titles/en', {
//       method: "GET",
//       headers: API_HEADER,
//     });
//     if (res.ok) {
//       data.value = await res.json();
//       console.log("Titles Data: ", data.value);
//     }
//   } catch (err) {
//     console.log("Faild to load Titles Data", err);
//   }
// });
</script>

<template>
  <HeroSection />
  <div class="max-w-[1350px] mx-auto px-0">
    <ServicesSection />
    <ProjectsSection />
  </div>
  <SuccessStories />
  <div class="max-w-[1350px] mx-auto px-0">
    <StatisticsSection />
    <NewsSection />
    <MediaSection />
    <SuccessPartners />
  </div>
  <FinallSection />
  <Footer />
  <UnderFooterLine />
</template>
