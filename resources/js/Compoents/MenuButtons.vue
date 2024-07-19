<script setup>
import {Link} from "@inertiajs/vue3";


const props = defineProps(['is_admin'])

console.log(props.is_admin)
</script>

<template>
    <ul class="flex flex-col">
        <Link href="/dashboard" as="li">Dashboard</Link>
        <Link href="/Account" as="li">Account</Link>
        <Link href="/StartSession" as="li">Starts Session</Link>
        <Link href="/logoutaccount" as="li">Log Out</Link>
        <Link v-if="is_admin" href="/admin" as="li">Admin</Link>
    </ul>
</template>

<style scoped lang="scss">
li {
    @apply text-center bg-gray-700 text-white mb-1 p-[10px] mx-[5px] rounded ;
}
</style>
