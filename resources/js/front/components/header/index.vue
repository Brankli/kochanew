<script setup>
import navigation from './navigation.vue';
import socialMedia from './socialMedia.vue';
import banner from "../banner.vue"
import logo from "./logo.vue";
import { onMounted } from 'vue';
import axios from 'axios';

onMounted(async()=>{
    await axios.post('/api/visiters').then(res =>{}).catch(err=>{
        console.log(err);
    })
})
</script>

<template>
    <div class="border-b z-50 bg-white  shadow-lg">
        <socialMedia class="p-2"/>
        <div class="">
            <logo/>
        </div>
        <navigation class="border-b-2 border-gray-200 shadow-md shadow-gray-600"/>
    </div>

        <banner/>
    


</template>


