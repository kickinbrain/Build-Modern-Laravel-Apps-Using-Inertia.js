<template>
        <Head title="Users" />
        <h2 class="text-xl font-bold">Users</h2>
    <ul>
        <li
            v-for="user in users"
            :key="user.id"
            v-text="user.name">
        </li>
    </ul>

</template>

<script setup>
defineProps({users: Array})
</script>
