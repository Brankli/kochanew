<script setup>
import { onMounted , ref} from "vue";

const sponsers = ref([]);
onMounted(async () => {
    await axios.get('./api/getall/sponser').then(res => {
        sponsers.value = res.data;
    }).catch(err => console.log(err));
});
</script>

<template>
    <div class="m-16">
        <div class="border-b-2 border-gray-300 ">
                    <h1 class="font-bold hidden sm:flex font-roboto text-darkred text-2xl  mt-12 "> Partners</h1>
                </div>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 m-8 gap-4  justify-center">
            <div class=" w-fit flex "  v-for="sponser in sponsers" :key="sponser.id">
                <img :src="sponser.image" alt="" class=" h-16 object-cover">
        
            </div>
        </div>
    </div>
</template>