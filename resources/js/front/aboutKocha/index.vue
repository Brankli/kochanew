<script setup>
import geography from './geography.vue';
import wheatherVue from './wheather.vue';
import infrastructure from './infrastructure.vue';
import advantage from './advantage.vue';

</script>
<template>
    <div class="mt-8 bg-darkblue rounded-tl-3xl pb-16 ">
        <div>
            <div class="  w-screen h-64 rounded-tl-full">
                <div class="text-center  ">
                    <h1 class="text-4xl font-bold p-16 font-roboto rounded-lg text-white">Aboute Kombolcha</h1>
                    <div class="border-b-2 md:w-96 flex flex-row h-5  justify-between  text-gray-200 mx-auto border-gray-200">
                        <div class="border-2 rounded-2xl  w-8 h-8">
                            <div class="border-2 mx-auto  rounded-xl bg-white w-5 h-5"></div>
                        </div>
                        <div class="border-2 rounded-2xl  w-8 h-8">
                            <div class="border-2 mx-auto  rounded-xl bg-blue-500 w-5 h-5"></div>
                        </div>
                        <div class="border-2 rounded-2xl  w-8 h-8">
                            <div class="border-2 mx-auto  rounded-xl bg-white w-5 h-5"></div>
                        </div>
                    </div>
                </div>
            </div>
                    <div class="bg-history h-[550px]  object-cover">
                <img src="asset/images/kombolcha-111.jpg" class="w-full" alt="">
            </div>
            <div class=" w-screen grid md:grid-cols-6 lg:grid-cols-8">
                <div class="lg:col-span-1">

                </div>
                <div class="p-4 md:col-span-2">
                    <geography />
                </div>
                <div class="p-4 md:col-span-2">
                    <wheatherVue />
                </div>
                <div class="p-4 md:col-span-2">
                    <infrastructure />
                </div>
            </div>
            <div class=" text-center ">
                <advantage />
            </div>
        </div>
    </div>
</template>
