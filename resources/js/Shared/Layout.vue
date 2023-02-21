<template>
    <section class="p-6 bg-gray-200">
        <header class="flex items-center justify-between">
            <h1 class="text-bold text-lg">My app name</h1>
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
    components: { Nav }

}
</script>
