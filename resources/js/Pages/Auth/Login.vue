<script setup>
import {useForm,Link} from "@inertiajs/vue3";


const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

const userForm = useForm({
    _token: csrfToken,
    email:"",
    password:"",
})

</script>

<template>
    <div class="container w-full h-[100vh] flex items-center justify-center">
        <form method="POST" action="/login" class="col-12 col-md-7 p-3 rounded bg-gray-600 text-white" style="height: fit-content">
            <h1 class="h2 mb-[20px]">Register</h1>
            <input class="hidden" name="_token" v-model="userForm._token">
            <div>
                <label class="block">Email</label>
                <input name="email" class="h-[30px] block w-full" v-model="userForm.email">
                <span v-if="userForm.errors.email">{{ userForm.errors.email }}</span>
            </div>
            <div>
                <label class="block">Password</label>
                <input name="password" class="h-[30px] block w-full" v-model="userForm.password" type="password">
                <span v-if="userForm.errors.password">{{ userForm.errors.password }}</span>
            </div>
            <div class="flex justify-between">
                <button id="submit" type="submit" class="btn-sm btn-primary">Log In</button>
            </div>
        </form>
    </div>
</template>

<style scoped lang="scss">
form{
    label{
        @apply text-sm mb-[5px];
    }
    div{
        @apply mb-[15px];
        input{
            @apply text-gray-700;
        }
    }
    span{
        @apply text-red-500 text-sm px-[10px];
    }
}
</style>
