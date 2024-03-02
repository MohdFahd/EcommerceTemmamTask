<template>
    <div class="showcase" v-for="product in ProductData" :key="product.id">
        <div class="showcase-banner">
            <Image
                src="products/jacket-3"
                alt="Mens Winter Leathers Jackets"
                width="300"
                classes="product-img default"
            />
            <Image
                src="products/jacket-4"
                alt="Mens Winter Leathers Jackets"
                width="300"
                classes="product-img hover"
            />

            <p class="showcase-badge">15%</p>
            <p class="showcase-badge angle black" v-if="product.quantity <= 0">
                sale {{ product.quantity }}
            </p>

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
            :category_name="category_name"
        />
    </div>
</template>

<script setup>
import ProductBox from "../Partials/ProductBox.vue";
import Image from "@/Components/Image.vue";

defineProps({
    ProductData: { type: Object, required: true },
    category_name: { type: String, required: true },
});
</script>

<style></style>
