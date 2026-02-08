<script setup>
import { getApiHeader } from "@/APIs/ApiHeader";
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
import { useLang } from "@/CustomHooks/useLang";
import useSection from "@/CustomHooks/useSection";
import { ref, watch } from "vue";

const data = ref();
const {lang} = useLang();
const fetchData = async () => {
  console.log("lang changed from Home:", lang.value);
  console.log(getApiHeader(lang.value));
  try {
    const res = await fetch("http://127.0.0.1:8000/home-contents", {
      method: "GET",
      headers: getApiHeader(lang.value),
    });
    if (res.ok) {
      const json = await res.json();
      data.value = json.data;
      console.log("Titles Data: ", data.value);
      console.log(json.message);
    }
  } catch (err) {
    console.log("Faild to load Titles Data", err);
  }
};

watch(
  lang,
  () => {
    fetchData();
  },
  {immediate : true}
);

const hero = useSection(data, "hero");
const services = useSection(data, "services");
const projects = useSection(data, "projects");
const successStories = useSection(data, "successStories");
const statistics = useSection(data, "statistics");
const news = useSection(data, "news");
const media = useSection(data, "media");
const successPartners = useSection(data, "successPartners");
</script>

<template>
  <HeroSection />
  <div class="max-w-[1350px] mx-auto px-0">
    <ServicesSection v-if="services" :data="services.children" />
    <ProjectsSection v-if="projects" :data="projects.children" />
  </div>
  <SuccessStories v-if="successStories" :data="successStories.children" />
  <div class="max-w-[1350px] mx-auto px-0">
    <StatisticsSection v-if="statistics" :data="statistics.children" />
    <NewsSection v-if="news" :data="news.children" />
    <MediaSection v-if="media" :data="media.children" />
    <SuccessPartners v-if="successPartners" :data="successPartners.children" />
  </div>
  <FinallSection />
  <Footer />
  <UnderFooterLine />
</template>
