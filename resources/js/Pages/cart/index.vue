<template>
    <section class="mb-lg-14 mb-8 mt-8">
        <div class="container" v-if="carts.length != 0">
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <!-- card -->
                    <div class="card py-1 border-0 mb-8">
                        <div>
                            <h1 class="fw-bold">Shop Cart</h1>
                            <p class="mb-0">Shopping in 382480</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row -->
            <div class="row tablecart">
                <div class="col-lg-8 col-md-7">
                    <div class="py-3">
                        <!-- alert -->
                        <div
                            class="alert alert-danger p-2 d-flex bg-black"
                            role="alert"
                        >
                            You’ve got FREE delivery. Start
                            <a href="#!" class="alert-link mx-1">
                                checkout now!</a
                            >
                        </div>
                        <ul class="list-group list-group-flush">
                            <!-- list group -->

                            <li
                                class="list-group-item py-3 py-lg-0 px-0 border-top"
                                v-for="cart in carts"
                                :key="cart.id"
                            >
                                <!-- row -->
                                <div class="row align-items-center">
                                    <div class="col-3 col-md-2 col-lg-2">
                                        <!-- img -->
                                        <Image
                                            src="products/jacket-4"
                                            alt="Mens Winter Leathers Jackets"
                                            width=""
                                            classes="img-fluid"
                                        />
                                    </div>
                                    <div class="col-3 col-lg-5 col-md-3">
                                        <!-- title -->
                                        <a
                                            href="shop-single.html"
                                            class="text-inherit"
                                        >
                                            <h6 class="mb-0">
                                                {{ cart.name }}
                                            </h6>
                                        </a>
                                        <span
                                            ><small class="text-muted"
                                                ><del
                                                    >${{ cart.old_price }}</del
                                                ></small
                                            ></span
                                        >
                                        <span
                                            ><small class="text-muted mx-2"
                                                >Size: Xl</small
                                            ></span
                                        >
                                        <!-- text -->
                                        <div class="mt-2 small lh-1">
                                            <button
                                                @click="removeCart(cart.id)"
                                                class="text-decoration-none text-inherit removeiteam"
                                                data-product-id="78"
                                            >
                                                <span
                                                    class="me-1 align-text-bottom"
                                                >
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        width="14"
                                                        height="14"
                                                        viewBox="0 0 24 24"
                                                        fill="none"
                                                        stroke="currentColor"
                                                        stroke-width="2"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round"
                                                        class="feather feather-trash-2 text-success"
                                                    >
                                                        <polyline
                                                            points="3 6 5 6 21 6"
                                                        ></polyline>
                                                        <path
                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"
                                                        ></path>
                                                        <line
                                                            x1="10"
                                                            y1="11"
                                                            x2="10"
                                                            y2="17"
                                                        ></line>
                                                        <line
                                                            x1="14"
                                                            y1="11"
                                                            x2="14"
                                                            y2="17"
                                                        ></line></svg></span
                                                ><span class="text-muted"
                                                    >Remove {{ cart.id }}</span
                                                >
                                            </button>
                                        </div>
                                    </div>
                                    <!-- input group -->
                                    <div class="col-4 col-md-3 col-lg-3">
                                        <!-- input -->
                                        <div
                                            class="input-group input-spinner d-flex"
                                        >
                                            <input
                                                type="button"
                                                value="-"
                                                class="button-minus btn btn-sm"
                                                data-field="quantity"
                                            />
                                            <input
                                                type="number"
                                                step="1"
                                                id="qty"
                                                max="20"
                                                value="1"
                                                name="quantity"
                                                class="quantity-field form-control-sm form-input"
                                            />
                                            <input
                                                type="button"
                                                value="+"
                                                class="button-plus btn btn-sm"
                                                data-field="quantity"
                                            />
                                        </div>
                                    </div>
                                    <!-- price -->
                                    <div
                                        class="col-2 text-lg-end text-start text-md-end col-md-2"
                                    >
                                        <span class="fw-bold"
                                            >${{ cart.new_price }}</span
                                        >
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <!-- btn -->
                        <div class="d-flex justify-content-between mt-4">
                            <Link href="/" class="btn btn-primary">
                                Continue Shopping</Link
                            >
                            <button
                                type="submit"
                                class="btn btn-dark Update_Cart"
                            >
                                Update Cart
                            </button>
                        </div>
                    </div>
                </div>

                <!-- sidebar -->
                <div class="col-12 col-lg-4 col-md-5">
                    <!-- card -->
                    <div class="mb-5 card mt-6">
                        <div class="card-body p-6">
                            <!-- heading -->
                            <h2 class="h5 mb-4">Summary</h2>
                            <div class="card mb-2">
                                <!-- list group -->
                                <ul class="list-group list-group-flush">
                                    <!-- list group item -->
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-start"
                                    >
                                        <div class="me-auto">
                                            <div>Item Subtotal</div>
                                        </div>
                                        <span>${{ ItemSubtotal }}</span>
                                    </li>

                                    <!-- list group item -->
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-start"
                                    >
                                        <div class="me-auto">
                                            <div>Discount</div>
                                        </div>
                                        <span>${{ ItemDiscount }}</span>
                                    </li>
                                    <!-- list group item -->
                                    <li
                                        class="list-group-item d-flex justify-content-between align-items-start"
                                    >
                                        <div class="me-auto">
                                            <div class="fw-bold">Subtotal</div>
                                        </div>
                                        <span class="fw-bold"
                                            >${{ Subtotal }}</span
                                        >
                                    </li>
                                </ul>
                            </div>
                            <div class="d-grid mb-1 mt-4">
                                <a href=""></a>
                                <!-- btn -->
                                <a
                                    href="checkOut.php?total=29"
                                    class="btn btn-primary btn-lg d-flex justify-content-between align-items-center"
                                    type="submit"
                                >
                                    Go to Checkout
                                    <span class="fw-bold"
                                        >${{ Subtotal }}</span
                                    ></a
                                >
                            </div>
                            <!-- text -->
                            <p>
                                <small
                                    >By placing your order, you agree to be
                                    bound by the Freshcart
                                    <a href="#!">Terms of Service</a> and
                                    <a href="#!">Privacy Policy.</a>
                                </small>
                            </p>

                            <!-- heading -->
                            <div class="mt-8">
                                <h2 class="h5 mb-3">Add Promo or Gift Card</h2>
                                <form>
                                    <div class="mb-2">
                                        <!-- input -->
                                        <label
                                            for="giftcard"
                                            class="form-label sr-only"
                                            >Email address</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="giftcard"
                                            placeholder="Promo or Gift Card"
                                        />
                                    </div>
                                    <!-- btn -->
                                    <div class="d-grid">
                                        <button
                                            type="submit"
                                            class="btn btn-outline-dark mb-1"
                                        >
                                            Redeem
                                        </button>
                                    </div>
                                    <p class="text-muted mb-0">
                                        <small
                                            >Terms &amp; Conditions apply</small
                                        >
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-else>
            <h1 class="fw-bold text-center">No areavialbe carts</h1>
        </div>
    </section>
</template>

<script setup>
import { computed, ref, watch } from "vue";
import Layout from "../UserLayout/Layout.vue";
import Image from "@/Components/Image.vue";
import { Link, router, usePage } from "@inertiajs/vue3";
import Swal from "sweetalert2";

const { carts } = defineProps({
    carts: { type: Object, required: true },
});

const ItemSubtotal = computed(() =>
    carts.reduce((total, item) => (total + item.old_price) * item.quantity, 0)
);
const ItemDiscount = computed(() =>
    carts.reduce(
        (total, item) =>
            (total += item.old_price - item.new_price) * item.quantity,
        0
    )
);
const Subtotal = computed(() =>
    carts.reduce((total, item) => (total += item.new_price) * item.quantity, 0)
);

const total = computed(() =>
    carts.reduce((acc, item) => acc + item.new_price * item.quantity, 0)
);

const removeCart = (cartId) => {
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            router.delete(`/carts/${cartId}`, {
                onSuccess: (page) => {
                    if (page.props.flash.message) {
                        Swal.fire(
                            "Deleted!",
                            page.props.flash.message,
                            "success"
                        );
                    }
                },
                preserveScroll: true,
                preserveState: false,
            });
        }
    });
};
</script>

<script>
export default {
    layout: Layout,
};
</script>

<style>
@import url("../../../../public/assets/css/theme.min.css");
</style>
