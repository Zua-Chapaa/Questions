<script setup>
import {useForm,Link} from "@inertiajs/vue3";

const userForm = useForm({
    username:"mwaura_kimai",
    email:"kimmwaus@gmail.com",
    password:"password",
    password_confirmation:"password",
})

function saveUser(){
    userForm.post(route('registerUser'), {
        onSuccess: () => {
            alert("User Created successfully. The program Administrator will now verify your account...")
            $('#submit').fadeOut()
            $('#login').fadeIn()
        },
        onError: (errors) => {
            alert("There are a few errors with the form. Please correct them and try again")

        }
    });
}
</script>

<template>
    <div class="container w-full h-[100vh] flex items-center justify-center">
        <form @submit.prevent="saveUser" class="col-12 col-md-7 p-3 rounded bg-gray-600 text-white" style="height: fit-content">
            <h1 class="h2 mb-[20px]">Register</h1>
            <div>
                <label class="block">Username</label>
                <input class="h-[30px] block w-full" v-model="userForm.username">
                <span v-if="userForm.errors.username">{{ userForm.errors.username }}</span>
            </div>
            <div>
                <label class="block">Email</label>
                <input class="h-[30px] block w-full" v-model="userForm.email">
                <span v-if="userForm.errors.email">{{ userForm.errors.email }}</span>
            </div>
            <div>
                <label class="block">Password</label>
                <input class="h-[30px] block w-full" v-model="userForm.password" type="password">
                <span v-if="userForm.errors.password">{{ userForm.errors.password }}</span>
            </div>
            <div>
                <label class="block">Confirm password</label>
                <input class="h-[30px] block w-full" v-model="userForm.password_confirmation" type="password">
                <span v-if="userForm.errors.password_confirmation">{{ userForm.errors.password_confirmation }}</span>
            </div>
            <div class="flex justify-between">
                <button id="submit" type="submit" class="btn-sm btn-primary">Submit</button>
                <Link href="/" id="login" type="submit" class="btn-sm btn-primary">Log In</Link>
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
