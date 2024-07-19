<script setup>
import DashboardComponent from "@/Compoents/DashboardComponent.vue";

const props = defineProps(['stats'])

</script>

<template>
    <dashboard-component>
        <div class="w-[100vw] ">
            <div class="text-white p-[10px] ">
                <h2 class="h2">Over All Stats</h2>
                <ul class="mb-[20px]">
                    <li class="flex justify-between"><p>Total Applicants</p>
                        <p>{{ stats.all_user }}</p></li>
                    <li class="flex justify-between"><p>Total Question</p>
                        <p>{{ stats.all_questions }}</p></li>
                    <li class="flex justify-between"><p>Total Validated Question</p>
                        <p>{{ stats.total_validated_questions }}</p></li>
                    <li class="flex justify-between"><p>Total Invalidated Question</p>
                        <p>{{ stats.total_invalidated_questions }}</p></li>
                </ul>
            </div>
        </div>
    </dashboard-component>
</template>

<style lang="scss" scoped>
div {
    div {
        ul {
            li {
                @apply py-[20px] px-[5px] bg-gray-600 my-[10px] rounded flex-col;
                p:nth-of-type(2) {
                    align-self: end;
                    font-size: 30px;
                }
            }
        }
    }
}
</style>
