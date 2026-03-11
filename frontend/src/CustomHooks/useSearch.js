import { ref } from 'vue';

const searchQuery = ref("");
const searchResults = ref([]);

export function useSearch() {
    const setSearch = (query) => {
        searchQuery.value = query;
    }

    const setResults = (results) => {
        searchResults.value = results;
    }

    return {
        searchQuery,
        searchResults,
        setSearch,
        setResults
    }
}