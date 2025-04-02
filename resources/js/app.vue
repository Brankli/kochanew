<script setup>
import headers from "./front/components/header/index.vue"
import footers from "./front/components/footer.vue";

</script>
<template>
    <div class="">
        <headers/>
        <router-view/>
        <footers/>
    </div>
</template>

