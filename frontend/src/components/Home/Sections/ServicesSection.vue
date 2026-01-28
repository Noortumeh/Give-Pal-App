<script setup>
import { API_HEADER } from "@/APIs/ApiHeader";
import { servicesSection } from "@/APIs/EndPoints";
import Title from "@/components/Title.vue";
import { onMounted, ref } from "vue";
const data = ref([]);

onMounted(async () => {
  try {
    const res = await fetch(servicesSection, {
      method: "GET",
      headers: API_HEADER,
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
  <div class="text-end p-5">
    <Title title="خدمات عطاء" underLineWidth="width: 170px" />
  </div>
  <div v-if="!data">
    <p class="mt-5 text-center text-3xl">لايوحد خدمات لعرضها بعد!</p>
  </div>
  <div
    v-else
    class="flex flex-wrap gap-4 justify-around content-center text-center mt-5 services-section"
  >
    <div
      v-for="service in data"
      :id="[`media-${data.indexOf(service)}`]"
      :key="service.title"
      class="flex-col justify-center content-center w-[437px] max-h-[345px] p-3 border-[2px] border-[rgba(1,123,50,0.25)] border-[solid]"
    >
      <div class="flex justify-center content-center">
        <img
          class="max-w-[94px] max-h-[83px] mb-2"
          :src="`http://127.0.0.1:8000/storage/${service.icon}`"
          :alt="service.title"
        />
      </div>
      <div id="content" class="flex-col">
        <h2 class="font-bold text-[20px] pb-2">{{ service.title }}</h2>
        <p class="w-[372px] h-[104px]">
          {{ service.description }}
        </p>
      </div>
    </div>
  </div>
</template>
<style scoped>
@media screen and (max-width: 830px) {
  .services-section {
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-template-rows: auto auto;
    justify-items: center;
    align-items: center;
    gap: 15px;
    /* grid-area: 
        "media-0 media-0"
        "media-1 media-2"
      ; */
  }
  .services-section #media-0 {
    border-radius: 20px;
    width: 90% !important;
    grid-column: span 2 / span 2 !important;
    display: flex;
    flex-direction: row;
    justify-content: start;
    align-items: center;
    
    #content {
      display: flex;
      flex-direction: column;
      align-items: start;
      margin-right: 10px;

      p{
        width: 100%
      }
      h2{
        margin-right: 8px;
      }
    }
  }
  .services-section #media-1 {
    margin-right: auto;
    border-radius: 20px;
    width: 90%;
    height: 180px;
    grid-column: span 1 / span 2;
    p {
      display: none;
    }
  }
  .services-section #media-2 {
    margin-left: auto;
    border-radius: 20px;
    width: 90%;
    height: 180px;
    grid-column: span 1 / span 2;
    
    p {
      display: none;
    }
  }
}
</style>
