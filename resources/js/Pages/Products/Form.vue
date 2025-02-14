<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, useForm } from "@inertiajs/vue3";

const props = defineProps({
  product: Object,
});
const title = props.product ? "Editar Producto" : "Agregar Producto";

const form = useForm({
  name: props.product ? props.product.name : "",
  price: props.product ? props.product.price : "",
  description: props.product ? props.product.description : "",
});

const submitForm = () => {
  if (props.product) {
    form.put(route("products.update", props.product.id));
    return;
  }
  form.post(route("products.store"));
};
</script>
<template>
  <AppLayout :title="title">
    <div class="my-5 px-4 flex gap-x-1 items-center">
      <Link class="text-amber-500" :href="route('products.index')">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="24"
          height="24"
          viewBox="0 0 24 24"
        >
          <path
            fill="currentColor"
            d="m2.82 12l7.715 7.716q.22.22.218.528t-.224.529t-.529.221t-.529-.221L1.83 13.137q-.242-.243-.354-.54q-.111-.299-.111-.597t.111-.596q.112-.298.354-.54L9.47 3.22q.221-.221.532-.218q.31.003.532.224q.22.221.22.529t-.22.529z"
          />
        </svg>
      </Link>
      <h1 class="font-bold text-xl">{{ title }}</h1>
    </div>
    <form class="flex flex-col w-full gap-y-5" @submit.prevent="submitForm">
      <div class="flex flex-col">
        <label for="" class="font-bold"
          >Nombre <label for="" class="text-red-500">*</label></label
        >
        <input v-model="form.name" type="text" class="rounded-md" />
        <label for="" class="text-sm mt-1 text-red-500 italic">{{
          form.errors.name
        }}</label>
      </div>
      <div class="flex flex-col">
        <label for="" class="font-bold"
          >Precio <label for="" class="text-red-500">*</label></label
        >
        <input v-model="form.price" type="number" class="rounded-md" />
        <label for="" class="text-sm mt-1 text-red-500 italic">{{
          form.errors.price
        }}</label>
      </div>
      <div class="flex flex-col">
        <label for="" class="font-bold">Descripción</label>
        <textarea
          v-model="form.description"
          name=""
          id=""
          rows="3"
          class="rounded-md"
        ></textarea>
      </div>
      <div class="flex w-full justify-between">
        <button
          type="submit"
          class="bg-green-400 py-1 px-4 ring-4 ring-green-400 rounded-md text-xl font-semibold text-white"
        >
          Guardar
        </button>
      </div>
    </form>
  </AppLayout>
</template>
