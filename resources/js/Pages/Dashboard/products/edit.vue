<template>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-between">
                        <h6>Products Edit</h6>
                        <div>
                            <Link
                                href="/admin/products"
                                class="btn btnnew btn-warning text-dark mx-3"
                            >
                                Back
                            </Link>
                        </div>
                    </div>

                    <div class="card-body px-0 pt-0 pb-2">
                        <form
                            @submit.prevent="submit"
                            enctype="multipart/form-data"
                        >
                            <div class="card-body px-0 pt-0 pb-2">
                                <div class="row px-3 mt-3">
                                    <div
                                        class="form-floating mb-3 col-lg-6 col-md-6"
                                    >
                                        <input
                                            type="text"
                                            v-model="form.name"
                                            name="name"
                                            class="form-control"
                                            id="floatingInput"
                                        />
                                        <label for="floatingInput">Name</label>

                                        <span
                                            class="text-danger"
                                            v-if="form.errors.name"
                                            v-text="form.errors.name"
                                        ></span>
                                    </div>
                                    <div
                                        class="form-floating mb-3 col-lg-6 col-md-6"
                                    >
                                        <select
                                            name="cat_id"
                                            class="form-select form-label p-2"
                                            aria-label="Default select example"
                                            aria-placeholder="sdadasd"
                                            require=""
                                            v-model="form.category_id"
                                        >
                                            <option selected value="">
                                                Select one of the Category
                                            </option>
                                            <option
                                                v-for="category in categories"
                                                :key="category.id"
                                                :value="category.id"
                                            >
                                                {{ category.name }}
                                            </option>
                                        </select>
                                        <span
                                            class="text-danger"
                                            v-if="form.errors.category_id"
                                            v-text="form.errors.category_id"
                                        ></span>
                                    </div>
                                </div>
                                <div
                                    class="form-floating mb-3 col-lg-12 col-md-6 col-sm-6 p-3"
                                >
                                    <textarea
                                        name="description"
                                        class="p-2"
                                        v-model="form.description"
                                        id=""
                                        placeholder="Enter The Description"
                                        cols="97"
                                        rows="5"
                                    ></textarea>
                                    <span
                                        class="text-danger"
                                        v-if="form.errors.description"
                                        v-text="form.errors.description"
                                    ></span>
                                </div>
                                <div
                                    class="form-floating mb-3 col-lg-12 col-md-12 p-3"
                                >
                                    <input
                                        name="img"
                                        @change="handleFileInputChange"
                                        type="file"
                                        class="form-control"
                                    />
                                    <span
                                        class="text-danger"
                                        v-if="form.errors.img"
                                        v-text="form.errors.img"
                                    ></span>
                                </div>
                                <div class="row px-3 mt-3">
                                    <div
                                        class="form-floating mb-3 col-lg-6 col-md-6"
                                    >
                                        <input
                                            type="number"
                                            v-model="form.old_price"
                                            name="old_price"
                                            class="form-control"
                                            id="floatingInputs"
                                            inputmode="numeric"
                                            pattern="[0-9]*"
                                        />
                                        <label for="floatingInput"
                                            >Old Price (Optional)</label
                                        >

                                        <span
                                            class="text-danger"
                                            v-if="form.errors.old_price"
                                            v-text="form.errors.old_price"
                                        ></span>
                                    </div>
                                    <div
                                        class="form-floating mb-3 col-lg-6 col-md-6"
                                    >
                                        <input
                                            type="number"
                                            name="new_price"
                                            v-model="form.new_price"
                                            class="form-control"
                                            id="floatingInput"
                                            inputmode="numeric"
                                            pattern="[0-9]*"
                                        />
                                        <label for="floatingInput"
                                            >New Price
                                        </label>
                                        <span
                                            class="text-danger"
                                            v-if="form.errors.new_price"
                                            v-text="form.errors.new_price"
                                        ></span>
                                    </div>
                                    <div
                                        class="form-floating mb-3 col-lg-6 col-md-6"
                                    >
                                        <input
                                            type="number"
                                            name="quantity"
                                            v-model="form.quantity"
                                            class="form-control"
                                            id="floatingInput"
                                            inputmode="numeric"
                                            pattern="[0-9]*"
                                        />
                                        <label for="floatingInput"
                                            >Quantity
                                        </label>
                                        <span
                                            class="text-danger"
                                            v-if="form.errors.quantity"
                                            v-text="form.errors.quantity"
                                        ></span>
                                    </div>
                                </div>
                                <div class="row px-3 mt-3 mx-2">
                                    <div
                                        class="form-check form-switch ps-0 col-md-6"
                                    >
                                        <input
                                            class="form-check-input ms-auto"
                                            name="status"
                                            type="checkbox"
                                            id="flexSwitchCheckDefault"
                                            v-model="form.status"
                                        />
                                        <label
                                            class="form-check-label text-body ms-3 text-truncate w-80 mb-0"
                                            for="flexSwitchCheckDefault"
                                            >Status</label
                                        >
                                        <span
                                            class="text-danger"
                                            v-if="form.errors.status"
                                            v-text="form.errors.status"
                                        ></span>
                                    </div>
                                </div>
                                <button
                                    type="submit"
                                    name="AddCategory"
                                    class="btn btn-primary m-3"
                                    :disabled="form.processing"
                                >
                                    Update Product
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { useForm } from "@inertiajs/vue3";
import Swal from "sweetalert2";

const { categories, product } = defineProps({
    categories: { type: Object, required: true },
    product: { type: Object, required: true },
});

let form = useForm({
    name: product.name,
    description: product.description,
    category_id: product.category_id,
    img: product.img,
    old_price: product.old_price,
    new_price: product.new_price,
    quantity: product.quantity,
    status: product.status === 1 ? true : false,
    _method: "PUT",
});
const handleFileInputChange = (event) => {
    const file = event.target.files[0]; // Get the selected file
    form.img = file; // Update the form.img property with the selected file object
};
const submit = () => {
    form.post(route("products.update", product.id), {
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
