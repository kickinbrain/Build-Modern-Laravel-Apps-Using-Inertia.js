<template>
        <Head title="Users" />
        <h2 class="text-xl font-bold">Users</h2>
    <ul>
        <li
            v-for="user in users.data"
            :key="user.id"
            v-text="user.name">
        </li>
    </ul>

    <!-- PAGINATOR -->
    <Pagination :links="users.links" />

</template>

<script>
import Pagination from "../Shared/Pagination";
export default {
    components: {Pagination},
    props:{
        users: Object
    }
}

</script>
