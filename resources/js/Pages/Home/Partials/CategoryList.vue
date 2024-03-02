<template>
    <li class="sidebar-menu-category" @click="OpenList">
        <button
            class="sidebar-accordion-menu"
            :class="{ active: isActive }"
            data-accordion-btn
        >
            <div class="menu-title-flex">
                <img
                    src="assets/images/icons/coat.svg"
                    alt="alt"
                    width="30"
                    height="30"
                    class="menu-title-img"
                />

                <p class="menu-title">
                    {{ name }}
                </p>
            </div>

            <div>
                <ion-icon name="add-outline" class="add-icon"></ion-icon>
                <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
            </div>
        </button>

        <ul
            class="sidebar-submenu-category-list"
            :class="{ active: isActive }"
            data-accordion
        >
            <!-- props[href,name,value] -->

            <SubmenuCategory
                v-for="item in SubCategory"
                :key="item.id"
                :SubContent="item"
            />
        </ul>
    </li>
</template>

<script>
import Image from "@/Components/Image.vue";
import SubmenuCategory from "../Partials/SubmenuCategory.vue";
export default {
    data() {
        return {
            src: "icons/dress.svg",
            alt: "clothes",
            classes: "menu-title-img",
            isActive: false,
        };
    },
    components: {
        Image,
        SubmenuCategory,
    },
    methods: {
        OpenList() {
            this.isActive = !this.isActive;
        },

        handleSlugEmitted(slug) {
            // Handle the emitted slug value here
            console.log("Received slug:", slug);
        },
    },
    props: {
        SubCategory: {
            type: Array,
        },
        name: {
            type: String,
        },
    },
};
</script>

<style></style>
