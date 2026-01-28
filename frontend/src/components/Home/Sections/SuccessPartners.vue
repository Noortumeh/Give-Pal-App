<script setup>
import { API_HEADER } from "@/APIs/ApiHeader";
import { successPartners } from "@/APIs/EndPoints";
import Title from "@/components/Title.vue";
import { onMounted, ref } from "vue";

const data = ref([]);
const duplicatedLogos = ref([]);

const logos = [
  "slack",
  "framer",
  "netflix",
  "google",
  "linkedin",
  "instagram",
  "facebook",
];

onMounted(async () => {
  try {
    const res = await fetch(successPartners, {
      method: "GET",
      headers: API_HEADER,
    });
    if (res.ok) {
      data.value = await res.json();
      duplicatedLogos.value = [...data.value, ...data.value];
      console.log("Success Partners Data: ", data.value);
    }
  } catch (err) {
    console.log("Faild to load Success Partners Data", err);
  }
});

console.log(duplicatedLogos.value);
</script>

<template>
  <div class="my-12 max-w-[1350px] mx-auto px-0">
    <div class="mr-5">
      <Title title="شركاء النجاح" underLineWidth="width: 160px" />
    </div>
    <p v-if="!data" class="mt-5 text-center text-3xl">
      لايوحد شركاء نجاح لعرضهم بعد!
    </p>
    <div class="overflow-hidden w-full relative mx-auto select-none py-20">
      <div
        class="absolute left-0 top-0 h-full w-20 z-10 pointer-events-none bg-gradient-to-r from-white to-transparent"
      ></div>

      <div class="marquee-inner flex min-w-[200%]">
        <div
          v-for="(logo, index) in duplicatedLogos"
          class="ml-4 border-2 border-[rgba(140,140,140,0.5)] flex justify-center"
        >
          <img
            :key="index"
            :src="`http://127.0.0.1:8000/storage/${logo.icon}`"
            :alt="logo.icon"
            class="max-h-[190px] w-[190px] object-contain select-none"
            draggable="false"
          />
        </div>
      </div>

      <div
        class="absolute right-0 top-0 h-full w-20 md:w-40 z-10 pointer-events-none bg-gradient-to-l from-white to-transparent"
      ></div>
    </div>
  </div>
</template>

<style>
.marquee-inner {
  animation: marqueeScroll 20s linear infinite;
}

@keyframes marqueeScroll {
  0% {
    transform: translateX(100%);
  }
  100% {
    transform: translateX(-50%);
  }
}
</style>
