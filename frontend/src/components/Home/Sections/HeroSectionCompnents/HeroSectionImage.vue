<script setup>
import Title from "@/components/Title.vue";
</script>
<template>
  <div
    :class="['mb-5 relative overflow-hidden h-[490px] w-full flex items-center shadow-[10px_10px_30px_rgba(0,0,0,0.05)]', 'justify-end']"
  >
    <img
      id="left-image"
      class="object-contain absolute left-[-125px] top-[-160px] w-[65%]"
      src="@/assets/HeroSectionImage.png"
      alt="Hero section image"
    />

    <img
      id="bg-image"
      src="@/assets/bg-image.png"
      class="absolute right-0 z-1 w-[56%] h-full"
      alt=""
    />
    <div id="content" :class="['relative z-3 w-20% max-w-[700px]', $i18n.locale === 'en' ? 'mr-8' : 'mr-5 lg:mr-12']">
      <span class="text-[rgba(1,123,50,1)]">{{ $t("hero.message") }}</span>
      <div >
        <Title
          :title="$t('hero.title')"
          :underLineWidth= "$i18n.locale === 'ar' ? 'width: 250px' : 'width: 180px'"
          :description="$t('hero.description')"
          titleWidth = 'font-size: 25px'
        />
      </div>
    </div>
  </div>
</template>
<style scoped>
@media screen and (max-width: 1650px) {
  #content{
    max-width: 40%;
  }
} 
@media screen and (min-width: 880px) and (max-width: 980px) {
  #left-image {
    left: -110px;
  }
}

@media screen and (max-width: 880px) {
  #left-image {
    left: -90px;
    top: -100px;
  }
}

@media screen and (max-width: 765px) {
  #left-image {
    left: -50px;
    top: -30px;
  }
}

@media screen and (max-width: 605px) {
  #left-image {
    left: -130px;
    top: 0px;
    height: 100%;
    width: 100%;
  }
  #content {
  }
}
</style>
