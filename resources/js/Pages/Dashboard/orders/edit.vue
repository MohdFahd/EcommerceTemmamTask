<template>
    <main>
        <div class="col-md-12 my-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <span class="text fs-4">View Order</span>
                    <Link
                        href="/admin/orders"
                        class="btn btn-warning text-light float-end d-flex"
                    >
                        <svg
                            width="15px"
                            class="svg-inline--fa fa-reply text-white mx-2"
                            aria-hidden="true"
                            focusable="false"
                            data-prefix="fas"
                            data-icon="reply"
                            role="img"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512"
                            data-fa-i2svg=""
                        >
                            <path
                                fill="currentColor"
                                d="M205 34.8c11.5 5.1 19 16.6 19 29.2v64H336c97.2 0 176 78.8 176 176c0 113.3-81.5 163.9-100.2 174.1c-2.5 1.4-5.3 1.9-8.1 1.9c-10.9 0-19.7-8.9-19.7-19.7c0-7.5 4.3-14.4 9.8-19.5c9.4-8.8 22.2-26.4 22.2-56.7c0-53-43-96-96-96H224v64c0 12.6-7.4 24.1-19 29.2s-25 3-34.4-5.4l-160-144C3.9 225.7 0 217.1 0 208s3.9-17.7 10.6-23.8l160-144c9.4-8.5 22.9-10.6 34.4-5.4z"
                            ></path>
                        </svg>
                        Back
                    </Link>
                </div>
                <div class="card-body shadow-sm">
                    <ul class="list-group list-group-flush">
                        <!-- list group item -->
                        <li
                            v-for="order_item in order_items"
                            :key="order_item.id"
                            class="list-group-item px-4 p-2"
                        >
                            <div
                                class="row align-items-center"
                                style="padding-right: 12px"
                            >
                                <div class="col-2 col-md-2">
                                    <img
                                        :src="order_item.img"
                                        alt="1693922156shirt-1.jpg"
                                        class="img-fluid"
                                    />
                                </div>
                                <div class="col-5 col-md-5">
                                    <h6 class="mb-0">{{ order_item.name }}</h6>
                                    <span
                                        ><small class="text-muted"
                                            >.98 / lb</small
                                        ></span
                                    >
                                </div>
                                <div
                                    class="col-2 col-md-2 text-center text-muted"
                                >
                                    <span>{{ order_item.quantity }}</span>
                                </div>
                                <div
                                    class="col-3 text-lg-end text-start text-md-end col-md-3"
                                >
                                    <span class="fw-bold"
                                        >$ {{ order_item.price }}</span
                                    >
                                </div>
                            </div>
                        </li>
                        <!-- list group item -->
                        <li class="list-group-item px-4 py-3">
                            <div
                                class="d-flex align-items-center justify-content-between fw-bold"
                            >
                                <div>Total:</div>
                                <div class="text-danger">
                                    $ {{ order.total }}
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row my-4">
            <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
                <div class="card">
                    <div class="card-header pb-0">
                        <div class="row">
                            <div class="col-lg-6 col-7">
                                <h4>Delivey View</h4>
                            </div>
                            <div class="col-lg-6 col-5 my-auto text-end">
                                <div class="dropdown float-lg-end pe-4">
                                    <a
                                        class="cursor-pointer"
                                        id="dropdownTable"
                                        data-bs-toggle="dropdown"
                                        aria-expanded="false"
                                    >
                                        <svg
                                            class="svg-inline--fa fa-ellipsis-vertical text-secondary"
                                            aria-hidden="true"
                                            focusable="false"
                                            data-prefix="fas"
                                            data-icon="ellipsis-vertical"
                                            role="img"
                                            xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 128 512"
                                            data-fa-i2svg=""
                                        >
                                            <path
                                                fill="currentColor"
                                                d="M64 360c30.9 0 56 25.1 56 56s-25.1 56-56 56s-56-25.1-56-56s25.1-56 56-56zm0-160c30.9 0 56 25.1 56 56s-25.1 56-56 56s-56-25.1-56-56s25.1-56 56-56zM120 96c0 30.9-25.1 56-56 56S8 126.9 8 96S33.1 40 64 40s56 25.1 56 56z"
                                            ></path>
                                        </svg>
                                    </a>
                                    <ul
                                        class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5"
                                        aria-labelledby="dropdownTable"
                                    >
                                        <li>
                                            <a
                                                class="dropdown-item border-radius-md"
                                                href="javascript:;"
                                                >Action</a
                                            >
                                        </li>
                                        <li>
                                            <a
                                                class="dropdown-item border-radius-md"
                                                href="javascript:;"
                                                >Another action</a
                                            >
                                        </li>
                                        <li>
                                            <a
                                                class="dropdown-item border-radius-md"
                                                href="javascript:;"
                                                >Something else here</a
                                            >
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body px-2 pb-2">
                        <div class="col-md-12">
                            <label class="fw-bold" for="">Name</label>
                            <div class="border rounded p-2">
                                {{ order.name }}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="fw-bold" for="">Address</label>
                            <div class="border rounded p-2">
                                {{ order.address }}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="fw-bold" for="">Phone</label>
                            <div class="border rounded p-2">
                                {{ order.phone }}
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="fw-bold" for="">tracking_no</label>
                            <div class="border rounded p-2">
                                {{ order.trackingId }}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="fw-bold" for="">Date</label>
                            <div class="border rounded p-2">
                                {{ order.created_at }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <div class="card-header pb-0">
                        <h6>Orders overview</h6>
                    </div>
                    <div class="card-body p-3">
                        <form @submit.prevent="submit">
                            <div class="col-md-12">
                                <div class="d-flex justify-content-between">
                                    <label for="">Select Category</label>
                                </div>
                                <select
                                    name="status"
                                    class="form-select form-label p-2"
                                    aria-label="Default select example"
                                    aria-placeholder="sdadasd"
                                    require=""
                                    v-model="form.status"
                                >
                                    <option
                                        value="Pending"
                                        :selected="order.status == 'Pending'"
                                    >
                                        Under Processing
                                    </option>
                                    <option
                                        value="Completed"
                                        :selected="order.status == 'Completed'"
                                    >
                                        Completed
                                    </option>
                                    <option
                                        value="Canceled"
                                        :selected="order.status == 'Canceled'"
                                    >
                                        Canceled
                                    </option>
                                </select>
                                <span
                                    class="text-danger"
                                    v-if="form.errors.status"
                                    v-text="form.errors.status"
                                ></span>
                            </div>

                            <div class="col-md-12">
                                <label for="">Select Category</label>
                                <select
                                    name="tracking_mode"
                                    class="form-select form-label p-2"
                                    aria-label="Default select example"
                                    aria-placeholder="sdadasd"
                                    require=""
                                    :disabled="order.status == 'Completed'"
                                    v-model="form.tracking_mode"
                                >
                                    <option value="0" selected="">
                                        Select The next step
                                    </option>
                                    <option value="1">Confirmed</option>
                                    <option value="2">Picked by courier</option>
                                    <option value="3">On the way</option>
                                    <option
                                        value="4"
                                        :selected="order.status == '4'"
                                    >
                                        Ready for pickup
                                    </option>
                                    <option value="5">Delivered</option>
                                </select>
                                <span
                                    class="text-danger"
                                    v-if="form.errors.tracking_mode"
                                    v-text="form.errors.tracking_mode"
                                ></span>
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <button
                                    class="btn btn-primary w-100 p-3"
                                    data-order-id="0"
                                    type="submit"
                                    name="EditOrder"
                                >
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script setup>
import { Link, useForm } from "@inertiajs/vue3";
import Swal from "sweetalert2";

const { order_items, order } = defineProps({
    order_items: { type: Object, required: true },
    order: { type: Object, required: true },
});
let form = useForm({
    status: order.status,
    tracking_mode: order.tracking_mode,
});
const submit = () => {
    form.patch(route("admin.orders.update", order), {
        preserveState: true,
        preserveScroll: true,
        onSuccess: (page) => showAlert(page),
        // onError: () => passwordInput.value.focus(),
        onFinish: () => form.reset(),
    });
};
const showAlert = (page) => {
    Swal.fire({
        toast: true,
        icon: "success",
        position: "top-start",
        showConfirmButton: false,
        title: page.props.flash.message,
        timer: 2000,
    });
    form.reset();
};
</script>
<script>
import layout from "../../AdminLayout/layout.vue";

export default {
    layout: layout,
};
</script>

<style></style>
