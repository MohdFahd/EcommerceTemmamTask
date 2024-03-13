<template>
    <li class="sidebar-submenu-category">
        <Link
            :href="'/categories/' + SubContent.name"
            class="sidebar-submenu-title"
            method="get"
        >
            <p class="product-name">{{ SubContent.name }}</p>
            <data :value="value" class="stock" title="Available Stock">{{
                value
            }}</data>
        </Link>
    </li>
</template>

<script>
import { Link } from "@inertiajs/vue3";

export default {
    props: {
        href: {
            type: String,
            default: "",
        },
        value: {
            type: String,
            default: "33",
        },
        SubContent: {
            type: Array,
            default: "",
        },
    },
    mounted() {
        // Emit SubContent.name and SubContent.img to the parent component
        this.$emit("slug-emitted", {
            name: this.SubContent.name,
            img: this.SubContent.img,
        });
    },
    components: {
        Link,
    },
};
</script>

<style></style>
