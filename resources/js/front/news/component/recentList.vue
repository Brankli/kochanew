<script setup>
import { format, parseISO } from 'date-fns'
const props = defineProps({
    news:''
});
const formatDate = (isoDateString) => {
    const date = parseISO(isoDateString);
    return format(date, 'yyyy-MM-dd');
};
</script>

<template>
        <router-link :to="{ name: 'newsDetail', params: { id: props.news.id } }" >
    <div>
        <div class=" flex flex-row mb-5 hover:bg-gray-100 hover:border-l-4 ml-4 hover:border-l-darkred">
            <img :src="props.news.image" class="  w-24 h-24 ml-1 object-cover" alt="">
            <div class="">
                <p class="pl-4 text-sm font-roboto font-bold tracking-wider text-gray-800">{{ props.news.title }}</p>
                <p class="p-1 pl-4 text-sm text-gray-500">{{ formatDate(props.news.created_at) }}</p>
            </div>
        </div>
    </div>
    </router-link>
</template>