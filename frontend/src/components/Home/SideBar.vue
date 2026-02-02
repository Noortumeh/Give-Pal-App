<script setup>
import { MagnifyingGlassIcon } from "@heroicons/vue/24/outline";
import SocialMedia from "./Sections/GeneralComponents/SocialMedia.vue";
import { useLang } from "@/CustomHooks/useLang";
import { watchEffect } from "vue";

const { lang, setLang } = useLang();
watchEffect(() => {
  console.log("lang changed from side bar:", lang.value);
});
</script>
<template>
  <div class="hidden md:block fixed left-0 top-28 z-2 flex-col gap-5 w-12 h-12]">
    <div class="bg-[rgba(1,123,50,1)]">
      <MagnifyingGlassIcon class="p-2 text-white cursor-pointer" />
    </div>
    <!-- <RouterLink :to="`/?lang=${lang ==='en'? 'ar': 'en'}`" > -->
    <div
      class="bg-[rgba(1,123,50,1)] text-white text-center pt-3 h-12 mt-2 cursor-pointer"
      @click="setLang($i18n.locale ==='en' ? 'ar' : 'en'), $i18n.locale ==='ar' ? $i18n.locale = 'en' : $i18n.locale = 'ar'"
    >
      {{ $i18n.locale === "en" ? "AR" : "EN" }}
    </div>
    <!-- </RouterLink> -->
    <div>
      <SocialMedia
        spasificStyle="flex-col gap-0 mt-2"
        spasificIconStyle="bg-white text-[19px]"
        color="black"
      />
    </div>
  </div>
</template>
