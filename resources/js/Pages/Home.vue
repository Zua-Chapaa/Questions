<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="holder h-[100vh] w-full flex justify-center pt-[40px]">
        <div class="w-[300px] h-[200px] ">
            <div class="flex items-center justify-center mb-[20px]">
                <img class="h-[100px]" src="/storage/System/logo.png" alt="Logo">
            </div>
            <div class="text-center text-white mb-[30px]">
                <p class="mb-[40px]">Welcome to Shikisha Kakitu Questions evaluation Program</p>
                <p class="text-sm text-gray-400">
                    We're thrilled to have you participate in our trivia application program! Our goal is to create a
                    fun and
                    educational experience for all users in Kenya.</p>
                <p class="text-sm text-gray-400">
                    Your feedback is invaluable in helping us achieve
                    this. Let's make
                    learning exciting together!
                </p>
                <p class="text-sm text-gray-400"> Thank you for being a part of our journey.</p>
            </div>
            <div class="flex items-center flex-col gap-[10px]">
                <Link class="btn btn-primary w-full text-center" as="button" href="/register">Register</Link>
                <Link class="btn btn-primary w-full text-center" as="button" href="/lognin">Log In</Link>
            </div>

        </div>
    </div>
</template>

<style lang="scss" scoped>
</style>
