<script setup>
const emit = defineEmits(['someEvent'])
const handelevent = (event)=>{
    emit('someEvent');
}
</script>

<template>
    <div class="absolute dropdowns bg-white border-2 border-gray-200 rounded shadow-lg shadow-sky-200">
        <div @click.prevent="handelevent" class="grid sm:grid-cols-2 md:grid-cols-3  lg:grid-cols-4">
            <div class="border-r-2 hidden lg:flex border-gray-100">
                <div class="bg-gray-200 rounded m-8">
                    <h2 class="text-3xl bold mt-3 text-sky-800 text-center p-4"><strong>{{ $t('lang.Our Office') }}</strong></h2>
                    <p class="p-8 text-md">{{ $t('lang.office') }}</p>
                </div>
            </div>
            <div class="flex-item p-8">
                <h2 class="text-xl bold mt-7 text-gray-950"><strong>{{ $t('lang.Departments') }}</strong></h2>
                <div class=" block">
                    <div class="mt-8 flex flex-col text-md ml-3 text-sky-700">
                        <router-link to="/expansion" class="hover:text-sky-900 p-1">{{ $t('lang.expInvestment') }} </router-link>
                        <router-link to="/development" class="hover:text-sky-900 p-1" href="#weather">   {{ $t('lang.industry dev') }}</router-link>
                        <router-link to="/minirals" class="hover:text-sky-900 p-1" href="#advantages"> {{ $t('lang.mining opma') }}</router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style>
.dropdowns{
    z-index: 10;
}
</style>

