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
};
</script>

<style></style>
