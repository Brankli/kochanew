<script setup>
import lang from './lang.vue';

</script>
<template>
    <div class="border-b-2    bg-briteblue border-gray-100">
        <div class="flex flex-wrap items-center md:justify-between justify-center">
            <div class="w-full md:w-4/12 px-4">
                <div class="text-sm text-sky-800 font-semibold py-1">
                    <a href="#" class="hover:text-gray-400 text-sm text-white font-semibold py-1">Kombolcha City Industry & Investment Department</a>
                </div>
            </div>
            <div class="w-full md:w-8/12 px-4">
                <ul class="flex flex-wrap text-white list-none md:justify-end  justify-center">
                    <li>
                        <a href="#" class=" hover:text-gray-400 text-sm font-semibold block py-1 px-3">{{ $t('lang.Telegram') }}</a>
                    </li>
                    <li>
                        <a href="#" class=" hover:text-gray-400 text-sm font-semibold block py-1 px-3">{{ $t('lang.Facebook') }}</a>
                    </li>
                    <li>
                        <a href="#" class=" hover:text-gray-400 text-sm font-semibold block py-1 px-3">{{ $t('lang.Instagram') }}</a>
                    </li>
                    <li>
                        <a href="#" class=" hover:text-gray-400 text-sm font-semibold block py-1 px-3">{{ $t('lang.Twitter') }}</a>
                    </li>
                    <li class="pl-4">
                        <lang />
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>