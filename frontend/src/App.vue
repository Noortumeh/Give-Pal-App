<script setup>
import { RouterView } from "vue-router";
import Navbar from "./components/Home/Navbar.vue";
import UperLine from "./components/Home/uperLine.vue";
import MobileNavbar from "./components/Home/MobileNavbar.vue";
import SideBar from "./components/Home/SideBar.vue";

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
