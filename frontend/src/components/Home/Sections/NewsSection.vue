<script setup>
import Title from "@/components/Title.vue";
import { API_HEADER } from "@/APIs/ApiHeader";
import { onMounted, ref } from "vue";
import { newsSection } from "@/APIs/EndPoints";

const data = ref([]);

onMounted(async () => {
  try {
    const res = await fetch(newsSection, {
      method: "GET",
      headers: API_HEADER,
    });
    if (res.ok) {
      data.value = await res.json();
      console.log("News Data: ", data.value);
    }
  } catch (err) {
    console.log("Faild to load News Data", err);
  }
});
</script>
<template>
  <div class="my-12">
    <div>
      <div class="text-start pr-5 pt-5">
        <Title
          title="الأخبار"
          description="تابع آخر أخبار وإنجازات جمعية عطاء فلسطين، من مبادرات إنسانية ومشاريع تنموية إلى قصص النجاح التي نصنعها معًا في الميدان. هنا نشارككم الأمل، التقدّم، وكل "
        />
      </div>
      <div class="grid grid-rows-1 grid-cols-3 gap-15 mt-8 overflow-x-scroll">
        <div
          v-for="value in data"
          :key="value.id"
          class="grid w-full ounded-xl shadow-xl overflow-visible relative"
        >
          <img
            class="w-full h-full object-cover"
            :src="`http://127.0.0.1:8000/storage/${value.image}`"
          />
          <div
            class="absolute place-self-end card-backgraound p-4 shadow-2xl h-[45%] max-w-[90%] -translate-x-8 translate-y-7 z-10"
          >
            <div class="flex justify-between items-center mb-3">
              <div class="bg-[rgba(1,123,50,1)] p-1.5 px-7 text-white">{{ value.date }}</div>
              <span class="text-[rgba(102,102,102,1)]">#{{ value.address }}</span>
            </div>
            <h2 class="text-2xl text-bold">{{ value.title }}</h2>
            <p class="text-sm">{{ value.description }} <span class="text-[rgba(1,123,50,1)] text-bold">معرفة المزيد.</span></p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<style>
#bg-card {
  background-image: url("http://127.0.0.1:8000/storage/news-images/9Z8Dz43Q4TpsCQWqoyRhFDCRvsXwwT2mJZrtPxLo.png");
}

.card-backgraound {
  background: linear-gradient(
    255.19deg,
    rgba(255, 255, 255, 0.69) 0.08%,
    #ffffff 82.17%
  );
}
</style>
