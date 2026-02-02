<script setup>
import Title from "@/components/Title.vue";
import { API_HEADER } from "@/APIs/ApiHeader";
import { onMounted, ref } from "vue";
import { newsSection } from "@/APIs/EndPoints";

import { Swiper, SwiperSlide } from "swiper/vue";
import { Navigation } from "swiper/modules";
import "swiper/css";
import "swiper/css/navigation";

const data = ref([]);
const modules = [Navigation];

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
      <div class="text-start pr-5 pt-5 w-[80%]">
        <Title
          underLineWidth="width: 90px"
          :title="$t('titles.news.title')"
          :description="$t('titles.news.description')"
        />
      </div>
      <div id="news" class="grid grid-rows-1 grid-cols-3 gap-15 my-8">
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
            class="absolute place-self-end card-backgraound p-4 shadow-2xl h-[50%] w-[90%] -translate-x-8 translate-y-7 z-10"
          >
            <div class="flex justify-between items-center mb-3">
              <div class="bg-[rgba(1,123,50,1)] p-1.5 px-7 text-white">
                {{ value.date }}
              </div>
              <span class="text-[rgba(102,102,102,1)]"
                >#{{ value.address }}</span
              >
            </div>
            <h2 class="text-2xl text-bold">{{ value.title }}</h2>
            <p class="text-sm">
              {{ value.description }}
              <span class="text-[rgba(1,123,50,1)] text-bold"
                >معرفة المزيد.</span
              >
            </p>
          </div>
        </div>
      </div>
      <div id="swiper" class="hidden w-[80%] m-auto">
        <Swiper :navigation="true" :modules="modules" class="mySwiper">
          <swiper-slide v-for="value in data" :key="value.id">
            <div
              class="flex-col md:w-[50%] w-[70%] h-[50%] m-5 ounded-xl shadow-xl overflow-visible relative"
            >
              <img
                class="w-full max-h-[300px] object-cover"
                :src="`http://127.0.0.1:8000/storage/${value.image}`"
              />
              <div class="card-backgraound p-4 shadow-2xl text-start">
                <div class="flex justify-between items-center mb-3">
                  <div class="bg-[rgba(1,123,50,1)] md:p-1.5 md:px-7 text-white px-1">
                    {{ value.date }}
                  </div>
                  <span class="text-[rgba(102,102,102,1)] text-[16px] md:text-[24px]"
                    >#{{ value.address }}</span
                  >
                </div>
                <h2 class="text-2xl text-bold">{{ value.title }}</h2>
                <p class="text-sm hidden md:block">
                  {{ value.description }}
                  <span class="text-[rgba(1,123,50,1)] text-bold"
                    >معرفة المزيد.</span
                  >
                </p>
              </div>
            </div>
          </swiper-slide>
        </Swiper>
      </div>
    </div>
  </div>
</template>
<style scoped>
@media screen and (max-width: 1430px) {
  #swiper{
    display: block;
  }

  #news {
    display: none;
  }
}

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
/* Swiper Style */
#app {
  height: 100%;
}
html,
body {
  position: relative;
  height: 100%;
}

body {
  background: #000;
  font-family:
    Helvetica Neue,
    Helvetica,
    Arial,
    sans-serif;
  font-size: 14px;
  color: #fff;
  margin: 0;
  padding: 0;
}
.swiper {
  width: 100%;
  height: 100%;
}

.swiper-slide {
  text-align: center;
  font-size: 18px;
  /* background: #444; */

  /* Center slide text vertically */
  display: flex;
  justify-content: center;
  align-items: center;
}

.swiper-slide img {
  display: block;
  width: 100%;
  height: 100%;
  object-fit: cover;
}
</style>
