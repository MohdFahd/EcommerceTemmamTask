<template>
    <section class="mb-lg-14 mb-8 mt-8">
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="col-12 mx-2">
                    <h1 class="fw-bold mb-0">Checkout</h1>
                </div>
            </div>
            <div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-7 col-md-12">
                        <!-- accordion -->
                        <div
                            class="accordion accordion-flush"
                            id="accordionFlushExample"
                        >
                            <form @submit.prevent="submit">
                                <!-- accordion item -->
                                <div class="accordion-item py-4">
                                    <div
                                        class="d-flex justify-content-between align-items-center"
                                    >
                                        <!-- heading one -->
                                        <a
                                            href="#"
                                            class="fs-5 text-inherit h4 d-flex"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseOne"
                                            aria-expanded="true"
                                            aria-controls="flush-collapseOne"
                                        >
                                            <ion-icon
                                                name="location-outline"
                                                class="mx-2 md hydrated"
                                                role="img"
                                                aria-label="location outline"
                                            ></ion-icon
                                            >Add delivery address
                                        </a>

                                        <!-- collapse -->
                                    </div>

                                    <div class="mt-5">
                                        <div class="row g-3">
                                            <!-- col -->
                                            <div class="col-6">
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    name="First_name"
                                                    v-model="form.Fname"
                                                    placeholder="First name"
                                                    aria-label="First name"
                                                    required=""
                                                />
                                            </div>
                                            <!-- col -->
                                            <div class="col-6">
                                                <input
                                                    type="text"
                                                    class="form-control"
                                                    v-model="form.Lname"
                                                    placeholder="Last name"
                                                    aria-label="Last name"
                                                    name="last_name"
                                                />
                                            </div>
                                            <div class="col-12">
                                                <!-- button -->
                                                <input
                                                    type="text"
                                                    name="city"
                                                    v-model="form.city"
                                                    class="form-control"
                                                    placeholder="Countray,City"
                                                />
                                            </div>
                                            <!-- col -->
                                            <div class="col-12">
                                                <input
                                                    type="text"
                                                    name="address"
                                                    class="form-control"
                                                    v-model="form.address"
                                                    placeholder="Address Line"
                                                />
                                            </div>
                                            <div class="col-6">
                                                <!-- button -->
                                                <input
                                                    type="text"
                                                    name="phone"
                                                    v-model="form.phone"
                                                    class="form-control"
                                                    placeholder="Phone Number"
                                                />
                                            </div>
                                            <div class="col-6">
                                                <!-- button -->
                                                <input
                                                    type="text"
                                                    name="zip"
                                                    v-model="form.zip"
                                                    class="form-control"
                                                    placeholder="Zip Code"
                                                />
                                            </div>
                                            <div class="col-12">
                                                <!-- button -->
                                                <input
                                                    type="text"
                                                    name="business"
                                                    class="form-control"
                                                    v-model="form.BusinessName"
                                                    placeholder="Business Name"
                                                />
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input
                                                        class="form-check-input"
                                                        type="checkbox"
                                                        value=""
                                                        id="flexCheckDefault"
                                                    />
                                                    <!-- label -->
                                                    <label
                                                        class="form-check-label"
                                                        for="flexCheckDefault"
                                                    >
                                                        Set as Default
                                                    </label>
                                                </div>
                                            </div>
                                            <!-- button -->
                                            <div
                                                class="mt-5 d-flex justify-content-end"
                                            >
                                                <button
                                                    class="btn btn-primary ms-2 collapsed"
                                                    type="submit"
                                                >
                                                    Next
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-12 col-md-12 offset-lg-1 col-lg-4">
                        <div class="mt-4 mt-lg-0">
                            <div class="card shadow-sm">
                                <h5 class="px-6 py-4 bg-transparent mb-0">
                                    Order Details
                                </h5>
                                <ul class="list-group list-group-flush">
                                    <!-- list group item -->
                                    <li
                                        v-for="cart in carts"
                                        :key="cart.id"
                                        class="list-group-item px-4 p-2"
                                    >
                                        <div
                                            class="row align-items-center"
                                            style="padding-right: 12px"
                                        >
                                            <div class="col-2 col-md-2">
                                                <Image
                                                    src="products/jacket-4"
                                                    alt="Mens Winter Leathers Jackets"
                                                    width=""
                                                    classes="img-fluid"
                                                />
                                            </div>
                                            <div class="col-5 col-md-5">
                                                <h6 class="mb-0">
                                                    {{ cart.name }}
                                                </h6>
                                                <span
                                                    ><small class="text-muted"
                                                        >.98 / lb</small
                                                    ></span
                                                >
                                            </div>
                                            <div
                                                class="col-2 col-md-2 text-center text-muted"
                                            >
                                                <span>{{ cart.quantity }}</span>
                                            </div>
                                            <div
                                                class="col-3 text-lg-end text-start text-md-end col-md-3"
                                            >
                                                <span class="fw-bold"
                                                    >${{ cart.new_price }}</span
                                                >
                                            </div>
                                        </div>
                                    </li>

                                    <!-- list group item -->
                                    <li class="list-group-item px-4 py-3">
                                        <div
                                            class="d-flex align-items-center justify-content-between mb-2"
                                        >
                                            <div>Item Subtotal</div>
                                            <div class="fw-bold">
                                                ${{ ItemSubtotal }}
                                            </div>
                                        </div>
                                        <div
                                            class="d-flex align-items-center justify-content-between"
                                        >
                                            <div>
                                                Discount
                                                <i
                                                    class="feather-icon icon-info text-muted"
                                                    data-bs-toggle="tooltip"
                                                    aria-label="Default tooltip"
                                                    data-bs-original-title="Default tooltip"
                                                ></i>
                                            </div>
                                            <div class="fw-bold">
                                                ${{ ItemDiscount }}
                                            </div>
                                        </div>
                                    </li>
                                    <!-- list group item -->
                                    <li class="list-group-item px-4 py-3">
                                        <div
                                            class="d-flex align-items-center justify-content-between fw-bold"
                                        >
                                            <div>Subtotal</div>
                                            <div>${{ Subtotal }}</div>
                                        </div>
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
import Image from "@/Components/Image.vue";
import { useForm, usePage } from "@inertiajs/vue3";
import { computed, ref, watch } from "vue";
import layout from "../UserLayout/Layout.vue";

const { carts } = defineProps({
    carts: { type: Object, required: true },
});

const submit = () => {
    form.post("/checkOut/store");
};

const ItemSubtotal = computed(() =>
    carts.reduce(
        (total, item) => total + item.old_price * item.quantity || 0,
        0
    )
);
const ItemDiscount = computed(() =>
    carts.reduce(
        (total, item) =>
            (total += item.old_price - item.new_price) * item.quantity || 0,
        0
    )
);
const Subtotal = computed(() =>
    carts.reduce(
        (total, item) => (total += item.new_price) * item.quantity || 0,
        0
    )
);

let form = useForm({
    Fname: "",
    Lname: "",
    city: "",
    address: "",
    phone: "",
    zip: "",
    BusinessName: "",
    total: ItemSubtotal,
    carts: carts,
    user_id: usePage().props.auth.user.id,
});
</script>

<script>
export default {
    layout: layout,
};
</script>
<style scope>
@import url("../../../../public/assets/css/theme.min.css");
</style>
