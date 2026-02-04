import { computed } from "vue";

export default function useSection(data, name){
    return computed(() => data.value?.find(c => c.section === name));
}