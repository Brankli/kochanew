<script setup>
import { onMounted, ref } from "vue";
import sidbar from "../components/sidebar.vue"
import resource from "./resource.vue";

const resources = ref([]);
onMounted(async () => {
    await axios.get('./api/resource/getall').then(res => {
        resources.value = res.data.resource;
    }).catch(err => console.log(err));
});
</script>

<template>
    <div class="grid lg:grid-cols-6 m-16">
        <div class="lg:col-span-4">
            <h1 class="border-b-2 border-gray-200 text-2xl p-5 font-bold text-darkred">Resources</h1>
            <p class="text-md p-4">you can download our resources with pdf file by clicking </p>
            <div v-for="resource in resources" :key="resource">
                <resource :resource="resource"/> 
            </div>           
        </div>
        <div class="hidden lg:flex lg:col-span-2 md:m-8">
            <sidbar/>
        </div>
    </div>
</template>