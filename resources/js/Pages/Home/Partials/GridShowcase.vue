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
                <button
                    class="btn-action bg-black"
                    :disabled="isProgress"
                    @click="addToFav(product)"
                >
                    <!-- :disabled="isProgress" -->
                    <ion-icon name="heart-outline"></ion-icon>
                </button>
                <Link
                    class="btn-action"
                    :href="'/products/' + product.name"
                    method="get"
                    as="button"
                    ><ion-icon name="eye-outline"></ion-icon
                ></Link>

                <button class="btn-action">
                    <ion-icon name="repeat-outline"></ion-icon>
                </button>

                <button
                    class="btn-action"
                    @click="addToCart(product)"
                    :disabled="isProgress"
                >
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
import Button from "@/Components/Button.vue";
import ProductBox from "../Partials/ProductBox.vue";
import Image from "@/Components/Image.vue";
import Swal from "sweetalert2";
import { Link, router, usePage } from "@inertiajs/vue3";
import { Inertia } from "@inertiajs/inertia";
import { ref, computed } from "vue";

const { ProductData, category_name } = defineProps({
    ProductData: { type: Object, required: true },
    category_name: { type: String, required: true },
});
const auth = usePage().props.auth;
const isProgress = ref(false); // Define isProgress as a reactive reference
const addToFav = (product) => {
    isProgress.value = true;
    if (auth.user && auth.user.id) {
        const data = {
            user_id: auth.user.id,
            product_id: product.id,
        };
        // Check if the product is already in the favorites
        router.post("/favorites/create", data, {
            onSuccess: (page) => {
                console.log("Response from server:", page);
                if (page.props.flash.message) {
                    console.log("Success message:", page.props.flash.message);
                    Swal.fire({
                        toast: true,
                        icon: "success",
                        position: "top-start",
                        showConfirmButton: false,
                        title: page.props.flash.message,
                        timer: 2000,
                    });
                    isProgress.value = false;
                }
            },
            preserveScroll: true,
        });
    } else {
        // Handle the case where the user is not logged in
        router.get("/login");
        console.log("User is not logged in");
        // You might want to display a message to the user or redirect them to the login page
    }
};
///////////////////////////////////////////
const addToCart = (product) => {
    isProgress.value = true;
    if (auth.user && auth.user.id) {
        const data = {
            user_id: auth.user.id,
            product_id: product.id,
            quantity: 1,
        };

        // If the product is already in the favorites, delete it
        router.post("/carts/create", data, {
            onSuccess: (page) => {
                if (page.props.flash.message) {
                    console.log("Success message:", page.props.flash.message);
                    Swal.fire({
                        toast: true,
                        icon: "success",
                        position: "top-start",
                        showConfirmButton: false,
                        title: page.props.flash.message,
                        timer: 2000,
                    });
                    isProgress.value = false;
                }
            },
            preserveScroll: true,
        });
    } else {
        // Handle the case where the user is not logged in
        router.get("/login");
        console.log("User is not logged in");
        // You might want to display a message to the user or redirect them to the login page
    }
};
</script>

<style></style>
