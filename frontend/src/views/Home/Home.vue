<script setup>
import HeroSection from "@/components/Home/Sections/HeroSection.vue";
import ProjectsSection from "@/components/Home/Sections/ProjectsSection.vue";
import ServicesSection from "@/components/Home/Sections/ServicesSection.vue";
import StatisticsSection from "@/components/Home/Sections/StatisticsSection.vue";
import SuccessStories from "@/components/Home/Sections/SuccessStories.vue";
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
  </div>
</template>
