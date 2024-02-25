<template>
    <Link :class="classes" :href="href" :method="method" as="button">{{
        text
    }}</Link>
</template>

<script>
import { Link } from "@inertiajs/vue3";
export default {
    props: {
        text: {
            type: String,
            default: "Shop Now",
        },
        classes: {
            type: String,
            default: "banner-btn",
        },
        href: {
            type: String,
            default: "",
        },
        method: {
            type: String,
            default: "get",
        },
    },
    components: {
        Link,
    },
};
</script>

<style></style>
