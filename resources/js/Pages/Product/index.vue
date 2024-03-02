<template>
    <GridShowcase :ProductData="category.products" />
</template>
<script setup>
import GridShowcase from "../Home/Partials/GridShowcase.vue";
import Layout from "../../Layouts/Layout.vue";

defineProps({
    // ProductData: { type: Object, required: true },
    category: { type: Object, required: true },
});
</script>

<script>
export default {
    layout: Layout,
};
</script>

<style></style>
