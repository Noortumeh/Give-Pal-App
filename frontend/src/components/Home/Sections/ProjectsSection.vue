<script setup>
import Title from "@/components/Title.vue";
import { onMounted, ref } from "vue";


const props = defineProps({
  data: {
    type: Array,
  }
})

// const data = ref([]);

// onMounted(async () => {
//   try {
//     const res = await fetch(projectsSection, {
//       method: "GET",
//       headers: API_HEADER,
//     });
//     if (res.ok) {
//       data.value = await res.json();
//       console.log("Projects Data: ", data.value);
//     }
//   } catch (err) {
//     console.log("Faild to load Service Data", err);
//   }
// });
</script>
<template>
  <div class="text-start p-5 pt-5">
    <Title
      :title="$t('titles.projects.title')"
      :underLineWidth="$i18n.locale === 'ar' ? 'width: 170px' : 'width: 220px'"
      :description="$t('titles.projects.description')"
    />
  </div>

  <div v-if="!data">
    <p class="mt-5 text-center text-3xl">لايوحد مشاريع لعرضها بعد!</p>
  </div>

  <div
    v-else
    class="flex flex-wrap items-center justify-center gap-4 pt-12 pb-12"
  >
    <div
      v-for="projects in data"
      class="max-w-[323px] max-h-[544px] w-full shadow-2xl"
    >
      <div class="h-[204px] p-6">
        <span class="text-[rgba(193,221,204,0.4)] font-bold text-6xl">{{
          projects.id < 10 ? "0" + projects.order : projects.order
        }}</span>
        <h2 class="text-base text-slate-900 font-medium mt-3">
          {{ projects.title }}
        </h2>
        <p class="text-xs font-medium mt-1">
          {{ projects.description.substring(0,100) }}
        </p>
      </div>
      <img :src="`http://127.0.0.1:8000/storage/${projects.file_path}`" />
    </div>
  </div>
  <div
    id="more-button"
    class="md:hidden flex justify-center items-center w-full py-5"
  >
    <button
      class="text-[rgba(1,123,50,1)] border border-[rgba(1,123,50,1)] py-2 px-10 text-bold"
    >
      {{ $t('buttons.name') }}
    </button>
  </div>
</template>

<style>
@media screen and (max-width: 1200px) {
  #more-button {
    display: flex;
  }
}
</style>
