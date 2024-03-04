<template>
    <section class="mt-8 my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <!-- img slide -->
                    <div class="product" id="product">
                        <div
                            class="flex justify-center items-center"
                            style="
                                background-image: url(uploads/1693922099jacket-3.jpg);
                            "
                        >
                            <Image
                                src="products/jacket-4"
                                alt="Mens Winter Leathers Jackets"
                                width="300"
                                classes="product-img hover"
                            />
                        </div>
                    </div>
                    <!-- product tools -->
                    <div class="product-tools">
                        <div class="thumbnails row g-3" id="productThumbnails">
                            <div class="col-3">
                                <div class="thumbnails-img">
                                    <!-- img -->
                                    <Image
                                        src="products/jacket-4"
                                        alt="Mens Winter Leathers Jackets"
                                        width="300"
                                        classes="product-img hover"
                                    />
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="thumbnails-img">
                                    <!-- img -->
                                    <Image
                                        src="products/jacket-4"
                                        alt="Mens Winter Leathers Jackets"
                                        width="300"
                                        classes="product-img hover"
                                    />
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="thumbnails-img">
                                    <!-- img -->
                                    <Image
                                        src="products/jacket-4"
                                        alt="Mens Winter Leathers Jackets"
                                        width="300"
                                        classes="product-img hover"
                                    />
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="thumbnails-img">
                                    <!-- img -->
                                    <Image
                                        src="products/jacket-4"
                                        alt="Mens Winter Leathers Jackets"
                                        width="300"
                                        classes="product-img hover"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="ps-lg-10 mt-6 mt-md-0">
                        <!-- content -->
                        <a href="#!" class="mb-4 d-block">{{ categoryName }}</a>
                        <!-- heading -->
                        <h1 class="mb-1">{{ product.name }}</h1>
                        <div class="mb-4">
                            <!-- rating -->
                            <!-- rating -->
                            <small class="text-warning d-flex">
                                <ion-icon
                                    name="star"
                                    role="img"
                                    class="md hydrated"
                                    aria-label="star"
                                ></ion-icon>
                                <ion-icon
                                    name="star"
                                    role="img"
                                    class="md hydrated"
                                    aria-label="star"
                                ></ion-icon>
                                <ion-icon
                                    name="star"
                                    role="img"
                                    class="md hydrated"
                                    aria-label="star"
                                ></ion-icon>
                                <ion-icon
                                    name="star"
                                    role="img"
                                    class="md hydrated"
                                    aria-label="star"
                                ></ion-icon>
                                <ion-icon
                                    name="star"
                                    role="img"
                                    class="md hydrated"
                                    aria-label="star"
                                ></ion-icon>
                                <a href="#" class="ms-2">(30 reviews)</a>
                            </small>
                            <br />
                            <p>
                                {{ product.description }}
                            </p>
                        </div>
                        <div class="fs-4">
                            <!-- price --><span class="fw-bold text-dark"
                                >${{ product.new_price }}</span
                            >
                            <span
                                class="text-decoration-line-through text-muted text-gray-400 mx-2"
                                >${{ product.old_price }}</span
                            ><span
                                ><small class="fs-6 ms-2 text-danger"
                                    >26% Off</small
                                ></span
                            >
                        </div>
                        <!-- hr -->
                        <hr class="my-6" />
                        <div class="mb-5">
                            <button
                                type="button"
                                class="btn btn-outline-secondary"
                                onclick="toggleButtonColor(this)"
                            >
                                XLL
                            </button>
                            <!-- btn -->
                            <button
                                type="button"
                                class="btn btn-outline-secondary"
                                onclick="toggleButtonColor(this)"
                            >
                                XL
                            </button>
                            <!-- btn -->
                            <button
                                type="button"
                                class="btn btn-outline-secondary"
                                onclick="toggleButtonColor(this)"
                            >
                                L
                            </button>
                            <button
                                type="button"
                                class="btn btn-outline-secondary"
                                onclick="toggleButtonColor(this)"
                            >
                                S
                            </button>
                        </div>

                        <div>
                            <!-- input -->
                            <div class="input-group input-spinner">
                                <input
                                    type="button"
                                    value="-"
                                    class="button-minus btn btn-sm"
                                    @click="decreaseQuantity"
                                />
                                <input
                                    type="number"
                                    step="1"
                                    max="10"
                                    min="1"
                                    v-model="quantity"
                                    name="quantity"
                                    class="quantity-field form-control-sm form-input qty"
                                />
                                <input
                                    type="button"
                                    value="+"
                                    class="button-plus btn btn-sm"
                                    @click="increaseQuantity"
                                />
                            </div>
                        </div>
                        <div
                            class="mt-3 row justify-content-start g-2 align-items-center"
                        >
                            <div
                                class="col-xxl-4 col-lg-4 col-md-5 col-5 d-grid"
                            >
                                <!-- button -->
                                <!-- btn -->
                                <button
                                    type="button"
                                    class="btn btn-primary addtocart"
                                    data-product-id="78"
                                >
                                    Add to cart
                                </button>
                            </div>
                            <div class="col-md-4 col-4">
                                <!-- btn -->
                                <a
                                    class="btn btn-light"
                                    href="#"
                                    data-bs-toggle="tooltip"
                                    data-bs-html="true"
                                    aria-label="Compare"
                                >
                                    <ion-icon
                                        name="repeat-outline"
                                        role="img"
                                        class="md hydrated"
                                        aria-label="repeat outline"
                                    ></ion-icon>
                                </a>
                                <a
                                    class="btn btn-light btn-action"
                                    href=""
                                    data-bs-toggle="tooltip"
                                    data-bs-html="true"
                                    aria-label="Wishlist"
                                >
                                    <ion-icon
                                        name="heart-outline"
                                        role="img"
                                        class="md hydrated"
                                        aria-label="heart outline"
                                    ></ion-icon>
                                </a>
                            </div>
                        </div>
                        <!-- hr -->
                        <hr class="my-6" />
                        <div>
                            <!-- table -->
                            <table class="table table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <td>Product Code:</td>
                                        <td>FBB00255</td>
                                    </tr>
                                    <tr>
                                        <td>Availability:</td>
                                        <td>In Stock</td>
                                    </tr>
                                    <tr>
                                        <td>Type:</td>
                                        <td>Fruits</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping:</td>
                                        <td>
                                            <small
                                                >01 day shipping.<span
                                                    class="text-muted"
                                                    >( Free pickup today)</span
                                                ></small
                                            >
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-8">
                            <!-- dropdown -->
                            <div class="dropdown">
                                <a
                                    class="btn btn-outline-secondary d-flex w-50 justify-content-between"
                                    href="#"
                                    role="button"
                                    data-bs-toggle="dropdown"
                                    aria-expanded="false"
                                >
                                    Share
                                    <ion-icon
                                        name="share-social-outline"
                                        role="img"
                                        class="md hydrated"
                                        aria-label="share social outline"
                                    ></ion-icon>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item" href="#"
                                            ><i class="bi bi-facebook me-2"></i
                                            >Facebook</a
                                        >
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#"
                                            ><i class="bi bi-twitter me-2"></i
                                            >Twitter</a
                                        >
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#"
                                            ><i class="bi bi-instagram me-2"></i
                                            >Instagram</a
                                        >
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import Layout from "../../Layouts/Layout.vue";
import Image from "@/Components/Image.vue";

// Define props after the lifecycle hook
defineProps({
    product: { type: Object, required: true },
    categoryName: { type: String, required: true },
});
</script>

<script>
export default {
    layout: Layout,
    data() {
        return {
            quantity: 1,
        };
    },
    methods: {
        increaseQuantity() {
            if (this.quantity < 10) {
                this.quantity++;
            }
        },
        decreaseQuantity() {
            if (this.quantity > 1) {
                this.quantity--;
            }
        },
    },
};
</script>
<style scoped>
@import url("../../../../public/assets/css/theme.min.css");
</style>
