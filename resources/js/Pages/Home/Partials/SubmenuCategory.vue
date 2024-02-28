<template>
    <li class="sidebar-submenu-category">
        <a :href="href" class="sidebar-submenu-title">
            <p class="product-name">{{ SubContent.name }}</p>
            <data :value="value" class="stock" title="Available Stock">{{
                value
            }}</data>
        </a>
    </li>
</template>

<script>
export default {
    props: {
        href: {
            type: String,
            default: "",
        },
        name: {
            type: String,
            default: "Shirts",
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
};
</script>

<style></style>
