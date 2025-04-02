<script setup>
const emit = defineEmits(['someEvent'])
const handelevent = (event) => {
    emit('someEvent');
}

</script>

<template>
    <div  class="absolute dropdowns bg-white border-2 border-gray-200 rounded shadow-lg shadow-sky-200">
    <div @click.prevent="handelevent" class="grid sm:grid-cols-2 md:grid-cols-3  lg:grid-cols-4">
        <div class="border-r-2 hidden lg:flex border-gray-100">
            <div class="bg-gray-200 rounded m-8">
                <h2 class="text-3xl bold mt-3 text-sky-800 text-center p-4"><strong>{{ $t('lang.our works') }}</strong></h2>
                <p class="p-8 text-md">{{ $t('lang.our def') }}</p>
            </div>
        </div>
        <router-link to="/ourwork" class="flex-item p-8">
            <div class=" block">
                <div class="mt-8 flex flex-col text-md ml-3 text-sky-700">
                    <h2 class="text-xl p-1 hover:text-sky-900 font-bold mt-3">{{ $t('lang.agro process') }}</h2>
                    <a class="hover:text-sky-900 p-1" href="#history">{{ $t('lang.process meat') }}</a>
                    <a class="hover:text-sky-900 p-1" href="#location">{{ $t('lang.process milk') }}</a>
                    <a class="hover:text-sky-900 p-1" href="#advantages">{{ $t('lang.fabricate leather') }}</a>
                    <a class="hover:text-sky-900 p-1" href="#advantages">{{ $t('lang.manufct food') }}</a>
                </div>
                <div class="mt-8 flex flex-col text-md ml-3 text-sky-700">
                    <h2 class="text-xl p-1 hover:text-sky-900 font-bold mt-3">{{ $t('lang.chemical') }}</h2>
                    <a class="hover:text-sky-900 p-1" href="#history">{{ $t('lang.textile and cloth sec') }}</a>
                </div>
            </div>
        </router-link>
        <router-link to="/ourwork" class="flex-item p-8">
            
            <div class="mt-8 flex flex-col text-md ml-3 text-sky-700">
                <h2 class="text-xl p-1 hover:text-sky-900 font-bold mt-3">{{ $t('lang.hotel turism') }}</h2>
                <a class="hover:text-sky-900 p-1" href="#history">{{ $t('lang.star hotel') }}</a>
                <a class="hover:text-sky-900 p-1" href="#location">{{ $t('lang.accommodation') }} </a>
                <a class="hover:text-sky-900 p-1" href="#history">{{ $t('lang.Lodges') }} </a>
            </div>
            <div class="mt-8 flex flex-col text-md ml-3 text-sky-700">
                <h2 class="text-xl p-1 hover:text-sky-900 font-bold mt-3">{{ $t('lang.social sector') }}</h2>
            </div>
        </router-link >
        <router-link to="/ourwork" class="flex-item p-8">
                <div class="mt-8 flex flex-col text-md ml-3 text-sky-700">
                    <h2 class="text-xl p-1 hover:text-sky-900 font-bold mt-3">{{ $t('lang.const sec') }}</h2>
                    <a class="hover:text-sky-900 p-1" href="#history"> {{ $t('lang.real estate') }}</a>
                    <a class="hover:text-sky-900 p-1" href="#location">{{ $t('lang.const machine') }}</a>
                    <a class="hover:text-sky-900 p-1" href="#location">{{ $t('lang.wood sec') }}</a>
                </div>
                <div class="mt-8 flex flex-col text-md ml-3 text-sky-700">
                    <h2 class="text-xl p-1 hover:text-sky-900 font-bold mt-3">{{ $t('lang.urban') }}</h2> 
                </div>
            </router-link >
        </div>
    </div>
</template>

<style>
.dropdowns {
    z-index: 10;
}
</style>