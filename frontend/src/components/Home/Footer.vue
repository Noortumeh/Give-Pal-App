<script setup>
import UnderFooterLine from './UnderFooterLine.vue';

</script>
<template>
  <div class="grid grid-rows-1 grid-cols-4 w-[1350px] m-auto py-12">
    <div class="col-start-1">
      <img src="../../assets/FooterLogo.png" />
    </div>
    <div class="col-start-2 col-span-2 w-full flex justify-around items-center pl-24">
      <div>
        <h3 class="list-title">من نحن</h3>
        <ul>
          <li>المنتجات</li>
          <li>السلع المتاحة</li>
          <li>الإصدارات الجديدة</li>
          <li>الشركاء</li>
        </ul>
      </div>
      <div>
        <h3 class="list-title">تواصل معنا</h3>
        <ul>
          <li>خدمة العملاء</li>
          <li>العروض الخاصة</li>
          <li>فرص العمل</li>
          <li>الإصدارات الجديدة</li>
        </ul>
      </div>
      <div>
        <h3 class="list-title">الأسئلة المتكرره</h3>
        <ul>
          <li>الفعاليات القادمة</li>
          <li>المعرض الفني</li>
          <li>العروض المميزة</li>
          <li>مجتمعنا</li>
        </ul>
      </div>
    </div>
    <div class="col-start-4">
      <h3 class="text-[20px]">ابقى معنا على اتصال عن طريق :</h3>
      <div class="flex justify-between items-center w-[80%] border-1 px-3 my-2">
        <input placeholder="البريد الالكتروني" />
        <div class="my-2">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="3"
            stroke="currentColor"
            class="size-10 bg-black text-white"
          >
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              d="M15.75 19.5 8.25 12l7.5-7.5"
            />
          </svg>
        </div>
      </div>
      <p>
        نسعى في عطاء فلسطين لبناء عالم أكثر أمانًا قائمًا على الاحترافية
        والموثوقية.
      </p>
    </div>
  </div>
  <UnderFooterLine />
</template>
<style>
    .list-title{
        color: rgba(1,123,50,1) ;
        margin-bottom: 12px;
        font-weight: bold;
    }

    li{
        margin-bottom: 10px;
    }
</style>
