<script setup>

import DangerButton from "@/Components/DangerButton.vue";
import {store} from "@/store/store.js";
import Dropdown from "@/Components/Dropdown/Dropdown.vue";
import Icon from "@/Components/Icon.vue";
import DropdownLink from "@/Components/Dropdown/Partials/DropdownLink.vue";
import {router} from "@inertiajs/vue3";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import DropdownItem from "@/Components/Dropdown/Partials/DropdownItem.vue";

const props = defineProps({
    item: {
        type: [Object, Array],
        required: false
    }
})

</script>

<template>
    <div class="flex justify-between items-center gap-4 bg-gray-200 p-2 px-4 m-2 rounded shadow-lg">

        <div>
            <b>{{ $t(store.action) }}</b>
        </div>


        <Dropdown>
            <template #trigger>
                <Icon name="actions"/>
            </template>
            <template #content>

                <DropdownItem v-if="route().has(store.controller + '.destroy') && item"
                              @click="store.destroy(item)"
                >
                    {{ $t('destroy') }}
                </DropdownItem>
            </template>
        </Dropdown>
    </div>
</template>

<style scoped>

</style>
