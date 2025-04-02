<script setup>
import axios from 'axios';
import { ref } from 'vue';
import succs from "../../back/pages/conformation/succ.vue";
import errs from "../../back/pages/conformation/err.vue";


const email = ref('');
const succ = ref('');
const notsucce = ref('');

const storesubscriber = ()=>{
        axios.post('./api/subscriber/store', { email: email.value }).then(ress => {
            succ.value = ress.data.message
        }).catch(err => {
          return  notsucce.value = err.response.data.error.email[0];
        })

}

</script>

<template>
    <div class="w-full sm:w-16/12 md:w-6/12  px-5">
        <errs v-if="notsucce" :notsucce="notsucce" />
        <succs v-if="succ" :succ="succ"/>
        <form class="flex flex-row" id="subscribeForm">
            <input class="border border-gray-300 rounded-md  py-1 px-2 mr-2 focus:outline-none " type="email"
                placeholder="Enter your email" v-model="email" name="email" id="email">
            <button @click.prevent="storesubscriber"
                class="bg-blue-500 text-white text-lg font-bold px-5 py-1 border border-blue-700 rounded-md cursor-pointer"
                type="submit"> Subscribe</button>
        </form>
    </div>
</template>