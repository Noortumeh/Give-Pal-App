<script setup>
import { RouterView } from "vue-router";
import Navbar from "./components/Home/Navbar.vue";
import UperLine from "./components/Home/uperLine.vue";
import MobileNavbar from "./components/Home/MobileNavbar.vue";
</script>
<template>
  <UperLine />
  <Navbar />
  <MobileNavbar />
  <main>
    <RouterView />
  </main>
</template>
