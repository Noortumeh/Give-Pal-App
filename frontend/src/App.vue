<script setup>
import { RouterView } from "vue-router";
import Navbar from "./components/Home/Navbar.vue";
import UperLine from "./components/Home/uperLine.vue";
import MobileNavbar from "./components/Home/MobileNavbar.vue";
import SideBar from "./components/Home/SideBar.vue";
import { computed, ref, watch, watchEffect } from "vue";
import { useI18n } from "vue-i18n";
import Footer from "./components/Home/Footer.vue";
import UnderFooterLine from "./components/Home/UnderFooterLine.vue";
import { BASE_URL, getApiHeader } from "./APIs/ApiHeader";
import { useLang } from "./CustomHooks/useLang";

const { locale } = useI18n();

watchEffect(() => {
  document.documentElement.dir = locale.value === "ar" ? "rtl" : "ltr";
});

const links = ref();
const { lang } = useLang();

const fetchLinksData = async () => {
  try {
    const res = await fetch(`${BASE_URL}/links/?locale=${lang.value}`, {
      method: "GET",
      headers: getApiHeader(lang.value),
    });
    if (res.ok) {
      const json = await res.json();
      links.value = json.data;
      console.log("links Data: ", links.value[0]);
    }
  } catch (err) {
    console.log("Failed to load links Data", err);
  }
};

const navbar = computed(() => links.value?.find((c) => c.name === "navbar"));
const footer = computed(() => {
  if (!links.value) return null;
  return links.value.find((c) => c.name === "footer");
});

watch(links, (newVal) => {
  console.log("Links updated:", newVal);
  console.log("Footer computed:", footer.value.items);
});

watch(
  lang,
  () => {
    fetchLinksData();
  },
  { immediate: true },
);
</script>
<template>
  <UperLine />
  <Navbar v-if="navbar" :data="navbar?.items || []" />
  <MobileNavbar />
  <SideBar />
  <main>
    <RouterView />
  </main>
  <Footer :data="footer?.items || []" />
  <UnderFooterLine />
</template>
