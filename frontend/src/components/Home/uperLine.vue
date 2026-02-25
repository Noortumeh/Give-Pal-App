<script setup>
import { MagnifyingGlassIcon } from "@heroicons/vue/24/outline";
import Searchbar from "./Searchbar.vue";
import { computed, ref } from "vue";

const openSearch = ref(false);

const props = defineProps({
  data: {
    type: Array,
  },
});

const navigation = computed(() => props.data.map((item) => ({
  name: item.label,
  href: item.url,
  current: false,
})));

const handleSearchOpen = () => {
  if (openSearch.value === false) {
    openSearch.value = true;
  } else {
    openSearch.value = false;
  }
};
</script>
<template>
  <div id="uper-line" class="h-12 text-white grid grid-rows-1 grid-cols-4">
    <!-- w-[1350px] w-[374px] -->
    <nav
      class="bg-[rgba(46,99,68,1)] col-start-1 col-span-3 flex items-center justify-end pl-5"
    >
      <a :href="navigation[0]?.href" :class="[$i18n.locale === 'en' ? 'pr-5' : '']">{{
        navigation[0]?.name
      }}</a>
    </nav>
    <nav class="bg-[rgba(1,123,50,1)] flex justify-start items-center">
      <a :href="navigation[1]?.href" :class="[$i18n.locale === 'en' ? 'pl-5' : 'pr-5']">{{
        navigation[1]?.name
      }}</a>
    </nav>

    <div
      id="logo"
      :class="[
        'flex shrink-0 items-center absolute top-0',
        $i18n.locale === 'ar' ? 'xl:right-1/12' : 'xl:left-1/12',
      ]"
    >
      <img
        class="h-auto w-auto xl:block"
        src="../../assets/logo.png"
        alt="give palestine"
      />
    </div>
    <div id="search-bar" class="md:hidden flex justify-center items-center">
      <div :class="openSearch ? 'block' : 'hidden'">
        <Searchbar />
      </div>
      <MagnifyingGlassIcon
        class="h-10 text-[rgba(1,123,50,1)] cursor-pointer"
        @click="handleSearchOpen"
      />
    </div>
  </div>
</template>
<style>
@media (width <= 1630px) {
  [dir="ltr"] #logo {
    left: 5%;
  }
}
@media (width <= 1490px) {
  [dir="rtl"] #logo {
    right: 5%;
  }
  [dir="ltr"] #logo {
    left: 0%;
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
    #search-bar {
      display: flex;
      justify-content: center;
      align-items: center;
      grid-column: span 1 / span 1 !important;
      grid-column-start: 3 !important;
      text-align: center;
    }
  }
}
</style>
