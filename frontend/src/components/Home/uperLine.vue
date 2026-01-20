<script setup></script>
<template>
  <div class=" h-12 text-white grid grid-rows-1 grid-cols-4">
    <!-- w-[1350px] w-[374px] -->
    <nav
      class="bg-[rgba(46,99,68,1)] col-start-1 col-span-3 flex items-center justify-end pl-5"
    >
      <a href="#">الاستمارة</a>
    </nav>
    <nav
      class="bg-[rgba(1,123,50,1)] flex justify-start items-center"
    >
      <a href="#" class="pr-5">تبرع الان</a>
    </nav>
  </div>
  <div id="logo" class="flex shrink-0 items-center absolute top-0 xl:right-1/12">
    <img
      class="h-auto w-auto sm:hidden xl:block"
      src="../../assets/logo.png"
      alt="give palestine"
    />
  </div>
</template>
<style>
#logo {
  @media(width <= 1490px) {
    right: 5%;
  }
  @media(width <= 1380px) {
    right: 1%;
  }
}
</style>
