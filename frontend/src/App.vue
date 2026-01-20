<script setup>
import { RouterView } from 'vue-router';
import Navbar from './components/Home/Navbar.vue';
import UperLine from './components/Home/uperLine.vue';
import Footer from './components/Home/Footer.vue';
</script>
<template>
  <UperLine />
  <Navbar />
  <main>
    <RouterView />
  </main>
  <Footer />
</template>