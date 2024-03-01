<template>
    <div class="showcase" v-for="product in ProductData" :key="product.id">
        <div class="showcase-banner">
            <img
                src="assets/images/products/jacket-3.jpg"
                alt="Mens Winter Leathers Jackets"
                width="300"
                class="product-img default"
            />
            <img
                src="assets/images/products/jacket-4.jpg"
                alt="Mens Winter Leathers Jackets"
                width="300"
                class="product-img hover"
            />

            <p class="showcase-badge">15%</p>

            <div class="showcase-actions">
                <button class="btn-action">
                    <ion-icon name="heart-outline"></ion-icon>
                </button>

                <button class="btn-action">
                    <ion-icon name="eye-outline"></ion-icon>
                </button>

                <button class="btn-action">
                    <ion-icon name="repeat-outline"></ion-icon>
                </button>

                <button class="btn-action">
                    <ion-icon name="bag-add-outline"></ion-icon>
                </button>
            </div>
        </div>

        <ProductBox
            :content="product"
            :categoryLink="true"
            :rating="true"
            :ShowImg="false"
        />
    </div>
</template>

<script setup>
import ProductBox from "../Partials/ProductBox.vue";

defineProps({
    ProductData: { type: Object, required: true },
});
</script>

<style></style>
