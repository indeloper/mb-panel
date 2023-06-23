<script setup>

import SidebarBlock from "@/Layouts/Partials/Sidebar/SidebarBlock.vue";
import SidebarItem from "@/Layouts/Partials/Sidebar/SidebarItem.vue";
import SidebarItemLink from "@/Layouts/Partials/Sidebar/SidebarItemLink.vue";
import Icon from "@/Components/Icon.vue";
</script>

<template>
    <aside class="h-screen sticky top-0 md:pt-12 md:pl-12 md:pb-12 dark:bg-gray-700">
        <SidebarBlock>
            <SidebarItemLink :href="route('profile.edit')"
                             :active="route().current('profile.edit')"
                             title="Profile"
            >
                <Icon name="user"/>
            </SidebarItemLink>
        </SidebarBlock>

        <SidebarBlock>
            <SidebarItemLink :href="route('home')"
                             :active="route().current('home')"
                             title="Home">
                <Icon name="home"/>
            </SidebarItemLink>
            <SidebarItemLink :href="route('division.index')"
                             :active="route().current('division.index')
                                     || route().current('division.create')
                                     || route().current('division.edit')"
                             title="Division"
            >
                <Icon name="folder"/>
            </SidebarItemLink>
        </SidebarBlock>

        <SidebarBlock end>
            <SidebarItemLink :href="route('logout')" method="post" as="button">
                <Icon name="arrow-left-on-rectangle"/>
            </SidebarItemLink>
        </SidebarBlock>

    </aside>
</template>

<style scoped>

</style>
