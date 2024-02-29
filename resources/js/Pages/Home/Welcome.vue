<script setup>
import { Head, Link } from "@inertiajs/vue3";
import Layout from "../../Layouts/Layout.vue";
import Banner from "../Home/Partials/Bnner.vue";
import CategoryBox from "../Home/Partials/CategoryBox.vue";
import CategoryList from "../Home/Partials/CategoryList.vue";
import { useTakeStore } from "@/Stores/TakeStore";
import { computed } from "vue";
const { canLogin, canRegister, categories, products } = defineProps({
    // canLogin: Boolean,
    // canRegister: Boolean,
    categories: { type: Object, required: true },
    products: { type: Object, required: true },
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

    <!-- <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"
    >
        <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-end">
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                >Dashboard</Link
            >

            <template v-else>
                <Link
                    :href="route('login')"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Log in</Link
                >

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="ms-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Register</Link
                >
            </template>
        </div>
    </div> -->
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
                <!-- <CategoryBox
                    v-for="category in categories"
                    :key="category.id"
                    :name="category.name"
                    :img="category.img"
                /> -->
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
                            :SubCategory="category.children"
                        />
                    </ul>
                </div>

                <div class="product-showcase">
                    <h3 class="showcase-heading">best sellers</h3>
                    <div class="showcase-wrapper">
                        <div class="showcase-container">
                            <div class="showcase">
                                <a href="#" class="showcase-img-box">
                                    <img
                                        src="assets/images/products/1.jpg"
                                        alt="baby fabric shoes"
                                        width="75"
                                        height="75"
                                        class="showcase-img"
                                    />
                                </a>

                                <div class="showcase-content">
                                    <a href="#">
                                        <h4 class="showcase-title">
                                            baby fabric shoes
                                        </h4>
                                    </a>

                                    <div class="showcase-rating">
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star"></ion-icon>
                                    </div>

                                    <div class="price-box">
                                        <del>$5.00</del>
                                        <p class="price">$4.00</p>
                                    </div>
                                </div>
                            </div>

                            <div class="showcase">
                                <a href="#" class="showcase-img-box">
                                    <img
                                        src="assets/images/products/2.jpg"
                                        alt="men's hoodies t-shirt"
                                        class="showcase-img"
                                        width="75"
                                        height="75"
                                    />
                                </a>

                                <div class="showcase-content">
                                    <a href="#">
                                        <h4 class="showcase-title">
                                            men's hoodies t-shirt
                                        </h4>
                                    </a>
                                    <div class="showcase-rating">
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon
                                            name="star-half-outline"
                                        ></ion-icon>
                                    </div>

                                    <div class="price-box">
                                        <del>$17.00</del>
                                        <p class="price">$7.00</p>
                                    </div>
                                </div>
                            </div>

                            <div class="showcase">
                                <a href="#" class="showcase-img-box">
                                    <img
                                        src="assets/images/products/3.jpg"
                                        alt="girls t-shirt"
                                        class="showcase-img"
                                        width="75"
                                        height="75"
                                    />
                                </a>

                                <div class="showcase-content">
                                    <a href="#">
                                        <h4 class="showcase-title">
                                            girls t-shirt
                                        </h4>
                                    </a>
                                    <div class="showcase-rating">
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon
                                            name="star-half-outline"
                                        ></ion-icon>
                                    </div>

                                    <div class="price-box">
                                        <del>$5.00</del>
                                        <p class="price">$3.00</p>
                                    </div>
                                </div>
                            </div>

                            <div class="showcase">
                                <a href="#" class="showcase-img-box">
                                    <img
                                        src="assets/images/products/4.jpg"
                                        alt="woolen hat for men"
                                        class="showcase-img"
                                        width="75"
                                        height="75"
                                    />
                                </a>

                                <div class="showcase-content">
                                    <a href="#">
                                        <h4 class="showcase-title">
                                            woolen hat for men
                                        </h4>
                                    </a>
                                    <div class="showcase-rating">
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star"></ion-icon>
                                    </div>

                                    <div class="price-box">
                                        <del>$15.00</del>
                                        <p class="price">$12.00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
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
