<!-- SearchBar.vue -->
<script setup>
import { BASE_URL, getApiHeader } from "@/APIs/ApiHeader";
import { useLang } from "@/CustomHooks/useLang";
import { useSearch } from "@/CustomHooks/useSearch";
import { ref } from "vue";

const input = ref("");
const { setSearch, setResults } = useSearch();
const { lang } = useLang();

const handleSearch = async () => {
  setSearch(input.value);
  try{
    console.log(input.value);
    const res = await fetch(`${BASE_URL}/search/?locale=${lang.value}&search=${input.value}`, {
      method: "GET",
      headers: getApiHeader(lang.value),
    });
    if (res.ok) {
      const json = await res.json();
      setResults(json.data);
    }

  }catch(err){
    console.error("Error fetching search results:", err);
  }
};

const handleCancel = () => {
  input.value = "";
  setSearch("");
  setResults([]);
  input.value = "";
};

</script>
<template>
  <div class="relative">
    <input
      v-model="input"
      @input="handleSearch"
      @cancel="handleCancel"
      type="text"
      placeholder="Search..."
      class="w-full py-2 pl-10 pr-4 text-gray-700 bg-white border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
    />
  </div>
</template>
