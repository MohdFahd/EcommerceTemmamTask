<template>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Users table</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <input
                                v-model="search"
                                type="text"
                                placeholder="Search..."
                                width="35%"
                                style="
                                    border: none;
                                    border-bottom: 1px solid black;
                                "
                            />
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                        >
                                            User
                                        </th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"
                                        >
                                            Function
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                        >
                                            Status
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"
                                        >
                                            Employed
                                        </th>
                                        <th
                                            class="text-secondary opacity-7"
                                        ></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        v-for="user in users.data"
                                        :key="user.id"
                                    >
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img
                                                        src="/Admin/assets/img/team-2.jpg"
                                                        class="avatar avatar-sm me-3"
                                                        alt="user1"
                                                    />
                                                </div>
                                                <div
                                                    class="d-flex flex-column justify-content-center"
                                                >
                                                    <h6 class="mb-0 text-sm">
                                                        {{ user.name }}
                                                    </h6>
                                                    <p
                                                        class="text-xs text-secondary mb-0"
                                                    >
                                                        {{ user.email }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p
                                                class="text-xs font-weight-bold mb-0"
                                            >
                                                {{ user.role }}
                                            </p>
                                            <p
                                                class="text-xs text-secondary mb-0"
                                            >
                                                Organization
                                            </p>
                                        </td>
                                        <td
                                            class="align-middle text-center text-sm"
                                        >
                                            <span
                                                class="badge badge-sm bg-gradient-success"
                                                v-if="user.status == 1"
                                            >
                                                Online
                                            </span>
                                            <span
                                                class="badge badge-sm bg-gradient-danger"
                                                v-else
                                            >
                                                Offline
                                            </span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold"
                                                >{{ user.created_at }}</span
                                            >
                                        </td>
                                        <td class="align-middle">
                                            <a
                                                href="javascript:;"
                                                class="text-secondary font-weight-bold text-xs"
                                                data-toggle="tooltip"
                                                data-original-title="Edit user"
                                            >
                                                Edit
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div
                                class="rounded-b-lg border-t border-gray-200 px-4 py-2"
                            >
                                <ol
                                    class="flex justify-end gap-1 text-xs font-medium"
                                >
                                    <li>
                                        <Link
                                            v-show="
                                                users.current_page > 1
                                                    ? true
                                                    : false
                                            "
                                            :href="
                                                '/admin/users?page=' +
                                                Math.max(
                                                    users.current_page - 1,
                                                    1
                                                ) +
                                                ''
                                            "
                                            class="inline-flex size-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 rtl:rotate-180"
                                        >
                                            <span class="sr-only"
                                                >Prev Page</span
                                            >
                                            Prv
                                        </Link>
                                    </li>

                                    <Link
                                        v-for="(
                                            link, index
                                        ) in users.links.slice(1, -1)"
                                        :key="index"
                                        class="block size-8 rounded border-blue-600 text-center leading-8 text-white"
                                        :href="
                                            '/admin/users?page=' +
                                            link.label +
                                            ''
                                        "
                                        :class="{
                                            'bg-blue-600': link.active,
                                            'bg-gray-600': !link.active,
                                        }"
                                    >
                                        {{ link.label }}</Link
                                    >

                                    <li>
                                        <Link
                                            v-show="
                                                users.current_page <
                                                users.last_page
                                                    ? true
                                                    : false
                                            "
                                            :href="
                                                '/admin/users?page=' +
                                                Math.min(
                                                    users.current_page + 1,
                                                    users.last_page
                                                ) +
                                                ''
                                            "
                                            class="inline-flex size-8 items-center justify-center rounded border border-gray-100 bg-white text-gray-900 rtl:rotate-180"
                                        >
                                            <span class="sr-only"
                                                >Next Page</span
                                            >
                                            Next
                                        </Link>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
const { users } = defineProps({
    // ProductData: { type: Object, required: true },
    users: { type: Object, required: true },
    filters: { type: Object, required: true },
});
</script>
<script>
import layout from "../AdminLayout/layout.vue";
import { Link } from "@inertiajs/vue3";
import { ref, watch } from "vue";
export default {
    layout: layout,
    props: {
        users: Object,
        filters: Object,
        can: Object,
    },
    data() {
        return {
            search: this.filters.search || "",
        };
    },
    watch: {
        search(value) {
            console.log("Search value changed:", value); // Check if this logs properly
            this.$inertia.get(
                "/admin/users",
                { search: value },
                { preserveState: true, replace: true }
            );
        },
    },
    components: { Link },
};
</script>

<style></style>
