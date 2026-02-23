<script setup>
import { computed } from "vue";
import SocialMedia from "./Sections/GeneralComponents/SocialMedia.vue";

const props = defineProps({
  data: {
    type: Array,
    required: true,
  },
});

const footerData = computed(() => {
  if (!props.data) return null;
  return props.data;
});
// console.log(footerData.value);

</script>
<template>
  <div
    id="footer"
    class="grid md:grid-rows-1 md:grid-cols-4 max-w-[1350px] m-auto py-12"
  >
    <div
      id="footer-logo"
      class="col-start-1 my-5 sm:row-span-2 row-start-4 md:row-start-1 flex justify-center items-center"
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
          <h3 class="list-title">{{ $t("footer-who-are-we.title") }}</h3>
          <ul>
            <li>{{ $t("footer-who-are-we.products") }}</li>
            <li>{{ $t("footer-who-are-we.available-goods") }}</li>
            <li>{{ $t("footer-who-are-we.new-releases") }}</li>
            <li>{{ $t("footer-who-are-we.partners") }}</li>
          </ul>
        </div>
        <div>
          <h3 class="list-title">{{ $t("footer-contact.title") }}</h3>
          <ul>
            <li>{{ $t("footer-contact.customers") }}</li>
            <li>{{ $t("footer-contact.offers") }}</li>
            <li>{{ $t("footer-contact.job-opportunities") }}</li>
            <li>{{ $t("footer-contact.new-releases") }}</li>
          </ul>
        </div>
        <div>
          <h3 class="list-title">{{ $t("footer-questions.title") }}</h3>
          <ul>
            <li>{{ $t("footer-questions.events") }}</li>
            <li>{{ $t("footer-questions.art-exhibition") }}</li>
            <li>{{ $t("footer-questions.offers") }}</li>
            <li>{{ $t("footer-questions.our-community") }}</li>
          </ul>
        </div>
      </div>
      <div class="flex-col justify-center text-center md:hidden row-start-1">
        <ul class="mobile-content">
          <li>{{ $t("footer-mobile.contact") }}</li>
          <li>{{ $t("footer-mobile.quastion") }}</li>
          <li>{{ $t("footer-mobile.who-are-we") }}</li>
          <li>{{ $t("footer-mobile.events") }}</li>
          <li>{{ $t("footer-mobile.comunity") }}</li>
          <li>{{ $t("footer-mobile.new-releases") }}</li>
        </ul>
      </div>
    </div>
    <div
      id="footer-contact"
      class="col-start-4 sm:row-span-1 ml-4 sm:col-span-1 hidden md:block"
    >
      <h3 class="text-[20px]">{{ $t("footer-email.email-title") }}</h3>
      <div
        id="email-div"
        class="flex justify-between items-center border px-3 py-2 my-2"
      >
        <input
          class="w-[80%]"
          :placeholder="$t('footer-email.email-placeholder')"
        />
        <div class="">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            fill="none"
            viewBox="0 0 24 24"
            stroke-width="3"
            stroke="currentColor"
            :class="[
              'size-8 lg:size-10 bg-black text-white cursor-pointer',
              $i18n.locale === 'en' ? 'rotate-180' : '',
            ]"
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
        {{ $t("footer-email.email-description") }}
      </p>
    </div>
    <div id="social" class="flex md:hidden mt-5 mb-8 row-start-5">
      <SocialMedia
        color="rgba(1,123,50,1)"
        spasificIconStyle="border border-[rgba(1,123,50,0.5)]"
      />
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

@media (width <= 768px) {
  #footer {
    grid-template-columns: 1 !important;
    grid-template-rows: 6 !important;
    justify-content: center !important;
    align-items: center !important;
  }

  #footer-logo {
    grid-column: span 1 / span 1 !important;
    grid-row: span 1 / span 1 !important;
    grid-row-start: 4 !important;
  }
  #social {
    margin-bottom: 46px;
  }
}

.mobile-content {
  li {
    cursor: pointer;
    padding-bottom: 24px;
    border-bottom: 1px solid rgba(28, 134, 70, 0.2);
  }
  margin-bottom: 24px;
}

@media screen and (min-width: 768px) and (max-width: 975px) {
  #email-div {
    position: relative;
    [dir="rtl"] svg {
      position: absolute;
      left: 5px;
      top: 4px;
    }
    [dir="ltr"] svg {
      position: absolute;
      right: 5px;
      top: 4px;
    }
  }
}
</style>
