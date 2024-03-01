<script setup>
import { Head, Link } from "@inertiajs/vue3";
import Layout from "../../Layouts/Layout.vue";
import Banner from "../Home/Partials/Bnner.vue";
import CategoryBox from "../Home/Partials/CategoryBox.vue";
import CategoryList from "../Home/Partials/CategoryList.vue";
import ProductShowcase from "../Home/Partials/ProductShowcase.vue";
import BuyingOffer from "../Home/Partials/BuyingOffer.vue";
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
                            :SubCategory="category.children"
                        />
                    </ul>
                </div>

                <div class="product-showcase">
                    <h3 class="showcase-heading">best sellers</h3>
                    <div class="showcase-wrapper">
                        <div class="showcase-container">
                            <!-- <ProductBox
                                v-for="product in products"
                                :key="product.id"
                                :content="product"
                                :rating="true"
                            /> -->
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
                </div>

                <!--
            - PRODUCT FEATURED
          -->

                <!-- <div class="product-featured">
                    <h2 class="title">Deal of the day</h2>

                    <div class="showcase-wrapper has-scrollbar">
                        <div class="showcase-container">
                            <div class="showcase">
                                <div class="showcase-banner">
                                    <img
                                        src="assets/images/products/shampoo.jpg"
                                        alt="shampoo, conditioner & facewash packs"
                                        class="showcase-img"
                                    />
                                </div>

                                <div class="showcase-content">
                                    <div class="showcase-rating">
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon
                                            name="star-outline"
                                        ></ion-icon>
                                        <ion-icon
                                            name="star-outline"
                                        ></ion-icon>
                                    </div>

                                    <a href="#">
                                        <h3 class="showcase-title">
                                            shampoo, conditioner & facewash
                                            packs
                                        </h3>
                                    </a>

                                    <p class="showcase-desc">
                                        Lorem ipsum dolor sit amet consectetur
                                        Lorem ipsum dolor dolor sit amet
                                        consectetur Lorem ipsum dolor
                                    </p>

                                    <div class="price-box">
                                        <p class="price">$150.00</p>

                                        <del>$200.00</del>
                                    </div>

                                    <button class="add-cart-btn">
                                        add to cart
                                    </button>

                                    <div class="showcase-status">
                                        <div class="wrapper">
                                            <p>already sold: <b>20</b></p>

                                            <p>available: <b>40</b></p>
                                        </div>

                                        <div class="showcase-status-bar"></div>
                                    </div>

                                    <div class="countdown-box">
                                        <p class="countdown-desc">
                                            Hurry Up! Offer ends in:
                                        </p>

                                        <div class="countdown">
                                            <div class="countdown-content">
                                                <p class="display-number">
                                                    360
                                                </p>

                                                <p class="display-text">Days</p>
                                            </div>

                                            <div class="countdown-content">
                                                <p class="display-number">24</p>
                                                <p class="display-text">
                                                    Hours
                                                </p>
                                            </div>

                                            <div class="countdown-content">
                                                <p class="display-number">59</p>
                                                <p class="display-text">Min</p>
                                            </div>

                                            <div class="countdown-content">
                                                <p class="display-number">00</p>
                                                <p class="display-text">Sec</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="showcase-container">
                            <div class="showcase">
                                <div class="showcase-banner">
                                    <img
                                        src="assets/images/products/jewellery-1.jpg"
                                        alt="Rose Gold diamonds Earring"
                                        class="showcase-img"
                                    />
                                </div>

                                <div class="showcase-content">
                                    <div class="showcase-rating">
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon
                                            name="star-outline"
                                        ></ion-icon>
                                        <ion-icon
                                            name="star-outline"
                                        ></ion-icon>
                                    </div>

                                    <h3 class="showcase-title">
                                        <a href="#" class="showcase-title"
                                            >Rose Gold diamonds Earring</a
                                        >
                                    </h3>

                                    <p class="showcase-desc">
                                        Lorem ipsum dolor sit amet consectetur
                                        Lorem ipsum dolor dolor sit amet
                                        consectetur Lorem ipsum dolor
                                    </p>

                                    <div class="price-box">
                                        <p class="price">$1990.00</p>
                                        <del>$2000.00</del>
                                    </div>

                                    <button class="add-cart-btn">
                                        add to cart
                                    </button>

                                    <div class="showcase-status">
                                        <div class="wrapper">
                                            <p>already sold: <b>15</b></p>

                                            <p>available: <b>40</b></p>
                                        </div>

                                        <div class="showcase-status-bar"></div>
                                    </div>

                                    <div class="countdown-box">
                                        <p class="countdown-desc">
                                            Hurry Up! Offer ends in:
                                        </p>

                                        <div class="countdown">
                                            <div class="countdown-content">
                                                <p class="display-number">
                                                    360
                                                </p>
                                                <p class="display-text">Days</p>
                                            </div>

                                            <div class="countdown-content">
                                                <p class="display-number">24</p>
                                                <p class="display-text">
                                                    Hours
                                                </p>
                                            </div>

                                            <div class="countdown-content">
                                                <p class="display-number">59</p>
                                                <p class="display-text">Min</p>
                                            </div>

                                            <div class="countdown-content">
                                                <p class="display-number">00</p>
                                                <p class="display-text">Sec</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!--
            - PRODUCT GRID
          -->

                <!-- <div class="product-main">
                    <h2 class="title">New Products</h2>

                    <div class="product-grid">
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
                                        <ion-icon
                                            name="heart-outline"
                                        ></ion-icon>
                                    </button>

                                    <button class="btn-action">
                                        <ion-icon name="eye-outline"></ion-icon>
                                    </button>

                                    <button class="btn-action">
                                        <ion-icon
                                            name="repeat-outline"
                                        ></ion-icon>
                                    </button>

                                    <button class="btn-action">
                                        <ion-icon
                                            name="bag-add-outline"
                                        ></ion-icon>
                                    </button>
                                </div>
                            </div>

                            <div class="showcase-content">
                                <a href="#" class="showcase-category">jacket</a>

                                <a href="#">
                                    <h3 class="showcase-title">
                                        Mens Winter Leathers Jackets
                                    </h3>
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

                        <div class="showcase">
                            <div class="showcase-banner">
                                <img
                                    src="assets/images/products/shirt-1.jpg"
                                    alt="Pure Garment Dyed Cotton Shirt"
                                    class="product-img default"
                                    width="300"
                                />
                                <img
                                    src="assets/images/products/shirt-2.jpg"
                                    alt="Pure Garment Dyed Cotton Shirt"
                                    class="product-img hover"
                                    width="300"
                                />

                                <p class="showcase-badge angle black">sale</p>

                                <div class="showcase-actions">
                                    <button class="btn-action">
                                        <ion-icon
                                            name="heart-outline"
                                        ></ion-icon>
                                    </button>

                                    <button class="btn-action">
                                        <ion-icon name="eye-outline"></ion-icon>
                                    </button>

                                    <button class="btn-action">
                                        <ion-icon
                                            name="repeat-outline"
                                        ></ion-icon>
                                    </button>

                                    <button class="btn-action">
                                        <ion-icon
                                            name="bag-add-outline"
                                        ></ion-icon>
                                    </button>
                                </div>
                            </div>

                            <div class="showcase-content">
                                <a href="#" class="showcase-category">shirt</a>

                                <h3>
                                    <a href="#" class="showcase-title"
                                        >Pure Garment Dyed Cotton Shirt</a
                                    >
                                </h3>

                                <div class="showcase-rating">
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star-outline"></ion-icon>
                                    <ion-icon name="star-outline"></ion-icon>
                                </div>

                                <div class="price-box">
                                    <p class="price">$45.00</p>
                                    <del>$56.00</del>
                                </div>
                            </div>
                        </div>

                        <div class="showcase">
                            <div class="showcase-banner">
                                <img
                                    src="assets/images/products/jacket-5.jpg"
                                    alt="MEN Yarn Fleece Full-Zip Jacket"
                                    class="product-img default"
                                    width="300"
                                />
                                <img
                                    src="assets/images/products/jacket-6.jpg"
                                    alt="MEN Yarn Fleece Full-Zip Jacket"
                                    class="product-img hover"
                                    width="300"
                                />

                                <div class="showcase-actions">
                                    <button class="btn-action">
                                        <ion-icon
                                            name="heart-outline"
                                        ></ion-icon>
                                    </button>

                                    <button class="btn-action">
                                        <ion-icon name="eye-outline"></ion-icon>
                                    </button>

                                    <button class="btn-action">
                                        <ion-icon
                                            name="repeat-outline"
                                        ></ion-icon>
                                    </button>

                                    <button class="btn-action">
                                        <ion-icon
                                            name="bag-add-outline"
                                        ></ion-icon>
                                    </button>
                                </div>
                            </div>

                            <div class="showcase-content">
                                <a href="#" class="showcase-category">Jacket</a>

                                <h3>
                                    <a href="#" class="showcase-title"
                                        >MEN Yarn Fleece Full-Zip Jacket</a
                                    >
                                </h3>

                                <div class="showcase-rating">
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star-outline"></ion-icon>
                                    <ion-icon name="star-outline"></ion-icon>
                                </div>

                                <div class="price-box">
                                    <p class="price">$58.00</p>
                                    <del>$65.00</del>
                                </div>
                            </div>
                        </div>

                        <div class="showcase">
                            <div class="showcase-banner">
                                <img
                                    src="assets/images/products/clothes-3.jpg"
                                    alt="Black Floral Wrap Midi Skirt"
                                    class="product-img default"
                                    width="300"
                                />
                                <img
                                    src="assets/images/products/clothes-4.jpg"
                                    alt="Black Floral Wrap Midi Skirt"
                                    class="product-img hover"
                                    width="300"
                                />

                                <p class="showcase-badge angle pink">new</p>

                                <div class="showcase-actions">
                                    <button class="btn-action">
                                        <ion-icon
                                            name="heart-outline"
                                        ></ion-icon>
                                    </button>

                                    <button class="btn-action">
                                        <ion-icon name="eye-outline"></ion-icon>
                                    </button>

                                    <button class="btn-action">
                                        <ion-icon
                                            name="repeat-outline"
                                        ></ion-icon>
                                    </button>

                                    <button class="btn-action">
                                        <ion-icon
                                            name="bag-add-outline"
                                        ></ion-icon>
                                    </button>
                                </div>
                            </div>

                            <div class="showcase-content">
                                <a href="#" class="showcase-category">skirt</a>

                                <h3>
                                    <a href="#" class="showcase-title"
                                        >Black Floral Wrap Midi Skirt</a
                                    >
                                </h3>

                                <div class="showcase-rating">
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                </div>

                                <div class="price-box">
                                    <p class="price">$25.00</p>
                                    <del>$35.00</del>
                                </div>
                            </div>
                        </div>

                        <div class="showcase">
                            <div class="showcase-banner">
                                <img
                                    src="assets/images/products/shoe-2.jpg"
                                    alt="Casual Men's Brown shoes"
                                    class="product-img default"
                                    width="300"
                                />
                                <img
                                    src="assets/images/products/shoe-2_1.jpg"
                                    alt="Casual Men's Brown shoes"
                                    class="product-img hover"
                                    width="300"
                                />

                                <div class="showcase-actions">
                                    <button class="btn-action">
                                        <ion-icon
                                            name="heart-outline"
                                        ></ion-icon>
                                    </button>

                                    <button class="btn-action">
                                        <ion-icon name="eye-outline"></ion-icon>
                                    </button>

                                    <button class="btn-action">
                                        <ion-icon
                                            name="repeat-outline"
                                        ></ion-icon>
                                    </button>

                                    <button class="btn-action">
                                        <ion-icon
                                            name="bag-add-outline"
                                        ></ion-icon>
                                    </button>
                                </div>
                            </div>

                            <div class="showcase-content">
                                <a href="#" class="showcase-category">casual</a>

                                <h3>
                                    <a href="#" class="showcase-title"
                                        >Casual Men's Brown shoes</a
                                    >
                                </h3>

                                <div class="showcase-rating">
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                </div>

                                <div class="price-box">
                                    <p class="price">$99.00</p>
                                    <del>$105.00</del>
                                </div>
                            </div>
                        </div>

                        <div class="showcase">
                            <div class="showcase-banner">
                                <img
                                    src="assets/images/products/watch-3.jpg"
                                    alt="Pocket Watch Leather Pouch"
                                    class="product-img default"
                                    width="300"
                                />
                                <img
                                    src="assets/images/products/watch-4.jpg"
                                    alt="Pocket Watch Leather Pouch"
                                    class="product-img hover"
                                    width="300"
                                />

                                <p class="showcase-badge angle black">sale</p>

                                <div class="showcase-actions">
                                    <button class="btn-action">
                                        <ion-icon
                                            name="heart-outline"
                                        ></ion-icon>
                                    </button>

                                    <button class="btn-action">
                                        <ion-icon name="eye-outline"></ion-icon>
                                    </button>

                                    <button class="btn-action">
                                        <ion-icon
                                            name="repeat-outline"
                                        ></ion-icon>
                                    </button>

                                    <button class="btn-action">
                                        <ion-icon
                                            name="bag-add-outline"
                                        ></ion-icon>
                                    </button>
                                </div>
                            </div>

                            <div class="showcase-content">
                                <a href="#" class="showcase-category"
                                    >watches</a
                                >

                                <h3>
                                    <a href="#" class="showcase-title"
                                        >Pocket Watch Leather Pouch</a
                                    >
                                </h3>

                                <div class="showcase-rating">
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star-outline"></ion-icon>
                                    <ion-icon name="star-outline"></ion-icon>
                                </div>

                                <div class="price-box">
                                    <p class="price">$150.00</p>
                                    <del>$170.00</del>
                                </div>
                            </div>
                        </div>

                        <div class="showcase">
                            <div class="showcase-banner">
                                <img
                                    src="assets/images/products/watch-1.jpg"
                                    alt="Smart watche Vital Plus"
                                    class="product-img default"
                                    width="300"
                                />
                                <img
                                    src="assets/images/products/watch-2.jpg"
                                    alt="Smart watche Vital Plus"
                                    class="product-img hover"
                                    width="300"
                                />

                                <div class="showcase-actions">
                                    <button class="btn-action">
                                        <ion-icon
                                            name="heart-outline"
                                        ></ion-icon>
                                    </button>

                                    <button class="btn-action">
                                        <ion-icon name="eye-outline"></ion-icon>
                                    </button>

                                    <button class="btn-action">
                                        <ion-icon
                                            name="repeat-outline"
                                        ></ion-icon>
                                    </button>

                                    <button class="btn-action">
                                        <ion-icon
                                            name="bag-add-outline"
                                        ></ion-icon>
                                    </button>
                                </div>
                            </div>

                            <div class="showcase-content">
                                <a href="#" class="showcase-category"
                                    >watches</a
                                >

                                <h3>
                                    <a href="#" class="showcase-title"
                                        >Smart watche Vital Plus</a
                                    >
                                </h3>

                                <div class="showcase-rating">
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star-outline"></ion-icon>
                                </div>

                                <div class="price-box">
                                    <p class="price">$100.00</p>
                                    <del>$120.00</del>
                                </div>
                            </div>
                        </div>

                        <div class="showcase">
                            <div class="showcase-banner">
                                <img
                                    src="assets/images/products/party-wear-1.jpg"
                                    alt="Womens Party Wear Shoes"
                                    class="product-img default"
                                    width="300"
                                />
                                <img
                                    src="assets/images/products/party-wear-2.jpg"
                                    alt="Womens Party Wear Shoes"
                                    class="product-img hover"
                                    width="300"
                                />

                                <p class="showcase-badge angle black">sale</p>

                                <div class="showcase-actions">
                                    <button class="btn-action">
                                        <ion-icon
                                            name="heart-outline"
                                        ></ion-icon>
                                    </button>

                                    <button class="btn-action">
                                        <ion-icon name="eye-outline"></ion-icon>
                                    </button>

                                    <button class="btn-action">
                                        <ion-icon
                                            name="repeat-outline"
                                        ></ion-icon>
                                    </button>

                                    <button class="btn-action">
                                        <ion-icon
                                            name="bag-add-outline"
                                        ></ion-icon>
                                    </button>
                                </div>
                            </div>

                            <div class="showcase-content">
                                <a href="#" class="showcase-category"
                                    >party wear</a
                                >

                                <h3>
                                    <a href="#" class="showcase-title"
                                        >Womens Party Wear Shoes</a
                                    >
                                </h3>

                                <div class="showcase-rating">
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star-outline"></ion-icon>
                                    <ion-icon name="star-outline"></ion-icon>
                                </div>

                                <div class="price-box">
                                    <p class="price">$25.00</p>
                                    <del>$30.00</del>
                                </div>
                            </div>
                        </div>

                        <div class="showcase">
                            <div class="showcase-banner">
                                <img
                                    src="assets/images/products/jacket-1.jpg"
                                    alt="Mens Winter Leathers Jackets"
                                    class="product-img default"
                                    width="300"
                                />
                                <img
                                    src="assets/images/products/jacket-2.jpg"
                                    alt="Mens Winter Leathers Jackets"
                                    class="product-img hover"
                                    width="300"
                                />

                                <div class="showcase-actions">
                                    <button class="btn-action">
                                        <ion-icon
                                            name="heart-outline"
                                        ></ion-icon>
                                    </button>

                                    <button class="btn-action">
                                        <ion-icon name="eye-outline"></ion-icon>
                                    </button>

                                    <button class="btn-action">
                                        <ion-icon
                                            name="repeat-outline"
                                        ></ion-icon>
                                    </button>

                                    <button class="btn-action">
                                        <ion-icon
                                            name="bag-add-outline"
                                        ></ion-icon>
                                    </button>
                                </div>
                            </div>

                            <div class="showcase-content">
                                <a href="#" class="showcase-category">jacket</a>

                                <h3>
                                    <a href="#" class="showcase-title"
                                        >Mens Winter Leathers Jackets</a
                                    >
                                </h3>

                                <div class="showcase-rating">
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star-outline"></ion-icon>
                                </div>

                                <div class="price-box">
                                    <p class="price">$32.00</p>
                                    <del>$45.00</del>
                                </div>
                            </div>
                        </div>

                        <div class="showcase">
                            <div class="showcase-banner">
                                <img
                                    src="assets/images/products/sports-2.jpg"
                                    alt="Trekking & Running Shoes - black"
                                    class="product-img default"
                                    width="300"
                                />
                                <img
                                    src="assets/images/products/sports-4.jpg"
                                    alt="Trekking & Running Shoes - black"
                                    class="product-img hover"
                                    width="300"
                                />

                                <p class="showcase-badge angle black">sale</p>

                                <div class="showcase-actions">
                                    <button class="btn-action">
                                        <ion-icon
                                            name="heart-outline"
                                        ></ion-icon>
                                    </button>

                                    <button class="btn-action">
                                        <ion-icon name="eye-outline"></ion-icon>
                                    </button>

                                    <button class="btn-action">
                                        <ion-icon
                                            name="repeat-outline"
                                        ></ion-icon>
                                    </button>

                                    <button class="btn-action">
                                        <ion-icon
                                            name="bag-add-outline"
                                        ></ion-icon>
                                    </button>
                                </div>
                            </div>

                            <div class="showcase-content">
                                <a href="#" class="showcase-category">sports</a>

                                <h3>
                                    <a href="#" class="showcase-title"
                                        >Trekking & Running Shoes - black</a
                                    >
                                </h3>

                                <div class="showcase-rating">
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star-outline"></ion-icon>
                                    <ion-icon name="star-outline"></ion-icon>
                                </div>

                                <div class="price-box">
                                    <p class="price">$58.00</p>
                                    <del>$64.00</del>
                                </div>
                            </div>
                        </div>

                        <div class="showcase">
                            <div class="showcase-banner">
                                <img
                                    src="assets/images/products/shoe-1.jpg"
                                    alt="Men's Leather Formal Wear shoes"
                                    class="product-img default"
                                    width="300"
                                />
                                <img
                                    src="assets/images/products/shoe-1_1.jpg"
                                    alt="Men's Leather Formal Wear shoes"
                                    class="product-img hover"
                                    width="300"
                                />

                                <div class="showcase-actions">
                                    <button class="btn-action">
                                        <ion-icon
                                            name="heart-outline"
                                        ></ion-icon>
                                    </button>

                                    <button class="btn-action">
                                        <ion-icon name="eye-outline"></ion-icon>
                                    </button>

                                    <button class="btn-action">
                                        <ion-icon
                                            name="repeat-outline"
                                        ></ion-icon>
                                    </button>

                                    <button class="btn-action">
                                        <ion-icon
                                            name="bag-add-outline"
                                        ></ion-icon>
                                    </button>
                                </div>
                            </div>

                            <div class="showcase-content">
                                <a href="#" class="showcase-category">formal</a>

                                <h3>
                                    <a href="#" class="showcase-title"
                                        >Men's Leather Formal Wear shoes</a
                                    >
                                </h3>

                                <div class="showcase-rating">
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star-outline"></ion-icon>
                                </div>

                                <div class="price-box">
                                    <p class="price">$50.00</p>
                                    <del>$65.00</del>
                                </div>
                            </div>
                        </div>

                        <div class="showcase">
                            <div class="showcase-banner">
                                <img
                                    src="assets/images/products/shorts-1.jpg"
                                    alt="Better Basics French Terry Sweatshorts"
                                    class="product-img default"
                                    width="300"
                                />
                                <img
                                    src="assets/images/products/shorts-2.jpg"
                                    alt="Better Basics French Terry Sweatshorts"
                                    class="product-img hover"
                                    width="300"
                                />

                                <p class="showcase-badge angle black">sale</p>

                                <div class="showcase-actions">
                                    <button class="btn-action">
                                        <ion-icon
                                            name="heart-outline"
                                        ></ion-icon>
                                    </button>

                                    <button class="btn-action">
                                        <ion-icon name="eye-outline"></ion-icon>
                                    </button>

                                    <button class="btn-action">
                                        <ion-icon
                                            name="repeat-outline"
                                        ></ion-icon>
                                    </button>

                                    <button class="btn-action">
                                        <ion-icon
                                            name="bag-add-outline"
                                        ></ion-icon>
                                    </button>
                                </div>
                            </div>

                            <div class="showcase-content">
                                <a href="#" class="showcase-category">shorts</a>

                                <h3>
                                    <a href="#" class="showcase-title"
                                        >Better Basics French Terry
                                        Sweatshorts</a
                                    >
                                </h3>

                                <div class="showcase-rating">
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star"></ion-icon>
                                    <ion-icon name="star-outline"></ion-icon>
                                    <ion-icon name="star-outline"></ion-icon>
                                </div>

                                <div class="price-box">
                                    <p class="price">$78.00</p>
                                    <del>$85.00</del>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
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
