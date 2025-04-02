<script setup>
import axios from "axios";
import { onMounted, ref } from "vue";

const testimonial = ref([]);
onMounted(async () => {
    await axios.get(`./api/getall/testimonial`)
        .then((res) => {
        testimonial.value = res.data;
        }).catch((err) => console.log(err));
});
</script>
<template>



<div class="py-12 bg-gray-50 sm:py-16 lg:py-20">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex flex-col items-center">
            <div class="text-center">
                <h2 class="mt-4 text-3xl font-bold text-gray-900 sm:text-4xl xl:text-5xl font-pj">Our Testimonial</h2>
            </div>``

            <div class="relative mt-10 md:mt-24 md:order-2">
                <div class="absolute -inset-x-1 inset-y-16 md:-inset-x-2 md:-inset-y-6">
                    <div class="w-full h-full max-w-5xl mx-auto rounded-3xl opacity-30 blur-lg filter" style="background: linear-gradient(90deg, #44ff9a -0.55%, #44b0ff 22.86%, #8b44ff 48.36%, #ff6644 73.33%, #ebff70 99.34%)"></div>
                </div>

                <div class="relative grid max-w-lg grid-cols-1 gap-6 mx-auto md:max-w-none lg:gap-10 md:grid-cols-3">
                    <div class="flex flex-col overflow-hidden shadow-xl" v-for="test in testimonial" :key="test.id">
                        <div class="flex flex-col justify-between flex-1 p-6 bg-white lg:py-8 lg:px-7">
                            <div class="flex-1">
                                <blockquote class="flex-1 mt-8">
                                    <p class="pl-10 text-lg leading-relaxed text-gray-900 font-bold">“{{ test.discribution }}”</p>
                                </blockquote>
                                <div class="flex items-center justify-center m-10">
                                    <img :src="test.image" alt="" class="flex-shrink-0 object-cover rounded-full w-24 h-24 mt-2" />
                                </div>
                                <div class="flex items-center justify-center mt-2">
                                    <div v-for="star in [1, 2, 3, 4, 5]" :key="star">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 96 960 960" class="w-4 h-4 text-yellow-500">
                                            <path fill="currentColor" d="m233 976 65-281L80 506l288-25 112-265 112 265 288 25-218 189 65 281-247-149-247 149Z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <div class="text-center">
                                        <p class="text-base font-bold text-gray-900 font-pj">{{ test.Name }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






  </template>


