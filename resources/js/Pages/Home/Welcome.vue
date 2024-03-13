<script setup>
import { Head, Link } from "@inertiajs/vue3";
import Layout from "../UserLayout/Layout.vue";
import Banner from "../Home/Partials/Bnner.vue";
import CategoryBox from "../Home/Partials/CategoryBox.vue";
import CategoryList from "../Home/Partials/CategoryList.vue";
import ProductShowcase from "../Home/Partials/ProductShowcase.vue";
import BuyingOffer from "../Home/Partials/BuyingOffer.vue";
import GridShowcase from "../Home/Partials/GridShowcase.vue";
import ProductBox from "../Home/Partials/ProductBox.vue";
import { useTakeStore } from "@/Stores/TakeStore";
import { computed } from "vue";
const { canLogin, canRegister, categories, products } = defineProps({
    // canLogin: Boolean,
    // canRegister: Boolean,
    categories: { type: Object, required: true },
    products: { type: Object, required: true },
    buyingOffers: { type: Array, required: true },
});
// const takeStore = useTakeStore();
// takeStore.setCategories(categories);
</script>
<script>
export default {
    layout: Layout,
};
</script>

<template>
    <Head title="Welcome" />

    <!-- Banner Section -->
    <div class="banner">
        <div class="container">
            <div class="slider-container has-scrollbar">
                <Banner
                    name="WOMEN'S LATEST FASHION SALE"
                    title="Trending Item"
                    price="20.00"
                    buttonText="Shop Now"
                />
            </div>
        </div>
    </div>

    <!--
      - CATEGORY
    -->
    <div class="category">
        <div class="container">
            <div class="category-item-container has-scrollbar">
                <CategoryBox
                    v-for="category in categories"
                    :key="category.id"
                    :name="category.name"
                    :img="category.img"
                    :value="category.product_count"
                />
            </div>
        </div>
    </div>

    <!--
      - PRODUCT
    -->
    <div class="product-container">
        <div class="container">
            <!--
          - SIDEBAR
        -->

            <div class="sidebar has-scrollbar" data-mobile-menu>
                <div class="sidebar-category">
                    <div class="sidebar-top">
                        <h2 class="sidebar-title">Category</h2>

                        <button
                            class="sidebar-close-btn"
                            data-mobile-menu-close-btn
                        >
                            <ion-icon name="close-outline"></ion-icon>
                        </button>
                    </div>

                    <ul class="sidebar-menu-category-list">
                        <CategoryList
                            v-for="category in categories"
                            :key="category.id"
                            :name="category.name"
                            :img="category.img"
                            :value="category.product_count"
                            :SubCategory="category.children"
                        />
                        <!-- :value="category.product_count" -->
                    </ul>
                </div>

                <div class="product-showcase">
                    <h3 class="showcase-heading">best sellers</h3>
                    <div class="showcase-wrapper">
                        <div class="showcase-container">
                            <ProductBox
                                v-for="product in products"
                                :key="product.id"
                                :content="product"
                                :rating="true"
                            />
                        </div>
                    </div>
                </div>
            </div>
            <div class="product-box">
                <!--
            - PRODUCT MINIMAL
          -->

                <div class="product-minimal">
                    <ProductShowcase name="New Arrival" :data="products" />
                    <ProductShowcase name="Trending" :data="products" />
                    <ProductShowcase name="Top Rated" :data="products" />
                </div>
                <!--
            - PRODUCT FEATURED
          -->
                <div class="product-featured">
                    <h2 class="title">Deal of the day</h2>

                    <div class="showcase-wrapper has-scrollbar">
                        <BuyingOffer
                            v-for="data in buyingOffers"
                            :key="data"
                            :data="data"
                        />
                    </div>
                </div>
                <!--
            - PRODUCT GRID
          -->

                <div class="product-main">
                    <h2 class="title">New Products</h2>

                    <div class="product-grid">
                        <GridShowcase :ProductData="products" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>
