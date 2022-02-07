<template>
  <Head title="Departmanlar" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Create New Departments
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
              <div v-show="form.hasErrors">
                  <div class="text-red-600 font-medium">
                      <span v-for="error in form.Errors" :key="error">
                          error
                      </span>
                  </div>
              </div>
            <form @submit.prevent="submit">
              <div>
                <BreezeLabel for="name" value="name"></BreezeLabel>
                <BreezeInput
                  type="text"
                  id="name"
                  class="mt-1 block w-1/2"
                  v-model="form.name"
                  autofocus
                ></BreezeInput>
                <BreezeInputError :message="form.errors.name"></BreezeInputError>
              </div>
              <div>
                <BreezeLabel for="email" value="email"></BreezeLabel>
                <BreezeInput
                  type="email"
                  id="email"
                  class="mt-1 block w-1/2"
                  v-model="form.email"
                ></BreezeInput>
                <BreezeInputError :message="form.errors.email"></BreezeInputError>
              </div>
              <div>
                <BreezeLabel for="phone" value="phone"></BreezeLabel>
                <BreezeInput
                  type="number"
                  id="phone"
                  class="mt-1 block w-1/2"
                  v-model="form.phone"
                ></BreezeInput>
                <BreezeInputError :message="form.errors.phone"></BreezeInputError>
              </div>

              <!-- submit -->
              <button class="bg-green-700 text-white px-3 py-2 m-2 ml-0 rounded " :class="{'opacity-25 bg-slate-600' : form.processing}" :disabled="form.processing" type="submit">Create</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import BreezeLabel from "@/Components/Label";
import BreezeInput from "@/Components/Input";
import BreezeInputError from "@/Components/InputError";
import { Head, Link } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";

export default {
  components: {
    BreezeAuthenticatedLayout,
    BreezeInput,
    BreezeLabel,
    BreezeInputError,
    Head,
    Link,
  },
  setup() {
    const form = useForm({
      name: null,
      email: null,
      phone: false,
    });

    return { form };
  },
  methods: {
    submit() {
        this.form.post(route('departmanlar.store'));
    },
  },
};
</script>
