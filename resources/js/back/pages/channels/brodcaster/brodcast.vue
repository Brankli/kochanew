<script setup>
import name from "../../../components/name.vue"
import axios from "axios"
import { ref } from "vue";
import { useLocalStorage } from "@vueuse/core";
import succs from "../../conformation/succ.vue";
import errs from "../../conformation/err.vue";

const message = ref('');
const token = useLocalStorage('token', '');
const succ = ref('');
const err = ref('');

const brodcastmessage = () => {
    axios.defaults.headers.common['Authorization'] = token.value;
    axios.post('./api/subscriber/broadcast', { message: message.value }).then(res => {
        succ.value = res.data.message;
        window.location.href = "/admin#/channels"
    }).catch(res => {
        err.value = res.data;
    })
}
</script>

<template>
    <name name="Brodcast Message" />
    <succs v-if="succ" :succ="succ" />
    <errs v-if="err" :err="err" />
    <div class="bg-gray-100 p-16">
        <div class="border-2  bg-white border-gray-300 shadow-lg max-w-4xl mx-auto rounded shadow-gray-100">
            <div class="w-full  bg-white rounded-lg   md:mt-0 xl:p-0 ">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-lg  text-sky-700 leading-tight tracking-wide">your meassage is brodcasted through email
                        to your subscribers</h1>
                    <form class="mb-6">
                        <div class="mb-6">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Message</label>
                            <textarea id="title" v-model="message" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 outline-none"
                                placeholder="this message is send to subscribers  by theire  email"></textarea>
                        </div>
                        <button @click.prevent="brodcastmessage"
                            class="text-white bg-blue-700 hover:bg-blue-800 w-full focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 block">Send
                            Answer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

