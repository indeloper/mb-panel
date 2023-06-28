<script setup>

import Checkbox from "@/Components/Checkbox.vue";
import Dropdown from "@/Components/Dropdown/Dropdown.vue";
import DropdownLink from "@/Components/Dropdown/Partials/DropdownLink.vue";
import {store} from "@/store/store.js";
import Row from "@/Components/Table/Partials/Row.vue";
import Column from "@/Components/Table/Partials/Column.vue";

const controller = route().current().split('.')[0];

const props = defineProps({
    items: {
        type: [Object, Array],
        required: true
    },
    actions: Array,
    fields: Array,
    dropdown: String,
    available: Boolean,
    destroy: Boolean,
});

const destroy = (item) => {
    store.destroy(item)
}

const available = (item) => {
    store.available(item)
}

</script>

<template>

    <div>

    </div>

    <table class="w-full">
        <thead>
        <tr class="border-b">
            <th v-if="available" class="w-1/12"></th>
            <th v-for="field in fields" :key="field.index" class="text-left">{{ $t(field).toUpperCase() }}</th>
        </tr>
        </thead>
        <tbody>

        <Row v-for="item in items" :key="item.id">

            <Column v-if="available" class="text-center">
                <!--TODO: change to live switch-->
                <Checkbox v-model:checked="item.available" @change="available(item)"/>
            </Column>
            <!--TODO: change to dropdown column component-->
            <Dropdown>
                <template #trigger>
                    <Column v-for="field in fields"
                            :key="field.index"
                    >
                        {{ item[field] }}
                    </Column>
                </template>
                <template #content>
                    <div v-for="action in actions"
                         :key="action.index">
                        <DropdownLink v-if="route().has(store.controller + '.' + action)"
                                      :href="route(store.controller + '.' + action, item)"
                        >
                            {{ $t(action) }}
                        </DropdownLink>
                    </div>
                    <DropdownLink v-if="destroy && route().has(store.controller + '.destroy')"
                                  :href="route(store.controller + '.destroy', item)"
                                  @click="destroy(item)"
                    >
                        {{ $t('destroy') }}
                    </DropdownLink>
                </template>
            </Dropdown>



        </Row>

        </tbody>
    </table>
</template>

<style scoped>

</style>
