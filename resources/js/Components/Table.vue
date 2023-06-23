<script setup>

import Checkbox from "@/Components/Checkbox.vue";
import {useForm} from "@inertiajs/vue3";
import Icon from "@/Components/Icon.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";

const controller = route().current().split('.')[0];

const props = defineProps({
    items: {
        type: [Object, Array],
        required: true
    },
    actions: Array,
    fields: Array,
    available: Boolean,
    destroy: Boolean,
});

const destroy = (item) => {
    confirm('Are you sure?')
        ? useForm(item).delete(route(controller + '.destroy', item))
        : null;
}

</script>

<template>
    <table class="w-full">
        <thead>
        <tr class="border-b">
            <th v-if="available" class="w-1/12"></th>
            <th v-for="field in fields" :key="field.index" class="text-left">{{ $t(field).toUpperCase() }}</th>
            <th v-if="actions" class="w-1/12"></th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="item in items" :key="item.id"
            class="border-b"
        >
            <td v-if="available" class="text-center">
                <!--TODO: change to live switch-->
                <Checkbox v-model:checked="item.available" disabled/>
            </td>

            <td
                v-for="field in fields"
                :key="field.index"
                class="p-4"
            >
                {{ item[field] }}
            </td>

            <td v-if="actions">
                <Dropdown>
                    <template #trigger>
                        <Icon name="actions"/>
                    </template>
                    <template #content>
                        <div v-for="action in actions"
                             :key="action.index">
                            <DropdownLink v-if="route().has(controller + '.' + action)"
                                          :href="route(controller + '.' + action, item)"
                            >
                                {{ $t(action) }}
                            </DropdownLink>
                        </div>
                        <DropdownLink v-if="destroy && route().has(controller + '.destroy')"
                                      :href="route(controller + '.destroy', item)"
                                      @click="destroy(item)"
                        >
                            {{ $t('destroy') }}
                        </DropdownLink>
                    </template>
                </Dropdown>
            </td>

        </tr>
        </tbody>
    </table>
</template>

<style scoped>

</style>
