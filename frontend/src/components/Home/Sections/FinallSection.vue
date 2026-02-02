<script setup></script>

<template>
  <div id="final-section" class="h-[368px]">
    <div id="over-lay" class="h-full flex-col content-center text-center">
      <h1 class="text-white text-2xl md:text-4xl">{{ $t('final-section.title') }}</h1>
      <p class="p-white mt-4 text-[15px] md:text-[20px]">{{ $t('final-section.description') }}</p>
    </div>
  </div>
</template>

<style>
#final-section {
  background-image: url(../../../assets/FinalSection/FinallSection-image.png);
  background-size: cover;
  background-position-y: 42%;
}
#over-lay {
  background: linear-gradient(
    90deg,
    rgba(1, 123, 50, 0.87) 0%,
    rgba(1, 123, 50, 0.3915) 15.5%,
    rgba(1, 123, 50, 0.87) 48.08%
  );
}
</style>
