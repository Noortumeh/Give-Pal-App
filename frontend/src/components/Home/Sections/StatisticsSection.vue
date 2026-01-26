<script setup>
import { API_HEADER } from "@/APIs/ApiHeader";
import { statisticsSection } from "@/APIs/EndPoints";
import Title from "@/components/Title.vue";
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
      <Title
        title="الاحصائيات"
        description=" نحن في جمعية عطاء فلسطين، نؤمن بقوة العطاء وأثره. على مدار سنوات من
        العمل الميداني، قدمنا مبادرات إنسانية وثقافية وتعليمية تساهم في بناء
        مستقبل أكثر أمانًا لأطفال فلسطين نحن في جمعية عطاء فلسطين،"
      />
    </div>
    <div
      class="md:row-span-4 lg:row-span-1 md:col-span-1 lg:col-span-2 grid sm:grid-rows-3 grid-cols-2 md:grid-rows-2 justify-center place-items-center gap-5 m-5 `sm:w-[512px]` md:w-[850px] `h-[577px]`"
    >
      <div
        v-for="value in data"
        :id="[`media-${data.indexOf(value)}`]"
        :key="value.statistic_title"
        class="shadow-2xl col-span-1 row-span-1 grid grid-cols-3 grid-rows-3 auto-rows-fr w-full h-full"
      >
        <img
          class="col-span-3"
          :src="`http://127.0.0.1:8000/storage/${value.icon}`"
        />
        <div class="content-flex col-span-3 content-center text-center">
          <span class="text-8xl font-bold text-[rgba(1,123,50,1)]">{{
            value.statistic
          }}</span>
          <h2 class="text-2xl">{{ value.statistic_title }}</h2>
        </div>
      </div>
    </div>
  </div>
</template>
<style scoped>
@media screen and (max-width: 750px) {
  #media-0 {
    grid-column: span 2 / span 2;
    display: flex;
    height: 150px;
    img {
      height: 150px;
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
    }
    .content-flex {
      width: 100%;
      display: flex;
      justify-content: space-around;
      align-items: center;
    }
  }
  #media-1 {
    grid-row-start: 2;
  }
  #media-2 {
    img {
      height: 250px;
      grid-column: span 3 / span 3;
    }
    grid-column-start: 2;
    grid-row: span 2 / span 2;
  }
  #media-3 {
    grid-column: span 1 / span 2;
    grid-row: span 1 / span 2;
  }
}
</style>
