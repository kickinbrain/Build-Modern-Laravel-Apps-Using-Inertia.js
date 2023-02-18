<template>
    <h2 class="text-xl font-bold">Users</h2>
    <Nav />


    <div style="margin-top: 1200px;">
        <p>The current time is {{ time }}.</p>
    </div>
    <Link href="/users" class="text-blue-500" preserve-scroll>Refresh</Link>

</template>

<script>
import Nav from "../Shared/Nav.vue";
import {Link} from "@inertiajs/inertia-vue3";

export default {
    components: { Nav, Link },

    props: {
        time: String
    }
};
</script>
