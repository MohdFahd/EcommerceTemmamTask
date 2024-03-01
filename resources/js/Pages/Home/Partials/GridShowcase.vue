<template>
    <div class="showcase">
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
            v-for="product in chunk"
            :key="product.id"
            :content="product"
            :categoryLink="true"
        />

        <div class="showcase-content">
            <a href="#" class="showcase-category">jacket</a>

            <a href="#">
                <h3 class="showcase-title">Mens Winter Leathers Jackets</h3>
            </a>

            <div class="showcase-rating">
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star-outline"></ion-icon>
                <ion-icon name="star-outline"></ion-icon>
            </div>

            <div class="price-box">
                <p class="price">$48.00</p>
                <del>$75.00</del>
            </div>
        </div>
    </div>
</template>

<script setup>
import ProductBox from "../Partials/ProductBox.vue";
</script>

<style></style>
