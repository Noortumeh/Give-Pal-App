<script setup>
import SocialMedia from "./Sections/GeneralComponents/SocialMedia.vue";
import UnderFooterLine from "./UnderFooterLine.vue";
</script>
<template>
  <div
    id="footer"
    class="grid md:grid-rows-1 md:grid-cols-4 max-w-[1350px] m-auto py-12"
  >
    <div
      id="footer-logo"
      class="col-start-1 sm:row-span-2 row-start-4 md:row-start-1 flex justify-center items-center"
    >
      <img src="../../assets/Footer/FooterLogo.png" />
    </div>
    <div
      class="md:col-start-2 md:col-span-2 md:pl-24 sm:row-span-3 sm:col-span-1 sm:row-start-1"
    >
      <div
        id="footer-content"
        class="md:flex justify-around items-center w-full hidden"
      >
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
      <div class="flex-col justify-center text-center md:hidden row-start-1">
        <ul class="mobile-content">
          <li>تواصل معنا</li>
          <li>الاسئلة المتكررة</li>
          <li>من نحن</li>
          <li>الفعاليات القادمة</li>
          <li>مجتمعنا</li>
          <li>الاصدارات الجديدة</li>
        </ul>
      </div>
    </div>
    <div
      id="footer-contact"
      class="col-start-4 sm:row-span-1 ml-4 sm:col-span-1 hidden md:block"
    >
      <h3 class="text-[20px]">ابقى معنا على اتصال عن طريق :</h3>
      <div
        class="flex justify-between items-center min-w-[50%] border-1 px-3 my-2"
      >
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
    <div class="flex md:hidden mt-5 row-start-5">
      <SocialMedia color="rgba(1,123,50,1)" borderColor="rgba(1,123,50,0.03)" />
    </div>
  </div>
</template>
<style>
.list-title {
  color: rgba(1, 123, 50, 1);
  margin-bottom: 12px;
  font-weight: bold;
}

li {
  margin-bottom: 10px;
}

#footer-content {
  /* @media (width <= 768px) {
    display: hidden;
  } */
}
#footer{
  @media (width <= 768px) {
    grid-template-columns: 1;
    grid-template-rows: 6;
    justify-content: center;
    align-items: center;
  }
}

.mobile-content{
  li{
    padding-bottom: 24px;
    border-bottom: 1px solid rgba(28, 134, 70, 0.2);
  }
  margin-bottom: 24px;
}

</style>
