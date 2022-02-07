<template>
  <Head title="Departmanlar" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Departments
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
              <div class="flex items-center text-white justify-center mb-6 bg-blue-700 w-52 float-right h-10 rounded-xl">
                  <Link class=" flex h-full w-full justify-center items-center" :href="route('departmanlar.create')">Create Department</Link>
              </div>
            <BreezeTable>
              <template #tableheader>
                <breeze-tc>Id</breeze-tc>
                <breeze-tc>Name</breeze-tc>
                <breeze-tc>Email</breeze-tc>
                <breeze-tc>Phone</breeze-tc>
                <breeze-tc>Actions</breeze-tc>
              </template>
              <template #tablebody>
                <tr v-for="d in departments.data" :key="d.id" class="hover:bg-gray-200">
                  <breeze-tc>{{ d.id }}</breeze-tc>
                  <breeze-tc>{{ d.name }}</breeze-tc>
                  <breeze-tc>{{ d.email }}</breeze-tc>
                  <breeze-tc>{{ d.phone }}</breeze-tc>
                  <breeze-tc><Link class="bg-gray-300 py-1 px-2 rounded" :href="route('departmanlar.edit' ,[d.id])" >Edit</Link> <button class="bg-red-600 px-2 py-1 rounded"  @click="deletes(d.id)">Delete</button></breeze-tc>
                </tr>
              </template>
            </BreezeTable>
            <BreezePagination :links="departments.links"></BreezePagination>
          </div>
        </div>
      </div>
    </div>
  </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head,Link } from "@inertiajs/inertia-vue3";
import BreezeTc from "@/Components/TableColumn";
import BreezeTable from "@/Components/Table";
import BreezePagination from "@/Components/Pagination";

export default {
  components: {
    BreezeAuthenticatedLayout,
    Head,
    Link,
    BreezeTc,
    BreezeTable,
    BreezePagination,
  },
  props: {
    departments: Object,
  },
  methods: {
    deletes (id){
      this.$inertia.delete(route('departmanlar.destroy',id));
    }
  },
};
</script>
