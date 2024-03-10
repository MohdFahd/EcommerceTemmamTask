<template>
    <NavUser>
        <div class="container mb-3">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div
                                    class="d-flex flex-column align-items-center text-center"
                                >
                                    <img
                                        src="/assets/images/person.png"
                                        alt="Admin"
                                        class="rounded-circle p-1 bg-primary"
                                        width="110"
                                    />
                                    <div class="mt-3">
                                        <h4>{{ user.name }}</h4>
                                        <p class="text-secondary mb-1">
                                            {{ user.role }}
                                        </p>
                                        <p class="text-muted font-size-sm">
                                            Bay Area, San Francisco, CA
                                        </p>
                                        <button class="btn btn-primary">
                                            Follow
                                        </button>
                                        <button class="btn btn-outline-primary">
                                            Message
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <form @submit.prevent="submit">
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Full Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="name"
                                                v-model="form.name"
                                            />
                                            <span
                                                class="text-danger"
                                                v-if="form.errors.name"
                                                v-text="form.errors.name"
                                            ></span>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input
                                                type="text"
                                                disabled
                                                class="form-control"
                                                :value="user.email"
                                            />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Password</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="password"
                                                v-model="form.password"
                                                placeholder="Enter new password"
                                            />
                                            <span
                                                class="text-danger"
                                                v-if="form.errors.password"
                                                v-text="form.errors.password"
                                            ></span>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Phone</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input
                                                type="text"
                                                class="form-control"
                                                name="phone"
                                                v-model="form.phone"
                                            />
                                            <span
                                                class="text-danger"
                                                v-if="form.errors.phone"
                                                v-text="form.errors.phone"
                                            ></span>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Role as</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input
                                                disabled=""
                                                type="text"
                                                class="form-control"
                                                :value="user.role"
                                            />
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <button
                                                :disabled="form.processing"
                                                type="submit"
                                                class="btn btn-primary px-4 w-100"
                                                name="SaveProfile"
                                            >
                                                Save Changes
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row my-3">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="counter">
                                        <div class="row p-2">
                                            <div class="col-6 col-lg-3">
                                                <div
                                                    class="count-data text-center"
                                                >
                                                    <h6
                                                        class="count h2"
                                                        data-to="500"
                                                        data-speed="500"
                                                    >
                                                        1
                                                    </h6>
                                                    <p class="m-0px font-w-600">
                                                        Total Orders
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3">
                                                <div
                                                    class="count-data text-center"
                                                >
                                                    <h6
                                                        class="count h2"
                                                        data-to="150"
                                                        data-speed="150"
                                                    >
                                                        0
                                                    </h6>
                                                    <p class="m-0px font-w-600">
                                                        Completed
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3">
                                                <div
                                                    class="count-data text-center"
                                                >
                                                    <h6
                                                        class="count h2"
                                                        data-to="850"
                                                        data-speed="850"
                                                    >
                                                        1
                                                    </h6>
                                                    <p class="m-0px font-w-600">
                                                        Processing
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-6 col-lg-3">
                                                <div
                                                    class="count-data text-center"
                                                >
                                                    <h6
                                                        class="count h2"
                                                        data-to="190"
                                                        data-speed="190"
                                                    >
                                                        0
                                                    </h6>
                                                    <p class="m-0px font-w-600">
                                                        Cancels
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </NavUser>
</template>

<script setup>
import NavUser from "../Profile/Partials/NavUser.vue";
import { Link, usePage, useForm } from "@inertiajs/vue3";
import Swal from "sweetalert2";

const user = usePage().props.auth.user;
let form = useForm({
    name: user.name,
    img: user.img,
    password: "",
    phone: user.phone,
});
const submit = () => {
    form.patch(route("profile.update", user.id), {
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
import layout from "../UserLayout/Layout.vue";
export default {
    layout: layout,
};
</script>

<style scope>
@import url("../../../../public/assets/css/theme.min.css");
</style>
