<template>
        <Head title="Users" />

        <div class="flex justify-between mb-6">
            <h2 class="text-xl font-bold">Users</h2>

            <input type="text" v-model="search" placeholder="Search...." class="border px-2 rounded-lg">
        </div>
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
import {Inertia} from "@inertiajs/inertia";
export default {
    components: {Pagination, Inertia},
    props:{
        users: Object,
        filters: Object
    },
   data(){
        return {
            search: this.filters.search
        }
   },
   watch: {
        search(value){
            this.$inertia.get('/users', {search: value}, {
                preserveState: true,
                replace: true
            })
        }
   }

}

</script>
