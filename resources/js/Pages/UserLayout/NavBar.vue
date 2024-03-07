<template>
    <div class="header-top">
        <div class="container">
            <ul class="header-social-container">
                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-linkedin"></ion-icon>
                    </a>
                </li>
            </ul>

            <div class="header-alert-news">
                <p>
                    <b>Free Shipping</b>
                    This Week Order Over - $55
                </p>
            </div>

            <div class="header-top-actions">
                <div class="header-top-actions" v-if="isLogin">
                    <Link
                        :href="route('login')"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                        >Log in</Link
                    >
                    <Link
                        :href="route('register')"
                        class="ms-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                        >Register</Link
                    >
                </div>

                <div v-else>
                    <Link
                        :href="route('logout')"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                        method="post"
                        >Logout</Link
                    >
                </div>
            </div>
        </div>
    </div>

    <div class="header-main">
        <div class="container">
            <a href="#" class="header-logo">
                <img
                    src="/assets/images/logo/logo.svg"
                    alt="Anon's logo"
                    width="120"
                    height="36"
                />
            </a>

            <div class="header-search-container">
                <input
                    type="search"
                    name="search"
                    class="search-field"
                    placeholder="Enter your product name..."
                />

                <button class="search-btn">
                    <ion-icon name="search-outline"></ion-icon>
                </button>
            </div>

            <div class="header-user-actions">
                <button class="action-btn">
                    <ion-icon :color="blue" name="person-outline"></ion-icon>
                </button>

                <Link href="/favorites/">
                    <button class="action-btn">
                        <ion-icon name="heart-outline"></ion-icon>
                        <span class="count">{{ favCount }}</span>
                    </button>
                </Link>
                <Link href="/carts/">
                    <button class="action-btn">
                        <ion-icon name="bag-handle-outline"></ion-icon>
                        <span class="count">{{ cartUser }}</span>
                    </button>
                </Link>
            </div>
        </div>
    </div>

    <nav class="desktop-navigation-menu">
        <div class="container">
            <ul class="desktop-menu-category-list">
                <li class="menu-category">
                    <Link :href="route('home')" class="menu-title" method="get"
                        >Home</Link
                    >
                </li>

                <li class="menu-category">
                    <a href="#" class="menu-title">Categories</a>

                    <div class="dropdown-panel">
                        <ul class="dropdown-panel-list">
                            <li class="menu-title">
                                <a href="#">Electronics</a>
                            </li>

                            <li class="panel-list-item">
                                <a href="#">Desktop</a>
                            </li>

                            <li class="panel-list-item">
                                <a href="#">Laptop</a>
                            </li>

                            <li class="panel-list-item">
                                <a href="#">Camera</a>
                            </li>

                            <li class="panel-list-item">
                                <a href="#">Tablet</a>
                            </li>

                            <li class="panel-list-item">
                                <a href="#">Headphone</a>
                            </li>

                            <li class="panel-list-item">
                                <a href="#">
                                    <img
                                        src="/assets/images/electronics-banner-1.jpg"
                                        alt="headphone collection"
                                        width="250"
                                        height="119"
                                    />
                                </a>
                            </li>
                        </ul>

                        <ul class="dropdown-panel-list">
                            <li class="menu-title">
                                <a href="#">Men's</a>
                            </li>

                            <li class="panel-list-item">
                                <a href="#">Formal</a>
                            </li>

                            <li class="panel-list-item">
                                <a href="#">Casual</a>
                            </li>

                            <li class="panel-list-item">
                                <a href="#">Sports</a>
                            </li>

                            <li class="panel-list-item">
                                <a href="#">Jacket</a>
                            </li>

                            <li class="panel-list-item">
                                <a href="#">Sunglasses</a>
                            </li>

                            <li class="panel-list-item">
                                <a href="#">
                                    <img
                                        src="/assets/images/mens-banner.jpg"
                                        alt="men's fashion"
                                        width="250"
                                        height="119"
                                    />
                                </a>
                            </li>
                        </ul>

                        <ul class="dropdown-panel-list">
                            <li class="menu-title">
                                <a href="#">Women's</a>
                            </li>

                            <li class="panel-list-item">
                                <a href="#">Formal</a>
                            </li>

                            <li class="panel-list-item">
                                <a href="#">Casual</a>
                            </li>

                            <li class="panel-list-item">
                                <a href="#">Perfume</a>
                            </li>

                            <li class="panel-list-item">
                                <a href="#">Cosmetics</a>
                            </li>

                            <li class="panel-list-item">
                                <a href="#">Bags</a>
                            </li>

                            <li class="panel-list-item">
                                <a href="#">
                                    <img
                                        src="/assets/images/womens-banner.jpg"
                                        alt="women's fashion"
                                        width="250"
                                        height="119"
                                    />
                                </a>
                            </li>
                        </ul>

                        <ul class="dropdown-panel-list">
                            <li class="menu-title">
                                <a href="#">Electronics</a>
                            </li>

                            <li class="panel-list-item">
                                <a href="#">Smart Watch</a>
                            </li>

                            <li class="panel-list-item">
                                <a href="#">Smart TV</a>
                            </li>

                            <li class="panel-list-item">
                                <a href="#">Keyboard</a>
                            </li>

                            <li class="panel-list-item">
                                <a href="#">Mouse</a>
                            </li>

                            <li class="panel-list-item">
                                <a href="#">Microphone</a>
                            </li>

                            <li class="panel-list-item">
                                <a href="#">
                                    <img
                                        src="/assets/images/electronics-banner-2.jpg"
                                        alt="mouse collection"
                                        width="250"
                                        height="119"
                                    />
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="menu-category">
                    <a href="#" class="menu-title">Men's</a>

                    <ul class="dropdown-list">
                        <li class="dropdown-item">
                            <a href="#">Shirt</a>
                        </li>

                        <li class="dropdown-item">
                            <a href="#">Shorts & Jeans</a>
                        </li>

                        <li class="dropdown-item">
                            <a href="#">Safety Shoes</a>
                        </li>

                        <li class="dropdown-item">
                            <a href="#">Wallet</a>
                        </li>
                    </ul>
                </li>

                <li class="menu-category">
                    <a href="#" class="menu-title">Women's</a>

                    <ul class="dropdown-list">
                        <li class="dropdown-item">
                            <a href="#">Dress & Frock</a>
                        </li>

                        <li class="dropdown-item">
                            <a href="#">Earrings</a>
                        </li>

                        <li class="dropdown-item">
                            <a href="#">Necklace</a>
                        </li>

                        <li class="dropdown-item">
                            <a href="#">Makeup Kit</a>
                        </li>
                    </ul>
                </li>

                <li class="menu-category">
                    <a href="#" class="menu-title">Jewelry</a>

                    <ul class="dropdown-list">
                        <li class="dropdown-item">
                            <a href="#">Earrings</a>
                        </li>

                        <li class="dropdown-item">
                            <a href="#">Couple Rings</a>
                        </li>

                        <li class="dropdown-item">
                            <a href="#">Necklace</a>
                        </li>

                        <li class="dropdown-item">
                            <a href="#">Bracelets</a>
                        </li>
                    </ul>
                </li>

                <li class="menu-category">
                    <a href="#" class="menu-title">Perfume</a>

                    <ul class="dropdown-list">
                        <li class="dropdown-item">
                            <a href="#">Clothes Perfume</a>
                        </li>

                        <li class="dropdown-item">
                            <a href="#">Deodorant</a>
                        </li>

                        <li class="dropdown-item">
                            <a href="#">Flower Fragrance</a>
                        </li>

                        <li class="dropdown-item">
                            <a href="#">Air Freshener</a>
                        </li>
                    </ul>
                </li>

                <li class="menu-category">
                    <a href="#" class="menu-title">Blog</a>
                </li>

                <li class="menu-category">
                    <a href="#" class="menu-title">Hot Offers</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="mobile-bottom-navigation">
        <button class="action-btn" data-mobile-menu-open-btn>
            <ion-icon name="menu-outline"></ion-icon>
        </button>

        <button class="action-btn">
            <ion-icon name="bag-handle-outline"></ion-icon>

            <span class="count">0</span>
        </button>

        <button class="action-btn">
            <ion-icon name="home-outline"></ion-icon>
        </button>
        <Link href="/favorites/">
            <button class="action-btn">
                <ion-icon name="heart-outline"></ion-icon>
                <span class="count">{{ favCount }}</span>
            </button>
        </Link>

        <button class="action-btn" data-mobile-menu-open-btn>
            <ion-icon name="grid-outline"></ion-icon>
        </button>
    </div>

    <nav class="mobile-navigation-menu has-scrollbar" data-mobile-menu>
        <div class="menu-top">
            <h2 class="menu-title">Menu</h2>

            <button class="menu-close-btn" data-mobile-menu-close-btn>
                <ion-icon name="close-outline"></ion-icon>
            </button>
        </div>

        <ul class="mobile-menu-category-list">
            <li class="menu-category">
                <Link :href="route('home')" class="menu-title" method="get"
                    >Home</Link
                >
            </li>

            <li class="menu-category">
                <button class="accordion-menu" data-accordion-btn>
                    <p class="menu-title">Men's</p>

                    <div>
                        <ion-icon
                            name="add-outline"
                            class="add-icon"
                        ></ion-icon>
                        <ion-icon
                            name="remove-outline"
                            class="remove-icon"
                        ></ion-icon>
                    </div>
                </button>

                <ul class="submenu-category-list" data-accordion>
                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Shirt</a>
                    </li>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Shorts & Jeans</a>
                    </li>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Safety Shoes</a>
                    </li>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Wallet</a>
                    </li>
                </ul>
            </li>

            <li class="menu-category">
                <button class="accordion-menu" data-accordion-btn>
                    <p class="menu-title">Women's</p>

                    <div>
                        <ion-icon
                            name="add-outline"
                            class="add-icon"
                        ></ion-icon>
                        <ion-icon
                            name="remove-outline"
                            class="remove-icon"
                        ></ion-icon>
                    </div>
                </button>

                <ul class="submenu-category-list" data-accordion>
                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Dress & Frock</a>
                    </li>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Earrings</a>
                    </li>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Necklace</a>
                    </li>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Makeup Kit</a>
                    </li>
                </ul>
            </li>

            <li class="menu-category">
                <button class="accordion-menu" data-accordion-btn>
                    <p class="menu-title">Jewelry</p>

                    <div>
                        <ion-icon
                            name="add-outline"
                            class="add-icon"
                        ></ion-icon>
                        <ion-icon
                            name="remove-outline"
                            class="remove-icon"
                        ></ion-icon>
                    </div>
                </button>

                <ul class="submenu-category-list" data-accordion>
                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Earrings</a>
                    </li>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Couple Rings</a>
                    </li>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Necklace</a>
                    </li>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Bracelets</a>
                    </li>
                </ul>
            </li>

            <li class="menu-category">
                <button class="accordion-menu" data-accordion-btn>
                    <p class="menu-title">Perfume</p>

                    <div>
                        <ion-icon
                            name="add-outline"
                            class="add-icon"
                        ></ion-icon>
                        <ion-icon
                            name="remove-outline"
                            class="remove-icon"
                        ></ion-icon>
                    </div>
                </button>

                <ul class="submenu-category-list" data-accordion>
                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Clothes Perfume</a>
                    </li>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Deodorant</a>
                    </li>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Flower Fragrance</a>
                    </li>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Air Freshener</a>
                    </li>
                </ul>
            </li>

            <li class="menu-category">
                <a href="#" class="menu-title">Blog</a>
            </li>

            <li class="menu-category">
                <a href="#" class="menu-title">Hot Offers</a>
            </li>
        </ul>

        <div class="menu-bottom">
            <ul class="menu-category-list">
                <li class="menu-category">
                    <button class="accordion-menu" data-accordion-btn>
                        <p class="menu-title">Language</p>

                        <ion-icon
                            name="caret-back-outline"
                            class="caret-back"
                        ></ion-icon>
                    </button>

                    <ul class="submenu-category-list" data-accordion>
                        <li class="submenu-category">
                            <a href="#" class="submenu-title">English</a>
                        </li>

                        <li class="submenu-category">
                            <a href="#" class="submenu-title">Espa&ntilde;ol</a>
                        </li>

                        <li class="submenu-category">
                            <a href="#" class="submenu-title">Fren&ccedil;h</a>
                        </li>
                    </ul>
                </li>

                <li class="menu-category">
                    <button class="accordion-menu" data-accordion-btn>
                        <p class="menu-title">Currency</p>
                        <ion-icon
                            name="caret-back-outline"
                            class="caret-back"
                        ></ion-icon>
                    </button>

                    <ul class="submenu-category-list" data-accordion>
                        <li class="submenu-category">
                            <a href="#" class="submenu-title">USD &dollar;</a>
                        </li>

                        <li class="submenu-category">
                            <a href="#" class="submenu-title">EUR &euro;</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <ul class="menu-social-container">
                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-linkedin"></ion-icon>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- <p v-if="favCount !== null">Favorite Count: {{ favCount }}</p> -->
</template>

<script setup>
import { computed } from "vue";
import { Link, usePage } from "@inertiajs/vue3";

const favCount = computed(() => {
    return usePage().props.favUser ?? 0;
    // Assuming you want to return 0 if favUser is null
});
const cartUser = computed(() => {
    return usePage().props.cartUser ?? 0; // If favUser is null or undefined, set the default value to 0
});
</script>

<script>
export default {
    props: {
        favCount: {
            type: String,
        },
        cartCount: {
            type: String,
        },
    },
    computed: {
        isLogin() {
            return this.$page.props.isLogin;
        },
    },
};
</script>
<style></style>
