<script setup>
import Icon from "@/Components/Icon.vue";
import {Link} from "@inertiajs/vue3";

const action = route().current().split('.').pop();
const controller = route().current().split('.')[0];

</script>

<template>
    <header
        class="flex bg-white justify-between w-full sticky top-2 rounded-tr-xl drop-shadow-xl mb-2 p-3 bg-opacity-50 backdrop-blur-lg"
        :title="controller">
        <div class="flex
">
            <div v-if="controller" class="mr-2">
                <Icon :name="controller"></Icon>
            </div>
            <div>
                <span>
                    <b>{{ $t(controller) }}</b>
                </span>
                <span v-if="action && action !== controller">
                    | {{ $t('.' + action) }}
                </span>
            </div>
        </div>

        <div class="justify-end">
            <Link v-if="action === 'index'"
                  :href="route(controller + '.create')">
                <Icon name="plus"/>
            </Link>
            <Link v-if="(action === 'create' || action === 'edit') && route().has(controller + '.index')"
                  :href="route(controller + '.index')">
                <Icon name="list-bullet"/>
            </Link>
        </div>
    </header>
</template>

<style scoped>

</style>
