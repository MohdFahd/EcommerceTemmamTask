<template>
    <div class="mx-10">
        <div class="product-main">
            <h2 class="title">New Products</h2>

            <div class="product-grid">
                <GridShowcase :ProductData="products" />
            </div>
        </div>
    </div>
</template>
<script setup>
import GridShowcase from "../Home/Partials/GridShowcase.vue";
import Layout from "../UserLayout/Layout.vue";

defineProps({
    // ProductData: { type: Object, required: true },
    products: { type: Object, required: true },
});
</script>

<script>
export default {
    layout: Layout,
};
</script>

<style></style>
