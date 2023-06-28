<script setup>
import Icon from "@/Components/Icon.vue";
import {store} from '@/store/store.js';
import {router} from "@inertiajs/vue3";
import Column from "@/Components/Table/Partials/Column.vue";
import Dropdown from "@/Components/Dropdown/Dropdown.vue";
import DropdownLink from "@/Components/Dropdown/Partials/DropdownLink.vue";
import DropdownItem from "@/Components/Dropdown/Partials/DropdownItem.vue";

</script>

<template>
    <header :class="{
                'bg-emerald-500 bg-opacity-100': store.message && store.messageType === 'success',
                'bg-red-500 bg-opacity-100': store.message && store.messageType === 'error',
            }"
            class="flex bg-white justify-between w-full sticky top-2 rounded-tr-xl drop-shadow-xl mb-2 p-3 bg-opacity-50 backdrop-blur-lg transition-all duration-500 ease-in-out"
            :title="store.controller">

        <div class="flex">
            <div v-if="store.controller" class="mr-2">
                <Icon :name="store.controller"></Icon>
            </div>
            <div>

                <div :class="{'hidden': store.message}"
                >
                    <span>
                        <b>{{ $t(store.controller) }}</b>
                    </span>
                    <span v-if="store.action && store.action !== store.controller">
                        | {{ $t('.' + store.action) }}
                    </span>
                </div>

                <div :class="{'hidden': !store.message}"
                >
                    <b>{{ store.message }}</b>
                </div>

            </div>
        </div>

        <div class="justify-end">
            <Icon v-if="store.action === 'index'" name="plus"
                  @click="router.visit(route(store.controller + '.create'))"/>
            <Icon
                v-if="(store.action === 'create' || store.action === 'edit') && route().has(store.controller + '.index')"
                name="list-bullet"
                @click="router.visit(route(store.controller + '.index'))"/>
        </div>
    </header>
</template>

<style scoped>

</style>
