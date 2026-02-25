<script setup>
import Button from "@/components/Button.vue";
import Title from "@/components/Title.vue";

const props = defineProps({
  data: {
    type: Array,
  }
})
</script>

<template>
  <div id="success-stories" class="h-[622px] my-12 w-full">
    <div id="mobile-title" class="mr-5 pl-5 pt-2">
      <Title
        :title="$t('titles.success-stories.title')"
        :underLineWidth="
          $i18n.locale === 'ar' ? 'width: 160px' : 'width: 220px'
        "
      />
    </div>
    <div
      id="container"
      class="max-w-[1350px] h-full mx-auto md:grid md:grid-cols-3 md:grid-rows-1"
    >
      <div id="title-container" class="w-[525px] h-[252px] content-center">
        <div class="text-start pr-5 pt-5">
          <Title
            :title="$t('titles.success-stories.title')"
            :underLineWidth="
              $i18n.locale === 'ar' ? 'width: 160px' : 'width: 220px'
            "
            :description="$t('titles.success-stories.description')"
            id="p-black"
          />
          <Button :title="$t('titles.success-stories.button')" />
        </div>
      </div>

      <div
        id="stories"
        class="block md:grid md:grid-cols-6 md:grid-rows-6 h-full md:h-full gap-8 col-span-2 w-full relative"
      >
        <div
          v-for="value in data"
          :id="[`grid-${data.indexOf(value)}`]"
          class="relative shadow-2xl h-full"
        >
          <img
            class="border-[color:rgba(1,123,50,1)] border-2 border-solid rounded-full w-[60px] h-[60px] absolute -right-8 top-8 z-1"
            :src="`${value.file_path}`"
          />
          <div
            id="card-content"
            :class="[
              'bg-white h-full pt-1',
              $i18n.locale === 'en' ? 'pr-0 pl-10' : 'pr-10',
            ]"
          >
            <span class="text-[color:rgba(1,123,50,1)]">{{
              value.address.substring(0,50)
            }}</span>
            <h3 class="font-bold text-2xl size-9 w-full">{{ value.title.substring(0,50) }}</h3>
            <p class="w-[80%] mt-1">
              {{ value.description.substring(0,220) }}
            </p>
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
        {{ $t("buttons.name") }}
      </button>
    </div>
  </div>
</template>

<style scoped>
#mobile-title {
  display: none;
}
[dir="ltr"] #stories {
    right: 50px;
  }
@media screen and (max-width: 1200px) {
  [dir="ltr"] #stories {
    right: 40px;
  }
  #title-container{
    width: 480px;
  }

}
#success-stories {
  background-image: url("../../../assets/bg-success-stories.png");

  @media screen and (max-width: 1200px) {
    background-image: url("../../../assets/scuseess-stories-mobile.png");
    background-size: cover;
    height: 574px !important;
  }
}
#grid-0 {
  grid-column-start: 2 !important;
  grid-row-start: 2 !important;
  grid-column: span 2 / span 2;
  grid-row: span 3 / span 3;
  max-height: 105%;
}

#grid-1 {
  grid-row-start: 5;
  grid-column-start: 1;
  grid-column: span 3 / span 3;
  grid-row: span 2 / span 2;
  height: 110%;
}

#grid-2 {
  grid-row-start: 1 !important;
  grid-column-start: 4 !important;
  grid-row: span 2 / span 2;
  grid-column: span 3 / span 3;
  height: 100%;
}

#grid-3 {
  grid-column: span 2 / span 2;
  grid-row: span 3 / span 3;
  grid-row-start: 3;
  grid-column-start: 4;
  
  height: 100%;
}

@media screen and (max-width: 1100px) {
  #more-button {
    display: flex;
  }
  #success-stories {
    display: flex !important;
    flex-direction: column;
    justify-content: center;
    align-items: start;
    height: 100%;
    margin-bottom: 50px;
    font-size: 12px;
    h3 {
      font-size: 18px;
    }
  }
  #mobile-title {
    display: block;
  }
  #title-container {
    display: none;
  }
  #stories {
    overflow: visible;
  }
  [dir="rtl"] #grid-0 {
    position: absolute;
    height: 280px;
    width: 350px;
    right: 50px;
    bottom: 50px;

    #card-content {
      padding-top: 20px;
    }
  }
  [dir="ltr"] #grid-0 {
    position: absolute;
    height: 280px;
    width: 350px;
    left: 50px;
    bottom: 50px;

    #card-content {
      padding-top: 20px;
    }
  }
  [dir="rtl"] #grid-1 {
    position: absolute;
    height: 280px;
    width: 350px;
    top: 150px;
    right: -150px;

    p {
      height: 200px;
      overflow: hidden;
    }
    #card-content {
      padding-top: 20px;
    }
  }

  [dir="ltr"] #grid-1 {
    position: absolute;
    height: 280px;
    width: 350px;
    top: 150px;
    left: -150px;

    p {
      height: 200px;
      overflow: hidden;
    }
    #card-content {
      padding-top: 20px;
    }
  }

  #grid-2 {
    display: none;
  }

  #grid-3 {
    display: none;
  }
}

@media screen and (max-width: 768px) {
  [dir="rtl"] #grid-0 {
    right: -90px;
    top: 0px;
    width: 300px;
  }

  [dir="ltr"] #grid-0 {
    left: -90px;
    top: 0px;
    width: 300px;
  }

  [dir="rtl"] #grid-1 {
    right: -220px;
    width: 300px;
    top: 150px;
  }

  [dir="ltr"] #grid-1 {
    left: -220px;
    width: 300px;
    top: 150px;
  }
}

@media screen and (max-width: 615px) {
  #grid-1 {
    p {
      font-size: 12px;
    }
  }
}
</style>
