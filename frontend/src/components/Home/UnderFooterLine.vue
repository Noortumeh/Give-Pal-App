<script setup>
import SocialMedia from './Sections/GeneralComponents/SocialMedia.vue';

</script>
<template>
  <div class="h-[70px] bg-[rgba(1,123,50,1)] sm:hidden md:block">
    <div class="grid  grid-cols-3 grid-rows-1 max-w-[1350px] m-auto h-full items-center justify-items-center">
        <div class="col-start-3 row-start-1 ml-4">
            <img src="../../assets/Footer/BlueLogo.png" />
        </div>
        <div class="col-start-2 row-start-1">
            <SocialMedia spasificIconStyle="border border-[rgba(255,255,255,0.5)]"/>
        </div>
        <div class="col-start-1 row-start-1">
            <p class="p-white">© 2025 Give Palestine All Rights Reserved.</p>
        </div>
    </div>
  </div>
</template>
