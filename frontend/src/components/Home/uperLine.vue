<script setup>
import { MagnifyingGlassIcon } from "@heroicons/vue/24/outline";
</script>
<template>
  <div id="uper-line" class="h-12 text-white grid grid-rows-1 grid-cols-4">
    <!-- w-[1350px] w-[374px] -->
    <nav
      class="bg-[rgba(46,99,68,1)] col-start-1 col-span-3 flex items-center justify-end pl-5"
    >
      <a href="#">الاستمارة</a>
    </nav>
    <nav class="bg-[rgba(1,123,50,1)] flex justify-start items-center">
      <a href="#" class="pr-5">تبرع الان</a>
    </nav>

    <div
      id="logo"
      class="flex shrink-0 items-center absolute top-0 xl:right-1/12"
    >
      <img
        class="h-auto w-auto xl:block"
        src="../../assets/logo.png"
        alt="give palestine"
      />
    </div>
    <div id="search-bar" class="hidden">
      <MagnifyingGlassIcon class="h-12 w-12 text-[rgba(1,123,50,1)] cursor-pointer" />
    </div>
  </div>
</template>
<style>
@media (width <= 1490px) {
  #logo {
    right: 5%;
  }
}
@media (width <= 1380px) {
  #logo {
    right: 1%;
  }
}
@media screen and (min-width: 768px) and (max-width: 1280px) {
  #logo {
    display: none;
  }
}

@media screen and (max-width: 768px) {
  #uper-line {
    nav {
      display: none;
    }
    height: 120px;
    text-align: center;
    grid-template-columns: repeat(3, minmax(0, 1fr)) !important;
    align-items: center !important;
    justify-items: center !important;

    #logo {
      position: unset;
      grid-column: span 1 / span 1 !important;
      grid-column-start: 2 !important;
      text-align: center;
    }
    #search-bar{
      display: block;
      grid-column: span 1 / span 1 !important;
      grid-column-start: 3 !important;
      text-align: center;
    }
  }
}
</style>
