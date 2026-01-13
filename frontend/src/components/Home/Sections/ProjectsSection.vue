<script setup>
import { onMounted, ref } from "vue";

const data = ref([]);

onMounted(async () => {
  try {
    const res = await fetch("http://127.0.0.1:8000/projects", {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
        "access-control-allow-credentials": "true",
      },
    });
    if (res.ok) {
      data.value = await res.json();
      console.log("Services Data: ", data.value);
    }
  } catch (err) {
    console.log("Faild to load Service Data", err);
  }
});
</script>
<template>
  <div class="text-start pr-5 pt-5">
    <h1 class="text-3xl font-semibold">مشاريع عطاء</h1>
    <p class="text-sm text-slate-500 mt-2">
      تسعى "عطاء فلسطين” لتوفير مجتمع آمن وفعّال يتّسم بالإنتاجية، وقد انطلقت
      أولى مجتمعات "دار الرجاء" تسعى "عطاء فلسطين” لتوفير مجتمع آمن وفعّال
    </p>
  </div>

  <div class="flex flex-wrap items-center justify-center gap-4 pt-12">
    <div
      v-for="projects in data"
      class="max-w-[323px] max-h-[544px] w-full shadow-2xl"
    >
      <div class="h-[204px] p-6">
        <span class="text-[rgba(193,221,204,0.4)] font-bold text-6xl">{{
          projects.id < 10 ? '0'+projects.id : projects.id
        }}</span>
        <h2 class="text-base text-slate-900 font-medium mt-3">
          {{ projects.title }}
        </h2>
        <p class="text-xs font-medium mt-1">
          {{ projects.description }}
        </p>
      </div>
      <img class="" :src="`http://127.0.0.1:8000/storage/${projects.image}`" />
    </div>
  </div>
</template>

<style></style>
