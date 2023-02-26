<template>
    <Head>
        <title>My app</title>
    </Head>
    <section class="p-6 bg-gray-200">
        <header class="flex items-center justify-between">
            <div>
                <h1 class="font-bold text-lg">My app name</h1>
                <p>Welcome back, {{ username }}!</p>
            </div>
            <Nav />
        </header>
    </section>
    <section class="p-6">
        <div class="max-w-3xl mx-auto">
            <slot />
        </div>
    </section>
</template>

<script>
import Nav from "./Nav.vue";
import {Head} from "@inertiajs/inertia-vue3";
export default {
    components: { Nav, Head },

    computed: {
        username(){
            return this.$page.props.auth.user.username;
        }
    }
}
</script>
