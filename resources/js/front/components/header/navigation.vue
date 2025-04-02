<script setup>
import who_we_are from '../dropdowns/who_we_are.vue';
import departments from '../dropdowns/departments.vue';
import { ref } from 'vue';
import search from './search.vue';

const className = ref('hidden');
const searchClass = ref('hidden');
const whoClass = ref('hidden');
const depClass = ref('hidden');

const togglemenu = () => {
    className.value = className.value === 'hidden' ? 'unhidden' : 'hidden';
}

const whotogle = () => {
    whoClass.value = whoClass.value === 'hidden' ? 'unhidden' : 'hidden';
    depClass.value = 'hidden';
}
const departmenttogle = () => {
    depClass.value = depClass.value === 'hidden' ? 'unhidden' : 'hidden';
    whoClass.value = 'hidden';
}

</script>
<template>
    <div class=" rounded  w-full lg:w-fit  mx-auto  bg-briteblue">
        <nav class="mb-2">
            <div class="text-lg  flex flex-row mt-2 text-green-100 gap-8  justify-between   font-bold">
                <div class="lg:hidden cursor-pointer" @click.prevent="togglemenu">
                    <i class="material-icons align-middle ml-4 text-white">menu</i>
                </div>
                <div class=" lg:flex lg:flex-row w-full" :class="className">
                    <div class=" border-b-2 lg:border-b-0 hover:bg-green-300 hover:rounded  p-2 lg:w-fit   border-white">
                        <a class="px-4 border-b-4 hover:text-briteblue border-darkred" href="#">
                            <span>{{ $t('lang.Home') }}</span>
                        </a>
                    </div>
                    <div  @click.prevent="departmenttogle" class="border-b-2 lg:border-b-0 p-2 hover:bg-green-300 hover:rounded   border-white">
                        <a class="px-4  hover:text-briteblue  hover:border-b-4 border-darkred" href="#">
                            <span class="text-one ">{{ $t('lang.Departments') }}</span>
                        </a>
                    </div>
                    <div @click.prevent="whotogle" class="border-b-2 lg:border-b-0 p-2 hover:bg-green-300 hover:rounded  border-white">
                        <a class="px-4   hover:text-briteblue hover:border-b-4 border-darkred" href="#">
                            <span>{{ $t('lang.aboute us') }}</span>
                        </a>
                    </div>
                    <div  class="border-b-2 lg:border-b-0 p-2  hover:bg-green-300 hover:rounded  border-white">
                        <router-link to="/ourwork" class="px-4   hover:text-briteblue hover:border-b-4 border-darkred" >
                            <span class="text-one ">{{ $t('lang.our works') }}</span>
                        </router-link>
                    </div>
                    <div  class="border-b-2 lg:border-b-0 p-2  hover:bg-green-300 hover:rounded  border-white">
                        <router-link to="/contact" class="px-4   hover:text-briteblue hover:border-b-4 border-darkred" >
                            <span class="text-one ">{{ $t('lang.Contact us') }}</span>
                        </router-link>
                    </div>
                    <div  class="border-b-2 lg:border-b-0 p-2  hover:bg-green-300 hover:rounded  border-white">
                        <router-link to="/resource" class="px-4   hover:text-briteblue hover:border-b-4 border-darkred">
                            <span>{{ $t('lang.Resource') }}</span>
                        </router-link>
                    </div>

                </div>
                <div class="p-2 flex-block lg:flex-row  ">
                        <input type="text" id="search"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 outline-none"
                    placeholder="search here ...">
                </div>
            </div>
        </nav>
        <search :class="searchClass" />
    </div>
    <who_we_are :class="whoClass" @some-event="whotogle" />
    <departments :class="depClass" @some-event="departmenttogle"/>
</template>
