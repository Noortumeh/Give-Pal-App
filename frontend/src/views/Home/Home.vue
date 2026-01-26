<script setup>
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
