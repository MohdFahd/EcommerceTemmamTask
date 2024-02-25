<template>
    <div class="slider-item">
        <img
            src="assets/images/banner-1.jpg"
            alt="women's latest fashion sale"
            class="banner-img"
        />

        <div class="banner-content">
            <p class="banner-subtitle">{{ title }}</p>

            <h2 class="banner-title">{{ name }}</h2>

            <p class="banner-text">
                starting at &dollar;<b>{{ price }}</b>
            </p>

            <Button :text="buttonText" href="/" />
        </div>
    </div>
</template>

<script>
import Button from "@/Components/Button.vue";

export default {
    props: {
        title: {
            type: String,
            default: "",
        },
        name: {
            type: String,
            default: "",
        },
        price: {
            type: Int16Array,
            default: "",
        },
        buttonText: {
            type: String,
            default: "",
        },
    },
    components: {
        Button,
    },
};
</script>

<style></style>
