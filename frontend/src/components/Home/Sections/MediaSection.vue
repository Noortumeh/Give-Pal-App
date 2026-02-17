<script setup>
import Title from "@/components/Title.vue";

// const data = ref([]);
const props = defineProps({
  data: {
    type: Array,
  }
})

const formatDate = (date) => {
  return new Intl.DateTimeFormat("ar", {
    day: "numeric",
    month: "long",
    year: "numeric",
  }).format(new Date(date));
};

// onMounted(async () => {
//   try {
//     const res = await fetch(mediaSection, {
//       method: "GET",
//       headers: API_HEADER,
//     });
//     if (res.ok) {
//       data.value = await res.json();
//       console.log("Media Data: ", data.value);
//     }
//   } catch (err) {
//     console.log("Faild to load Media Data", err);
//   }
// });
</script>
<template>
  <div class="mr-5 pl-5">
    <Title :title="$t('titles.media')" underLineWidth="width: 90px" />
  </div>
  <div class="flex justify-center items-center py-12">
    <div
      id="media-container"
      class="grid grid-cols-4 grid-rows-2 gap-5 h-[600px] w-[1250px]"
    >
      <div
        v-for="value in data"
        :key="value.id"
        :id="[`media-${data.indexOf(value)}`]"
        class="grid grid-cols-1 grid-rows-1 overflow-visible"
      >
        <img
          :src="`${value.file_path}`"
          class="h-full w-full col-start-1 row-start-1 object-cover"
        />
        <div
          class="col-start-1 row-start-1 z-10 place-self-auto p-4 flex-col content-end"
        >
          <span class="text-white">{{ formatDate(value.date) }}</span>
          <h2 class="text-white text-2xl text-bold">{{ value.title }}</h2>
          <span class="text-white text-[14px]">{{ value.description.substring(0,80) }}</span>
        </div>
      </div>
    </div>
  </div>
  <div
    id="more-button"
    class="md:hidden flex justify-center items-center w-full py-5"
  >
    <button
      class="text-[rgba(1,123,50,1)] border border-[rgba(1,123,50,1)] py-2 px-10 text-bold"
    >
      {{ $t('buttons.name') }}
    </button>
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
  img {
    height: 290px;
  }
}
#media-4 {
  img {
    height: 290px;
  }
}
#media-5 {
  img {
    height: 290px;
  }
}

@media screen and (max-width: 1200px) {
  #more-button {
    display: flex;
  }
  #media-container {
    padding-inline: 10%;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    grid-template-rows: repeat(3, minmax(0, 340px));
    height: auto;
    span {
      display: none;
    }
    h2 {
      display: none;
    }
  }
  #media-0 {
    grid-column: span 2 / span 2;
    grid-row: span 1 / span 1;
  }
  #media-1 {
    grid-column: span 1 / span 1;
    grid-row: span 1 / span 1;
    grid-column-start: 2;
  }
  #media-2 {
    grid-column: span 1 / span 1;
    grid-row: span 2 / span 2;
    grid-column-start: 1;
    grid-row-start: 2;
  }
  #media-3 {
    grid-column: span 1 / span 1;
    grid-row: span 1 / span 1;
    grid-column-start: 2;
    grid-row-start: 3;

    img {
      height: 100%;
    }
  }
  #media-4 {
    display: none;
  }
  #media-5 {
    display: none;
  }
}
</style>
