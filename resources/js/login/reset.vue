<script setup>
import axios from 'axios'
import succs from '../back/pages/conformation/succ.vue';
import { ref } from 'vue'
import { useRoute } from 'vue-router';

const newpassword = ref('');
const confirmedpassword = ref('');
const succ = ref('');
const notsucce = ref([]);
const route = useRoute();
const id = ref(route.params);


const updatepassword = () => {
    console.log(id.value);
        axios.post(`./api/updatepassword/${id.value}`, { newpassword: newpassword.value,  confirmedpassword: confirmedpassword.value }).then(res => {
            succ.value = res.data.message;
        }).catch(err => {
            notsucce.value = err.response.data.errors;
        });
}

</script>
<template>
    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full bg-white rounded-lg shadow-2xl  md:mt-0 sm:max-w-md xl:p-0 ">
            <succs v-if="succ" :succ="succ"/>
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight">
                    Reset password
                </h1>
                <form >
                    <div class="mb-4">
                        <label for="new" class="block mb-2 text-sm font-medium text-gray-900">New Password</label>
                        <!-- <p v-if="notsucce.newpassword" class="text-red p-2">{{ notsucce.newpassword[0] }}</p> -->
                        <input v-model="newpassword" type="password" name="new" id="new"
                            class="bg-gray-50 border border-sky-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 outline-none"
                            required>
                    </div>
                    <div class="mb-4">
                        <label for="confirm" class="block mb-2 text-sm font-medium text-gray-900">confirm
                            password</label>
                        <!-- <p v-if="notsucce.confirmedpassword" class="text-red p-2">{{ notsucce.confirmedpassword[0] }}</p> -->
                        <input v-model="confirmedpassword" type="password" name="confirm" id="confirm"
                            class="bg-gray-50 border border-sky-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 outline-none"
                            required>
                    </div>
                    <button @click.prevent="updatepassword"
                        class="text-white bg-blue-700 hover:bg-blue-800 w-5xl focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 block">Change
                        Password</button>
            </form>
        </div>
    </div>
</div>
</template>

