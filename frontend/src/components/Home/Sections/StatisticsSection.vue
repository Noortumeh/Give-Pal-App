<script setup>
import { API_HEADER } from "@/APIs/ApiHeader";
import { statisticsSection } from "@/APIs/EndPoints";
import { onMounted, ref } from "vue";
const data = ref([]);

onMounted(async () => {
  try {
    const res = await fetch(statisticsSection, {
      method: "GET",
      headers: API_HEADER,
    });
    if (res.ok) {
      data.value = await res.json();
      console.log("Statistics Data: ", data.value);
    }
  } catch (err) {
    console.log("Faild to load Statistics Data", err);
  }
});
</script>
<template>
  <div
    class="grid md:grid-cols-1 md:grid-rows-5 lg:grid-cols-3 lg:grid-rows-1 gap-5 place-items-center m-5"
  >
    <div class="row-span-1 md:col-span-1 lg:col-span-1">
      <h1 class="text-3xl font-semibold absolute">الاحصائيات</h1>
      <div class="under-line"></div>
      <p class="pt-10">
        نحن في جمعية عطاء فلسطين، نؤمن بقوة العطاء وأثره. على مدار سنوات من
        العمل الميداني، قدمنا مبادرات إنسانية وثقافية وتعليمية تساهم في بناء
        مستقبل أكثر أمانًا لأطفال فلسطين نحن في جمعية عطاء فلسطين،
      </p>
    </div>
    <div
      class="md:row-span-4 lg:row-span-1 md:col-span-1 lg:col-span-2 grid md:grid-rows-3 grid-cols-2 lg:grid-rows-2 justify-center place-items-center gap-5 m-5 `sm:w-[512px]` md:w-[850px] `h-[577px]`"
    >
      <div
        v-for="value in data"
        class="shadow-2xl col-span-1 row-span-1 grid grid-cols-3 grid-rows-3 auto-rows-fr w-full h-full"
      >
        <img
          class="col-span-3"
          :src="`http://127.0.0.1:8000/storage/${value.icon}`"
        />
        <div class="col-span-3 content-center text-center">
          <span class="text-8xl font-bold text-[rgba(1,123,50,1)]">{{
            value.statistic
          }}</span>
          <h2 class="text-2xl">{{ value.statistic_title }}</h2>
        </div>
      </div>
    </div>
  </div>
</template>
