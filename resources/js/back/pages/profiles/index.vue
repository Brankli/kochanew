<script setup>
import name from '../../components/name.vue';
import succs from "../conformation/succ.vue";
import axios from 'axios'
import { ref } from 'vue'
import { useLocalStorage } from "@vueuse/core";

const token = useLocalStorage('token', '');
const email = ref('');
const succ = ref('');
const notsucce = ref([]);

const passwordreset = () => {
    axios.defaults.headers.common['Authorization'] = token.value;
    axios.post('./api/resetpassword', { email: email.value }).then(res => {
        succ.value = res.data.message;
    }).catch(err => {
        notsucce.value = err.response.data.errors;
    });
}

</script>
<template>
    <div class="bg-gray-100 h-screen">
        <name name="Password Reset" />
        <succs v-if="succ" :succ="succ" />
        <div class="m-4 mt-16 md:max-w-4xl rounded">
            <div>
                <form class="flex bg-white flex-col items-center justify-center">
                    <div class=" w-full  relative p-2 overflow-x-auto shadow-md sm:rounded-lg xs:p-5">
                        <div class="mb-4">
                            <label for="old" class="block z-auto mb-2 text-sm font-medium text-gray-900">E-mail</label>
                            <p class="text-red-500 p-2" v-if="notsucce.email">{{ notsucce.email[0] }}</p>
                            <input v-model="email" type="email" name="old" id="old" placeholder="Exampe@gmail.com"
                                class="bg-gray-50 border border-sky-300 text-gray-900 sm:text-sm rounded-lg focus:ring-sky-600 focus:border-sky-600 block w-full p-2.5 outline-none"
                                required>
                        </div>
                        <button @click.prevent="passwordreset"
                            class="text-white bg-blue-700 capitalize hover:bg-blue-800 w-5xl focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm capitalize px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 block">send
                            pasword reset link</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

