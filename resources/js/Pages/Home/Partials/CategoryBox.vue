<template>
    <div class="category-item">
        <div class="category-img-box">
            <img :src="img" alt="winter wear" width="30" />
        </div>

        <div class="category-content-box">
            <div class="category-content-flex">
                <h3 class="category-item-title">{{ name }}</h3>

                <p class="category-item-amount">({{ value }})</p>
            </div>
            <Button
                text="Show all"
                :href="/categories/ + name"
                classes="category-btn"
            />
        </div>
    </div>
</template>

<script>
import Button from "@/Components/Button.vue";
export default {
    components: {
        Button,
    },
    props: {
        name: String,
        img: String,
        value: String,
    },
};
</script>

<style></style>
