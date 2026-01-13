<script setup>
import { onMounted, ref } from "vue";
const data = ref([]);

onMounted(async () => {
  try {
    const res = await fetch("http://127.0.0.1:8000/services", {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
        "access-control-allow-credentials": "true",
      },
    });
    if (res.ok) {
      data.value = await res.json();
      console.log('Services Data: ', data.value);
    }
  } catch (err) {
    console.log("Faild to load Service Data", err);
  }
});
</script>
<template>
  <div class="text-end p-5">
    <h1 class="text-3xl font-semibold text-start">خدمات عطاء</h1>
  </div>
  <div class="flex flex-wrap gap-4 justify-around content-center text-center">
    <div
      v-for="service in data"
      :key="service.title"
      class="flex-col justify-center content-center max-w-[437px] max-h-[345px] p-3 border-[0.25px] border-[rgba(1,123,50,0.5)] border-[solid]"
    >
      <div class="flex justify-center content-center">
        <img
          class="max-w-[94px] max-h-[83px] mb-2"
          :src="`http://127.0.0.1:8000/storage/${service.icon}`"
          :alt=service.title
        />
      </div>
      <h2 class="font-bold text-[20px] pb-2">{{ service.title }}</h2>
      <p class="w-[372px] h-[104px]">
        {{ service.description }}
      </p>
    </div>
  </div>
</template>
