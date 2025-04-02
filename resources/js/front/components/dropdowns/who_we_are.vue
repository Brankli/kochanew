<script setup>
const emit = defineEmits(['someEvent'])
const handelevent = (event) => {
    emit('someEvent');
}

</script>

<template>
    <div @click.prevent="handelevent" class="absolute dropdowns bg-white border-2 border-gray-200 rounded shadow-lg shadow-sky-200">
    <div  class="grid sm:grid-cols-2 md:grid-cols-3  lg:grid-cols-4">
        <div class="border-r-2 hidden lg:flex border-gray-100">
            <div class="bg-gray-200 rounded m-8" >
                <h2 class="text-3xl bold mt-3 text-sky-800 text-center p-4"><strong>{{ $t('lang.Who') }}</strong></h2>
                <p class="p-8 text-md">{{ $t('lang.who def') }}</p>
            </div>
        </div>
        <router-link to="/Aboutekocha" class="flex-item p-8">
            <h2 class="text-xl bold mt-7 text-gray-950 uppercase"><strong>{{ $t('lang.About KC') }}</strong></h2>
            <div class=" block">
                <div class="mt-8 flex flex-col text-md ml-3 text-sky-700">
                    <a class="hover:text-sky-900 p-1" href="#history">{{ $t('lang.history') }}</a>
                    <a class="hover:text-sky-900 p-1" href="#location"> {{ $t('lang.geolocation') }}</a>
                    <a class="hover:text-sky-900 p-1" href="#weather"> {{ $t('lang.weather') }}</a>
                    <a class="hover:text-sky-900 p-1" href="#advantages"> {{ $t('lang.comp Advantage') }}</a>
                </div>
            </div>
        </router-link>
        <router-link to="/aboutdeps" class="flex-item p-8">
            <h2 class=" bold text-xl  mt-5 text-gray-950"><strong>{{ $t('lang.About KIID') }}</strong></h2>
            <div class="mt-8 flex flex-col text-md ml-3 text-sky-700 ">
                <a  class="hover:text-sky-900 p-2" href="#aboutus">{{ $t('lang.aboute us') }}</a>
                <a  class="hover:text-sky-900 p-2" href="#mission">{{ $t('lang.Mission') }}</a>
                <a  class="hover:text-sky-900 p-2" href="#vision" >{{ $t('lang.Vision') }}</a>
            </div>
        </router-link>
    </div>
    </div>
</template>

<style>

</style>
<style>
.dropdowns {
    z-index: 10;
}
</style>