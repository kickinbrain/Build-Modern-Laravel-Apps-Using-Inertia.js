<template>
    <Link
        href="/"
        :class="{'text-red-500' : active }"
    >
       <slot />
    </Link>
</template>

<script>
    import { Link } from "@inertiajs/inertia-vue3"

    export default {
        components: { Link },
        props:{
            active: Boolean
        }
    }
</script>
