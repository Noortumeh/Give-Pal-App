<script setup>
import Title from "@/components/Title.vue";

const props = defineProps({
  data: {
    type: Array,
  }
})

// const data = ref([]);

// onMounted(async () => {
//   try {
//     const res = await fetch(statisticsSection, {
//       method: "GET",
//       headers: API_HEADER,
//     });
//     if (res.ok) {
//       data.value = await res.json();
//       console.log("Statistics Data: ", data.value);
//     }
//   } catch (err) {
//     console.log("Faild to load Statistics Data", err);
//   }
// });

console.log(props.data);
</script>
<template>
  <div
    id="statistic-section"
    class="grid md:grid-cols-1 md:grid-rows-5 lg:grid-cols-3 lg:grid-rows-1 gap-5 place-items-center m-5 md:mt-24"
  >
    <div
      id="mobile-title"
      class="row-span-1 text-start md:col-span-1 lg:col-span-1 hidden w-full"
    >
      <Title :title="$t('titles.statistics.title')" underLineWidth="width: 150px" />
    </div>
    <div class="hidden lg:block row-span-1 md:col-span-1 lg:col-span-1">
      <Title
        :title="$t('titles.statistics.title')"
        underLineWidth="width: 150px"
        :description="$t('titles.statistics.description')"
      />
    </div>
    <div
      id="statistics-container"
      class="md:row-span-4 lg:row-span-1 md:col-span-1 lg:col-span-2 grid sm:grid-rows-3 grid-cols-2 md:grid-rows-2 justify-center place-items-center gap-5 m-5 md:w-[650px]"
    >
      <div
        v-for="value in data"
        :id="[`media-${data.indexOf(value)}`]"
        :key="value.title"
        class="border border-[rgba(1,123,50,0.25)] md:shadow-2xl col-span-1 row-span-1 grid grid-cols-3 grid-rows-3 auto-rows-fr w-full h-full"
      >
        <img
          class="col-span-3"
          :src="`${value.file_path}`"
        />
        <div class="content-flex col-span-3 content-center text-center">
          <span class="text-8xl font-bold text-[rgba(1,123,50,1)]">{{
            value.description
          }}</span>
          <h2 class="text-2xl">{{ value.title }}</h2>
        </div>
      </div>
    </div>
  </div>
</template>
<style scoped>
@media screen and (max-width: 1100px) {
    #statistic-section{
      margin-top: 0px;
    }
}
@media screen and (max-width: 1023px) {
  #mobile-title {
    display: block;
  }
}
@media screen and (max-width: 850px) {
  #statistics-container {
    grid-template-columns: repeat(2, minmax(0, 1fr));
    grid-template-rows: repeat(3, minmax(150px, 300px));
    align-items: start;
  }
  #media-0 {
    border-radius: 20px;
    grid-column: span 2 / span 2;
    display: flex;
    /* height: 150px; */
    img {
      height: 200px;
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
    border-radius: 20px;
    grid-row-start: 2;
  }
  #media-2 {
    border-radius: 20px;
    img {
      height: 250px;
      grid-column: span 3 / span 3;
    }
    grid-column-start: 2;
    grid-row: span 2 / span 2;
  }
  #media-3 {
    border-radius: 20px;
    grid-column: span 1 / span 2;
    grid-row: span 1 / span 2;
  }
}
</style>
