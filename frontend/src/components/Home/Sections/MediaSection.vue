<script setup>
import { API_HEADER } from "@/APIs/ApiHeader";
import { mediaSection } from "@/APIs/EndPoints";
import Title from "@/components/Title.vue";
import { onMounted, ref } from "vue";

const data = ref([]);

const formatDate = (date) => {
  return new Intl.DateTimeFormat('ar', {
    day: 'numeric',
    month: 'long',
    year: 'numeric',
  }).format(new Date(date))
}

onMounted(async () => {
  try {
    const res = await fetch(mediaSection, {
      method: "GET",
      headers: API_HEADER,
    });
    if (res.ok) {
      data.value = await res.json();
      console.log("Media Data: ", data.value);
    }
  } catch (err) {
    console.log("Faild to load Media Data", err);
  }
});
</script>
<template>
  <Title title="الميديا" />
  <div class="flex justify-center items-center py-12">
    <div class="grid grid-cols-4 grid-rows-2 gap-5 h-[600px] w-[1250px] overflow-x-scroll">
      <div
        v-for="value in data"
        :key="value.id"
        :id="[`media-${data.indexOf(value)}`]"
        class="grid grid-cols-1 grid-rows-1 overflow-visible"
      >
        <img
          :src="`http://127.0.0.1:8000/storage/${value.media}`"
          class="h-full w-full col-start-1 row-start-1 object-cover"
        />
        <div
          class="col-start-1 row-start-1 z-10 place-self-auto p-4 flex-col content-end"
        >
          <span class="text-white">{{ formatDate(value.date) }}</span>
          <h2 class="text-white text-2xl text-bold">{{ value.title }}</h2>
          <span class="text-white text-[14px]">{{ value.dsecription }}</span>
        </div>
      </div>
    </div>
  </div>
</template>

<style scoped>
#media-0 {
  grid-column: span 1 / span 2;
  grid-row: span 1 / span 2;
}
#media-1 {
  grid-row-start: 2;
}
#media-2 {
  grid-column-start: 2;
  grid-row: span 2 / span 2;
}
#media-3 {
  grid-column: span 2 / span 2;
  img{
    height: 290px;
  }
}
#media-4 {
  img{
    height: 290px;
    
  }
}
#media-5 {
  img{
    height: 290px;
  }
}
</style>
