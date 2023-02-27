<template>
    <div>
        <Component
            :is="link.url ? Link : 'span'"
            v-for="link in links"
            :href="link.url"
            v-html="link.label"
            class="px-1"
        />
    </div>
</template>
<script>

import {Link} from "@inertiajs/inertia-vue3";
export default {
    computed: {
        Link() {
            return Link
        }
    },
    props: {
       links: Array
    }
}
</script>
