<script setup>
import {Link} from "@inertiajs/vue3";
</script>

<template>
    <ul class="w-full h-[100vh] flex flex-col items-center justify-center">
        <Link href="/Account" as="li">Account</Link>
        <Link href="/StartSession" as="li">Starts Session</Link>
        <Link href="/logoutaccount" as="li">Log Out</Link>
    </ul>
</template>

<style lang="scss" scoped>
li{
    @apply w-[150px] h-[60px] bg-gray-700 text-white flex items-center justify-center my-[20px] rounded;
}
</style>
