<script setup>
const props = defineProps({
    name:'',
    position:'',
    email:'',
    mobile:'',
    profile:'',
});
</script>

<template>
     <div class="border-l-2 border-gray-200 pl-2">
                    <div class="">
                        <img :src="props.profile" class="max-w-52 rounded" alt="">
                    </div>
                    <div class="">
                        <p class="font-bold text-2xl pl-0 p-4 pb-3 tracking-widest uppercase  ">{{ props.name }}</p>
                        <p class="font text-xl pb-2  tracking-widest text-gray-500 capitalize">{{ props.position }}</p>
                        <p class="font text-sm p-2 pl-0 tracking-wider">{{ props.email }}</p>
                        <p class="font text-sm p-2 pl-0  tracking-wider"> {{ props.mobile }}</p>
                        <p class="font text-sm p-2 pl-0  tracking-wider">open from Monday-Friday,
                            2:00-11:00</p>
                    </div>
                    <router-link to="/contact" class="text-white bg-blue-700 hover:bg-blue-800 w-fit ml-4 m-8 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 block">ask question</router-link>
                </div>
</template>