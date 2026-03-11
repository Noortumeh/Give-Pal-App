<script setup>
import SocialMedia from "./Sections/GeneralComponents/SocialMedia.vue";
import { useLang } from "@/CustomHooks/useLang";
import { computed, watchEffect } from "vue";
import Searchbar from "./Searchbar.vue";

const { lang, setLang } = useLang();

const props = defineProps({
  data: {
    type: Array,
  },
});

const icons = computed(() =>
  props.data.map((item) => ({
    name: item.label,
    href: item.url,
  })),
);

watchEffect(() => {
  console.log("lang changed from side bar:", lang.value);
});
</script>
<template>
  <div class="fixed left-0 top-28 z-5 flex-col gap-5 w-12 h-12]">
    <Searchbar iconStyle="p-2 text-white cursor-pointer" bgStyle="bg-[rgba(1,123,50,1)] flex" />
    <div
      class="bg-[rgba(1,123,50,1)] text-white text-center pt-3 h-12 mt-2 cursor-pointer"
      @click="
        (setLang($i18n.locale === 'en' ? 'ar' : 'en'),
        $i18n.locale === 'ar' ? ($i18n.locale = 'en') : ($i18n.locale = 'ar'))
      "
    >
      {{ $i18n.locale === "en" ? "AR" : "EN" }}
    </div>
    <div>
      <SocialMedia
        spasificStyle="flex-col gap-0 mt-2"
        spasificIconStyle="bg-white text-[19px]"
        color="black"
        :data="icons || []"
      />
    </div>
  </div>
</template>
