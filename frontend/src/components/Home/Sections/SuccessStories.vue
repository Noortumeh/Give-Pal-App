<script setup>
import { API_HEADER } from "@/APIs/ApiHeader";
import { successStoriesSection } from "@/APIs/EndPoints";
import Button from "@/components/Button.vue";
import Title from "@/components/Title.vue";
import { onMounted, ref } from "vue";

const data = ref([]);

onMounted(async () => {
  try {
    const res = await fetch(successStoriesSection, {
      method: "GET",
      headers: API_HEADER,
    });
    if (res.ok) {
      data.value = await res.json();
      console.log("Success Stories Data: ", data.value);
    }
  } catch (err) {
    console.log("Faild to load Success Stories Data", err);
  }
});
</script>

<template>
  <div id="success-stories" class="h-[622px] my-12">
    <div
      class="max-w-[1350px] h-full mx-auto grid grid-cols-3 grid-rows-1 items-center"
    >
      <div class="w-[525px] h-[252px] content-center">
        <div class="text-start pr-5 pt-5">
          <Title
            title="قصص نجاح"
            description='
      تسعى "عطاء فلسطين” لتوفير مجتمع آمن وفعّال يتّسم بالإنتاجية، وقد
          انطلقت أولى مجتمعات "دار الرجاء" تسعى "عطاء فلسطين”
          '
            id="p-black"
          />
          <Button title="معرفة المزيد" />
        </div>
      </div>

      <div class="grid grid-cols-3 grid-rows-3 h-[600px] w-[480px] gap-5">
        <div class="relative col-start-2 row-start-1 row-span-2 col-span-2">
          <img
            class="border-[color:rgba(1,123,50,1)] border-2 border-solid rounded-full w-[60px] h-[60px] absolute -right-8 top-8 z-1"
            src="../../../assets/logo.png"
          />
          <div class="bg-white pr-10 h-full content-center pb-8">
            <span class="text-[color:rgba(1,123,50,1)]">فلسطين-الخليل</span>
            <h3 class="font-bold text-2xl size-9 w-full">مؤمن البسطامي</h3>
            <p class="w-[80%] mt-3">
              في عام 2020، كانت مسابقة "أصوات جديدة" نقطة تحول في مسيرتي
              الأدبية. بعد أن حصلت على المركز الثالث على مستوى البلاد، شعرت
              بدفعة قوية من الحماس والطموح. بدأت أبحث عن مسابقات أدبية أخرى
              تتناسب عن مسابقات أدبية أخرى تتناسب عن مسابقات أدبية أخرى تتناسب
            </p>
          </div>
        </div>
        <div class="relative col-span-3 row-start-3 shadow-2xl">
          <img
            class="border-[color:rgba(1,123,50,1)] border-2 border-solid rounded-full w-[60px] h-[60px] absolute -right-8 top-7 z-1"
            src="../../../assets/logo.png"
          />
          <div class="bg-white p-7">
            <span class="text-[color:rgba(1,123,50,1)] mr-2"
              >فلسطين-الخليل</span
            >
            <h3 class="font-bold text-2xl size-9 w-full mr-2">مؤمن البسطامي</h3>
            <p class="mr-2 mt-3">
              في عام 2020، كانت مسابقة "أصوات جديدة" نقطة تحول في مسيرتي
              الأدبية. بعد أن حصلت على المركز الثالث على مستوى البلاد، شعرت
              بدفعة قوية من الحماس والطموح. بدأت أبحث عن مسابقات أدبية أخرى
              تتناسب عن مسابقات أدبية أخرى تتناسب عن مسابقات أدبية أخرى تتناسب
            </p>
          </div>
        </div>
      </div>
      <div
        class="grid grid-cols-3 grid-rows-3 h-[660px] w-[480px] gap-5 mr-16 mb-15"
      >
        <div class="relative col-start-1 row-start-1 row-span-1 col-span-3">
          <img
            class="border-[color:rgba(1,123,50,1)] border-2 border-solid rounded-full w-[60px] h-[60px] absolute -right-8 top-3 z-1"
            src="../../../assets/logo.png"
          />
          <div class="bg-white pr-10 h-full content-center">
            <span class="text-[color:rgba(1,123,50,1)]">1فلسطين-الخليل</span>
            <h3 class="font-bold text-2xl size-9 w-full">مؤمن البسطامي</h3>
            <p class="w-[80%] mt-3">
              في عام 2020، كانت مسابقة "أصوات جديدة" نقطة تحول في مسيرتي
              الأدبية. بعد أن حصلت على المركز الثالث على مستوى البلاد، شعرت
              بدفعة قوية من الحماس والطموح. بدأت أبحث عن مسابقات أدبية أخرى
              تتناسب عن مسابقات أدبية أخرى تتناسب عن مسابقات أدبية أخرى تتناسب
            </p>
          </div>
        </div>
        <div class="relative col-span-2 row-span-2 row-start-2 shadow-2xl">
          <img
            class="border-[color:rgba(1,123,50,1)] border-2 border-solid rounded-full w-[60px] h-[60px] absolute -right-8 top-7 z-1"
            src="../../../assets/logo.png"
          />
          <div class="bg-white p-7 h-full">
            <span class="text-[color:rgba(1,123,50,1)] mr-2"
              >فلسطين-الخليل</span
            >
            <h3 class="font-bold text-2xl size-9 w-full mr-2">مؤمن البسطامي</h3>
            <p class="mr-2 mt-3 w-[80%]">
              في عام 2020، كانت مسابقة "أصوات جديدة" نقطة تحول في مسيرتي
              الأدبية. بعد أن حصلت على المركز الثالث على مستوى البلاد، شعرت
              بدفعة قوية من الحماس والطموح. بدأت أبحث عن مسابقات أدبية أخرى
              تتناسب عن مسابقات أدبية أخرى تتناسب عن مسابقات أدبية أخرى تتناسب
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<style>
#success-stories {
  background-image: url("../../../assets/bg-success-stories.png");
}
</style>
