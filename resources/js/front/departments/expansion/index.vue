<script setup>
import axios from 'axios';
import { ref, onMounted } from 'vue';
import depProfile from '../components/depProfile.vue';

const departments = ref([]);
const services = ref([]);

onMounted(async () => {
    await axios.get('./api/getall/department').then(res => {
        departments.value = res.data.DepartmentContent;
    }).catch(err => console.log(err));
    await axios.get('./api/service/getall').then(res => {
        services.value = res.data.services;
    }).catch(err => console.log(err));

})
</script>

<template>
    <div v-for="departmenthead in departments.data " :key="departmenthead.id" class="font-roboto">
        <div v-if="departmenthead.position === 'expansion director'">
            <h1 class="font-bold text-4xl text-darkblue pt-8 capitalize text-center">Expansion of Investment
            </h1>
            <div class="grid md:grid-cols-3 sm:m-16">
                <div class="md:col-span-1 border-r-2 border-gray-200">
                    <depProfile :name="departmenthead.name" :position="departmenthead.position"
                        :mobile="departmenthead.phone_no" :email="departmenthead.email" :profile="departmenthead.profile" />
                </div>
                <div class="md:col-span-2">
                    
                    <!-- service -->
                    <div class="mt-4">
                        <h1 class="font-bold bg-gray-100 p-2  text-3xl">our service</h1>
                        <div v-for="service in  services" :key="service.id">
                            <div v-if="service.department == 'expansion'"
                                class="p-2 flex flex-row gap-3 hover:border-sky-100 hover:border-b w-full md:mt-0 hover:ml-4 mt-3 m-3 xl:p-0">
                                <i class="material-icons p-2 text-orange-300">done</i>
                                <p class=" font-roboto text-md p-2 ">{{ service.service }}</p>
                            </div>
                        </div>
                    </div>
                    <!-- service -->
                </div>
            </div>
        </div>
    </div>
</template>


