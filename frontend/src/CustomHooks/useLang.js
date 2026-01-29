import { computed } from "vue";
import { useRoute, useRouter } from "vue-router";

export function useLang() {
  const route = useRoute();
  const router = useRouter();

  const lang = computed(() => route.query.lang || 'ar');
  const setLang = (newLang) => {
    router.push({
      query: { ...route.query, lang: newLang },
    });
  };

  return { lang, setLang };
}
