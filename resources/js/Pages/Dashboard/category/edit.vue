<template>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-between">
                        <h6>Categories Edit</h6>
                        <div>
                            <Link
                                href="/admin/categories"
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
                                            placeholder="Enter The Name Of Category"
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
                                            v-model="form.parent_id"
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
                                    <img
                                        :src="category.img"
                                        width="5%"
                                        alt=""
                                    />
                                    <span
                                        class="text-danger"
                                        v-if="form.errors.img"
                                        v-text="form.errors.img"
                                    ></span>
                                </div>

                                <button
                                    type="submit"
                                    name="AddCategory"
                                    class="btn btn-primary m-3"
                                >
                                    Edit Category
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

const { category, categories } = defineProps({
    category: { type: Object, required: true },
    categories: { type: Object, required: true },
});

let form = useForm({
    name: category.name,
    parent_id: category.parent_id,
    description: category.description,
    img: category.img,
    _method: "PUT",
});
const handleFileInputChange = (event) => {
    const file = event.target.files[0]; // Get the selected file
    form.img = file; // Update the form.img property with the selected file object
};

const submit = () => {
    form.post(`/admin/categories/update/${category.id}`, {
        preserveState: true,
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
