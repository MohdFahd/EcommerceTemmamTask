<template>
    <div class="showcase">
        <a href="#" class="showcase-img-box" v-show="ShowImg">
            <Image
                :src="content.img"
                :alt="content.name"
                classes="showcase-img"
                width="75"
                height="75"
            />
        </a>
        <div class="showcase-content">
            <!-- <a href="#">
                <h4 class="showcase-title">
                    {{ content.name }}
                </h4>
            </a> -->
            <Link :href="'/products/' + content.name" method="get" as="button">
                <h4 class="showcase-title">
                    {{ content.name }}
                </h4>
            </Link>
            <Button
                v-show="categoryLink"
                :text="content.category"
                :href="'/categories/' + content.category"
                classes="showcase-category"
            />

            <div class="showcase-rating" v-show="rating">
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
                <ion-icon name="star"></ion-icon>
            </div>
            <!-- <a href="#" class="showcase-category"></a> -->

            <div class="price-box">
                <del>${{ content.old_price }}</del>
                <p class="price">${{ content.new_price }}</p>
            </div>
        </div>
    </div>
</template>

<script setup>
import Image from "@/Components/Image.vue";
import Button from "@/Components/Button.vue";
import { Link } from "@inertiajs/vue3";

defineProps({
    content: { type: Object, required: true },
    rating: { type: Boolean, default: false },
    categoryLink: { type: Boolean, default: false },
    ShowImg: { type: Boolean, default: true },
    category_name: { type: String, default: true },
});
</script>

<style></style>
