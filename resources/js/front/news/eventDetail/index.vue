<script setup>
import sidebar from "../../components/sidebar.vue"
import eventcontact from "./eventcontact.vue";
import { format, parseISO } from 'date-fns'
import axios from "axios";
import { onMounted, ref } from "vue";
import { useRoute } from 'vue-router';
const route = useRoute();
const id = ref(route.params.id);
const event = ref('');
const eventparagraph = ref([]);
const info = ref([]);


onMounted(async () => {
   await axios.get(`./api/event/edit/${id.value}`).then(res => {
        event.value = res.data.event;
        eventparagraph.value = event.value.event.split('#');
        info.value = event.value.info.split('#');
    }).catch(err => console.log(err));
});

const formatDate = (isoDateString) => {
    const date = parseISO(isoDateString);
    return format(date, 'yyyy-MM-dd');
};


</script>
<template>
    <div class="bg-white font-roboto text-colorbackground ">
        <div class="grid md:grid-cols-8">
            <main class="px-4 sm:px-16 py-6 bg-white md:col-span-5">
                <header>
                    <div>
                        <h4 class="font-light pb-2 mt-12 border-b border-gray-200">kombolcha investment page</h4>
                        <h2 class="text-3xl text-gray-700 p-2 font-bold">{{ event.type }}</h2>
                        <div class="mt-8 bg-newsbackground  grid lg:grid-cols-1 md:gap-10">
                            <div class="card mx-auto  hover:shadow-lg">
                                <img :src="event.image" class="max-h-96  object-auto" alt="">
                            </div>
                        </div>
                        <div class="m-4">
                        </div>
                        <div class="grid grid-cols-5 mt-8">
                            <div class="col-span-5 p-2 text-md text-gray-800">
                                <div v-for="announcement in eventparagraph" :key="announcement">
                                    <p>{{ announcement }}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </header>
            </main>
            <div class="md:col-span-2 text-left">
                <h4 class=" mt-16 "></h4>
                <div class="hidden md:flex">
                    <sidebar />
                </div>
                 <eventcontact :info="info"/>
            </div>
        </div>
    </div>
</template>

<style scoped>
p {
    padding: 16px;
}
</style>