<script setup>
import { Disclosure } from "@headlessui/vue";

const navigation = [
  { name: "من نحن", href: "#", current: true },
  { name: "الخدمات", href: "#", current: false },
  { name: "المشاريع", href: "#", current: false },
  { name: "قصص النجاح", href: "#", current: false },
  { name: "المتجر", href: "#", current: false },
  { name: "الاعلام", href: "#", current: false },
  { name: "الشركاء والممولين", href: "#", current: false },
  { name: "التقارير", href: "#", current: false },
  { name: "اتصل بنا", href: "#", current: false },
];
</script>

<template>
  <Disclosure
    as="nav"
    id="navbar"
    class="relative shadow-md after:pointer-events-none after:absolute after:inset-x-0 after:bottom-0 after:h-px after:bg-white/10"
    v-slot="{ open }"
  >
    <div class="mx-auto px-2 sm:px-6 lg:px-8 h-16 w-full hidden md:flex items-center justify-between">
      <!-- <div class="relative flex  items-center justify-between"> -->
        <div class="flex flex-1 items-center justify-center md:items-stretch ">
          <!-- <div class="hidden md:block"> -->
            <div class="flex space-x-2 ">
              <a
                v-for="item in navigation"
                :key="item.name"
                :href="item.href"
                class="text-black rounded-md sm:px-0 md:px-3 xl:px-5.5 py-2  "
                :aria-current="item.current ? 'page' : undefined"
                >{{ item.name }}</a
              >
            </div>
          </div>
        <!-- </div> -->
      <!-- </div> -->
    </div>
  </Disclosure>
</template>
<style scoped>
@media screen and (max-width: 805px) {
  #navbar {
    font-size: 14px;
  }
}
</style>
