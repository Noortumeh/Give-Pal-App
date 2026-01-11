<script setup>
import { RouterView } from 'vue-router';
import Navbar from './components/Home/Navbar.vue';
import UperLine from './components/Home/uperLine.vue';
</script>
<template>
  <UperLine />
  <Navbar />
  <main>
    <RouterView />
  </main>
</template>