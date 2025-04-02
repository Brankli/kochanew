<script setup>
import axios from "axios";
import { onMounted, ref, computed } from "vue";
import succs from "../conformation/succ.vue";
import errs from "../conformation/err.vue";
import name from "../../components/name.vue";
import { useLocalStorage } from "@vueuse/core";
const token = useLocalStorage('token', '');
const banners = ref([]);
const removedSponsolId = ref([]);
const countsponsers = ref(0)
const succ = ref('');
const err = ref('');
const perPage = ref(5);
const currentPage = ref(1);


onMounted(async () => {
    await axios.get(`./api/getall/banner`).then(res => {
        banners.value = res.data;
    }).catch(err => console.log(err));
});


function countTrashSponsers(id) {
    if (removedSponsolId.value.includes(id)) {
        removedSponsolId.value = removedSponsolId.value.filter(singleid => singleid !== id);
        countsponsers.value = removedSponsolId.value.length;
    } else {
        removedSponsolId.value.push(id);
        countsponsers.value = removedSponsolId.value.length;
    }
}

const hidenSponsor = () => {
    axios.defaults.headers.common['Authorization'] = token.value;
    axios.post(`./api/banner/hidden`, { id: removedSponsolId.value }).then(res => {
        return succ.value = res.data.message;
    }).catch(error => {
        return err.value = error.data.message;
    })
}


const paginatedData = computed(() => {
    const start = (currentPage.value - 1) * perPage.value;
    const end = start + perPage.value;
    return banners.value.slice(start, end);
});

const totalPages = computed(() => Math.ceil(banners.value.length / perPage.value));
const prevPage = () => {
    if (currentPage.value > 1) {
        currentPage.value--;
    }
};

const nextPage = () => {
    if (currentPage.value < totalPages.value) {
        currentPage.value++;
    }
};

</script>

<template>
    <div class="bg-gray-100">
        <name name="New Banner" />
        <succs v-if="succ" :succ="succ" />
        <errs v-if="err" :err="err" />
        <div class="m-4 mt-12 rounded">
            <div class="w-full bg-white border-b-2 rounded border-gray-200 flex flex-row justify-between">
                <h1 class="font-bold text-gray-500 text-lg p-4 ">Banner List</h1>
                <router-link to="/banner"
                    class="w-24 text-white bg-sky-700 hover:bg-sky-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 m-4 text-center ">Post</router-link>
            </div>
            <!-- table start here -->
            <div class="flex bg-white flex-col items-center justify-center">
                <div class=" w-full  relative p-2 overflow-x-auto shadow-md sm:rounded-lg xs:p-5">
                    <div
                        class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
                        <div>
                            <div v-if="countsponsers" class="align-middle">
                                <p><span class="text-blue-500 w-4 h-4 bg-gray-200 rounded-full p-2 font-bold">{{
                                    countsponsers }}</span> row selected <i @click.prevent="hidenSponsor"
                                        class="material-icons text-xl font-extrabold w-10 h-10 hover:bg-gray-400 text-center p-2 bg-gray-200 rounded-full text-red-500">delete</i>
                                </p>
                            </div>
                        </div>

                    </div>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    mark
                                </th>
                                <th scope="col" class="px-6 py-3">

                                    Banner
                                </th>

                            </tr>
                        </thead>
                        <tbody v-for="banner in paginatedData" :key="banner.id">
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td @click.prevent="countTrashSponsers(banner.id)" class="w-4 p-4">
                                    <div class="border-4 border-gray-200 text-center rounded w-5 h-5">
                                        <p v-if="removedSponsolId.includes(banner.id)"><i
                                                class="material-icons text-2xl font-bold text-green-600">done</i></p>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="w-fit flex flex-col md:mt-0 hover:ml-4 m-3 xl:p-0">
                                        <div class="flex gap-3 ">
                                            <img :src="banner.image" class="w-16 h-10 object-cover" alt="work-image">
                                        </div>
                                    </div>
                                </td>


                            </tr>
                        </tbody>
                    </table>
                    <div v-if="perPage >= 5" class="w-full justify-between flex flex-row pt-4">
                        <div><button
                                class="shadow p-2 bg-gray-200 active:text-red-500 hover:bg-gray-300 text-briteblue text-lg font-bold rounded"
                                @click="prevPage" :disabled="currentPage === 1">Back</button></div>
                        <div><span class=" p-2 bg-gray-200 text-lg font-bold rounded">{{ currentPage }}</span></div>
                        <div><button
                                class="shadow p-2 bg-gray-200 active:text-red-500 text-briteblue hover:bg-gray-300 text-lg font-bold rounded"
                                @click="nextPage" :disabled="currentPage === totalPages">Next</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
