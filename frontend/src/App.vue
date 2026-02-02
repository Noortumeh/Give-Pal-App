<script setup>
import { RouterView } from "vue-router";
import Navbar from "./components/Home/Navbar.vue";
import UperLine from "./components/Home/uperLine.vue";
import MobileNavbar from "./components/Home/MobileNavbar.vue";
import SideBar from "./components/Home/SideBar.vue";
import { watchEffect } from "vue"
import { useI18n } from "vue-i18n"

const { locale } = useI18n()

watchEffect(() => {
  document.documentElement.dir =
    locale.value === "ar" ? "rtl" : "ltr"
})
</script>
<template>
  <UperLine />
  <Navbar />
  <MobileNavbar />
  <SideBar  />
  <main>
    <RouterView />
  </main>
</template>
