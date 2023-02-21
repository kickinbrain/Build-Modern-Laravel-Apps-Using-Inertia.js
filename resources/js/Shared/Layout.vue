<template>
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
export default {
    components: { Nav },

    computed: {
        username(){
            return this.$page.props.auth.user.username;
        }
    }
}
</script>
