<script setup>
import name from "../../components/name.vue"
import axios from "axios"
import { ref } from "vue";
import { useLocalStorage } from "@vueuse/core";
import succs from "../conformation/succ.vue";
import errs from "../conformation/err.vue";


const title = ref('');
const Name = ref('');
const imageUpload = ref(null);
const succ = ref('');
const err = ref('');
const token = useLocalStorage('token', '');
const selectedimagedata = ref('');

const formData = new FormData();

const selectImage = () => {
    const selectedImage = imageUpload.value.files[0];
    console.log(selectedImage);
    selectedimagedata.value = URL.createObjectURL(selectedImage);
    if (selectedImage) {
        formData.append('image', selectedImage);
    }
}

const post = () => {
    formData.append('discribution', title.value);
    formData.append('Name', Name.value);
    axios.defaults.headers.common['Authorization'] = token.value;
    axios.post('./api/store/testimonial', formData).then(res => {
        succ.value = res.data.message;
        window.location.href = "/admin#/newtestimonial"
    }).catch(res => {
        err.value = res.data;
    })
}
</script>
<template>
    <name name="Post Testimonial" />
    <succs v-if="succ" :succ="succ" />
    <errs v-if="err" :err="err" />
    <div class="bg-gray-100 p-16">
        <div class="border-2  bg-white border-gray-300 shadow-lg max-w-4xl mx-auto rounded shadow-gray-100">
            <div class="w-full  bg-white rounded-lg   md:mt-0 xl:p-0 ">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-lg  text-sky-700 leading-tight tracking-wide capitalize">Use "#" For new Pragraph </h1>
                    <form class="mb-6">
                        <div class="mb-6">
                            <label for="body" class="block mb-2 text-sm font-medium text-gray-900 capitalize">Name</label>
                            <input id="body" v-model="Name" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 outline-none"
                                placeholder="Please enter your name"/>
                        </div>
                        <div class="mb-6">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 capitalize">Discription</label>
                            <textarea id="title" v-model="title" rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 outline-none"
                                placeholder="Please enter your discription"></textarea>
                        </div>

                        <div class="mb-6">
                            <label for="file" class="block mb-2 text-sm font-medium text-gray-900 capitalize">Upload image
                                </label>
                            <input accept=".png,.jpg,.jpeg" type="file" rows="4" ref="imageUpload" @change="selectImage"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 outline-none"
                                placeholder="Your question..." />
                        </div>
                        <img v-if="selectedimagedata" :src="selectedimagedata" alt="">

                        <button @click.prevent="post"
                            class="text-white bg-blue-700 hover:bg-blue-800 w-full focus:ring-4 focus:ring-blue-300 font-medium rounded-lg capitalize text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 block">Add
                            testimonial</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

