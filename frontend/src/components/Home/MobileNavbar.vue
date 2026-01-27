<script setup>
import { Bars3Icon, ChatBubbleBottomCenterTextIcon, DevicePhoneMobileIcon, WrenchScrewdriverIcon } from "@heroicons/vue/24/outline";
import { ref } from 'vue';


const open = ref(false);
</script>
<template>
    <div class="fixed bottom-0 w-full bg-[rgba(1,123,50,1)] text-white h-[80px] md:hidden flex justify-around items-center z-30 p-5">
        <button class="mb-2 mr-3 flex flex-col items-center hover:cursor-pointer">
            <Bars3Icon class="h-[30px]" />
            <span>الرئيسية</span>
        </button>
        <button class="mb-2 mr-3 flex flex-col items-center hover:cursor-pointer">
            <WrenchScrewdriverIcon class="h-[30px]" />
            <span>الخدمات</span>
        </button>
        <button class="mb-2 mr-3 flex flex-col items-center hover:cursor-pointer">
            <DevicePhoneMobileIcon class="h-[30px]" />
            <span>الوطني اونلاين</span>
        </button>
        <button class="mb-2 mr-3 flex flex-col items-center hover:cursor-pointer">
            <ChatBubbleBottomCenterTextIcon class="h-[30px]" />
            <span>تواصل معنا</span>
        </button>
    </div>
</template>
