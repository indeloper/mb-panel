<script setup>
import Dropdown from "@/Components/Dropdown/Dropdown.vue";
import DropdownLink from "@/Components/Dropdown/Partials/DropdownLink.vue";
import {store} from "@/store/store.js";
import Row from "@/Components/Table/Partials/Row.vue";
import Column from "@/Components/Table/Partials/Column.vue";
import Switch from "@/Components/Switch.vue";
import {router} from "@inertiajs/vue3";
import Icon from "@/Components/Icon.vue";
import {computed, ref} from "vue";

const props = defineProps({
    items: {
        type: [Object, Array],
        required: true,
    },
    actions: Array,
    fields: Array,
    dropdown: String,
    available: Boolean,
    withActions: Boolean,
    destroy: Boolean,
});

const destroy = (item) => {
    store.destroy(item);
};

const available = (item) => {
    store.available(item);
};

const searchQuery = ref("");
const searchedProducts = computed(() =>
    props.items.filter((item) =>
        item.title.toLowerCase().includes(searchQuery.value.toLowerCase())
    )
);
</script>

<template>
    <div class="mb-4">
        <div class="relative w-full">
            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                <Icon small color="grey" name="search"/>
            </div>
            <input
                v-model="searchQuery"
                type="text"
                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                :placeholder="$t('search')"
            />
        </div>
    </div>

    <table class="w-full">
        <thead>
        <tr class="border-b">
            <Column v-if="available" header class="w-1/12"/>
            <Column v-for="field in fields" :key="field.index" class="text-left" header>
                {{ $t(field) }}
            </Column>
            <Column v-if="withActions" header class="w-1/12"/>
        </tr>
        </thead>
        <tbody>
        <Row v-for="item in searchedProducts" :key="item.id">
            <Column v-if="available" class="text-center">
                <Switch v-model:checked="item.available" @click="available(item)"/>
            </Column>
            <Column v-for="field in fields" :key="field.index"
                    @click="router.visit(route(store.controller + '.edit', item.id))">
                {{ item[field] }}
            </Column>
            <Column v-if="withActions" class="text-end">
                <Dropdown>
                    <template #trigger>
                        <Icon name="actions"/>
                    </template>
                    <template #content>
                        <div v-for="action in actions" :key="action.index">
                            <DropdownLink v-if="route().has(store.controller + '.' + action)"
                                          :href="route(store.controller + '.' + action, item)">
                                {{ $t(action) }}
                            </DropdownLink>
                        </div>
                        <DropdownLink
                            v-if="destroy && route().has(store.controller + '.destroy')"
                            :href="route(store.controller + '.destroy', item)"
                            @click="destroy(item)"
                        >
                            {{ $t('destroy') }}
                        </DropdownLink>
                    </template>
                </Dropdown>
            </Column>
        </Row>
        </tbody>
    </table>
</template>

<style scoped>

</style>
