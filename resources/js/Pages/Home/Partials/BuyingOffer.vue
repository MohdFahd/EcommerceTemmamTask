<template>
    <div class="showcase-container" v-show="timeupdate >= 0">
        <div class="showcase">
            <div class="showcase-banner">
                <img :src="data.img" :alt="data.name" class="showcase-img" />
            </div>

            <div class="showcase-content">
                <div class="showcase-rating">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star-outline"></ion-icon>
                    <ion-icon name="star-outline"></ion-icon>
                </div>

                <a href="#">
                    <h3 class="showcase-title">
                        {{ data.name }}
                    </h3>
                </a>

                <p class="showcase-desc">
                    {{ data.description }}
                </p>

                <div class="price-box">
                    <p class="price">${{ data.new_price }}</p>

                    <del>$ {{ data.old_price }} </del>
                </div>

                <button
                    class="add-cart-btn"
                    @click="addToCart(data)"
                    :disabled="isProgress"
                >
                    add to cart
                </button>

                <div class="showcase-status">
                    <div class="wrapper">
                        <p>already sold: <b>20</b></p>

                        <p>
                            available: <b> {{ data.quantity }} </b>
                        </p>
                    </div>

                    <div class="showcase-status-bar"></div>
                </div>

                <div class="countdown-box">
                    <p class="countdown-desc">Hurry Up! Offer ends in:</p>

                    <div class="countdown">
                        <div class="countdown-content">
                            <p class="display-number">{{ days }}</p>
                            <p class="display-text">Days</p>
                        </div>

                        <div class="countdown-content">
                            <p class="display-number">{{ hours }}</p>
                            <p class="display-text">Hours</p>
                        </div>

                        <div class="countdown-content">
                            <p class="display-number">{{ minutes }}</p>
                            <p class="display-text">Min</p>
                        </div>

                        <div class="countdown-content">
                            <p class="display-number">{{ seconds }}</p>
                            <p class="display-text">Sec</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, watch, computed } from "vue";
import { Link, router, usePage } from "@inertiajs/vue3";
import Swal from "sweetalert2";

const { data } = defineProps({
    data: { type: Object, required: true },
});
const timeupdate = ref(data.countdownSeconds);

const days = ref(0);
const hours = ref(0);
const minutes = ref(0);
const seconds = ref(0);
let interval; // Declare the interval variable outside the watch

watch(
    timeupdate,
    (value) => {
        clearInterval(interval);
        if (value > 0) {
            interval = setInterval(() => {
                if (timeupdate.value > 0) {
                    timeupdate.value--;
                    updateTime();
                } else {
                    clearInterval(interval);
                }
            }, 1000);
        }
    },
    { immediate: true }
);

function updateTime() {
    let remainingTime = timeupdate.value;
    if (remainingTime <= 0) {
        clearInterval(interval); // Clear the interval when the countdown reaches zero
        return;
    }
    days.value = Math.floor(remainingTime / 86400);
    remainingTime %= 86400;
    hours.value = Math.floor(remainingTime / 3600);
    remainingTime %= 3600;
    minutes.value = Math.floor(remainingTime / 60);
    seconds.value = remainingTime % 60;
}

const auth = usePage().props.auth;

// const isProgress = ref(false);

const addToCart = (product) => {
    // isProgress.value = true;
    if (auth.user && auth.user.id) {
        const data = {
            user_id: auth.user.id,
            product_id: product.proId,
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
                    // isProgress.value = false;
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
