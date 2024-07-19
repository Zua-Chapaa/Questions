<script setup>
import DashboardComponent from "@/Compoents/DashboardComponent.vue";
import {Link} from "@inertiajs/vue3";

</script>


<template>
    <dashboard-component>
        <ul class="flex" style="width: 100vw">
            <Link href="/admin/choices" as="li">Invalid Choices</Link>
            <Link href="/dashboard" as="li">Validated Question</Link>
            <Link href="/dashboard" as="li">Advanced Stats</Link>
        </ul>
    </dashboard-component>
</template>

<style scoped lang="scss">
ul{
    @apply p-[10px] gap-[4px] overflow-scroll;

    li{
        @apply px-[15px] bg-gray-600 rounded py-[4px]
    }
}
</style>
