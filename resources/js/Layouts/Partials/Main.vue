<script setup>

import Header from "@/Layouts/Partials/Header.vue";
</script>

<template>

    <main class="w-full flex flex-col auto-rows-max p-2 md:p-12 dark:bg-gray-700">

        <Header/>

        <div class="bg-white rounded-br-xl grow shadow-xl">
            <slot/>
        </div>

    </main>

</template>

<style scoped>

</style>
