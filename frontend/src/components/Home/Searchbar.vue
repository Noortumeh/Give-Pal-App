<script setup>
import { MagnifyingGlassIcon } from "@heroicons/vue/24/outline";
import { BASE_URL, getApiHeader } from "@/APIs/ApiHeader";
import { useLang } from "@/CustomHooks/useLang";
import { useSearch } from "@/CustomHooks/useSearch";
import { ref } from "vue";

const input = ref("");
const openSearch = ref(false);
const { setSearch, setResults } = useSearch();
const { lang } = useLang();

let searchTimer = null;

const props = defineProps({
  iconStyle: {
    type: String,
    default: "",
  },
  bgStyle: {
    type: String,
    default: "",
  },
});

const fetchSearch = async () => {
  if (!input.value) {
    setResults([]);
    return;
  }

  try {
    const res = await fetch(
      `${BASE_URL}/search/?locale=${lang.value}&search=${input.value}`,
      {
        method: "GET",
        headers: getApiHeader(lang.value),
      }
    );

    if (res.ok) {
      const json = await res.json();
      setResults(json.data);
    }
  } catch (err) {
    console.error("Error fetching search results:", err);
  }
};

const handleSearch = () => {
  setSearch(input.value);

  clearTimeout(searchTimer);

  searchTimer = setTimeout(() => {
    fetchSearch();
  }, 1000);
};

const handleSearchOpen = () => {
  openSearch.value = !openSearch.value;
};
</script>
<template>
  <div :class="bgStyle">
    <MagnifyingGlassIcon
      :class="iconStyle"
      @click="handleSearchOpen"
    />

    <div
      :class="openSearch ? 'block' : 'hidden'"
      class="absolute top-1 left-13 w-80"
    >
      <div class="relative">
        <input
          v-model="input"
          @input="handleSearch"
          type="text"
          placeholder="Search..."
          class="w-full py-2 pl-10 pr-4 text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
        />
      </div>
    </div>
  </div>
</template>
