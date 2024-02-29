<template>
    <div class="product-showcase">
        <h2 class="title">{{ name }}</h2>

        <div class="showcase-wrapper has-scrollbar">
            <!-- Loop through chunks of products -->
            <div
                class="showcase-container"
                v-for="(chunk, index) in chunkedData"
                :key="index"
            >
                <ProductBox
                    v-for="product in chunk"
                    :key="product.id"
                    :content="product"
                    :categoryLink="true"
                />
            </div>
        </div>
    </div>
</template>

<script setup>
import ProductBox from "../Partials/ProductBox.vue";
import { computed } from "vue";

const { data, name } = defineProps({
    name: {
        type: String,
        required: true,
    },
    data: {
        type: Array,
        required: true,
    },
});

// Function to chunk the data into groups of four
const chunkedData = computed(() => {
    const chunkSize = 4;
    const chunks = [];
    for (let i = 0; i < Math.ceil(data.length / chunkSize); i++) {
        chunks.push(data.slice(i * chunkSize, (i + 1) * chunkSize));
    }
    return chunks;
});
</script>

<style></style>
