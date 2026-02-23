<script setup>
import { BASE_URL, getApiHeader } from "@/APIs/ApiHeader";
import FinallSection from "@/components/Home/Sections/FinallSection.vue";
import HeroSection from "@/components/Home/Sections/HeroSection.vue";
import MediaSection from "@/components/Home/Sections/MediaSection.vue";
import NewsSection from "@/components/Home/Sections/NewsSection.vue";
import ProjectsSection from "@/components/Home/Sections/ProjectsSection.vue";
import ServicesSection from "@/components/Home/Sections/ServicesSection.vue";
import StatisticsSection from "@/components/Home/Sections/StatisticsSection.vue";
import SuccessPartners from "@/components/Home/Sections/SuccessPartners.vue";
import SuccessStories from "@/components/Home/Sections/SuccessStories.vue";
import { useLang } from "@/CustomHooks/useLang";
import useSection from "@/CustomHooks/useSection";
import { ref, watch } from "vue";

const data = ref();

const { lang } = useLang();
const fetchData = async () => {
  try {
    const res = await fetch(`${BASE_URL}/home-contents/?locale=${lang.value}`, {
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

const hero = useSection(data, "hero");
const services = useSection(data, "services");
const projects = useSection(data, "projects");
const successStories = useSection(data, "successStories");
const statistics = useSection(data, "statistics");
const news = useSection(data, "news");
const media = useSection(data, "media");
const successPartners = useSection(data, "successPartners");

// const fetchLinksData = async () => {
//   try {
//     const res = await fetch(`${BASE_URL}/links/?locale=${lang.value}`, {
//       method: "GET",
//       headers: getApiHeader(lang.value),
//     });
//     if (res.ok) {
//       const json = await res.json();
//       links.value = json.data;
//       console.log("links Data: ", links.value[0]);
//     }
//   } catch (err) {
//     console.log("Failed to load links Data", err);
//   }
// };

// const navbar = computed(() => links.value?.find((c) => c.name === "navbar"));
// const footer = computed(() => {
//   if (!links.value) return null;
//   return links.value.find((c) => c.name === "footer");
// });

// watch(links, (newVal) => {
//   console.log("Links updated:", newVal);
//   console.log("Footer computed:", footer.value.items);
// });

watch(
  lang,
  () => {
    fetchData();
    // fetchLinksData();
  },
  { immediate: true },
);
</script>

<template>
  <!-- <UperLine /> -->
  <!-- <Navbar :data="navbar?.items || []" /> -->
  <!-- <MobileNavbar /> -->
  <!-- <SideBar /> -->

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
  <!-- <Footer :data="footer?.items || []" />
  <UnderFooterLine /> -->
</template>
