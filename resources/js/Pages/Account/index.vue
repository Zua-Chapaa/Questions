<script setup>
import {Link, useForm} from "@inertiajs/vue3";


const props = defineProps(['stats'])
</script>

<template>
    <div class="container w-full h-[100vh] ">
        <div class="flex justify-end h-[50px] border-b" style="padding: 10px 10px">
            <Link as="button" class="btn-primary  px-[10px] py-[3px] rounded" href="/StopSession">Dashboard</Link>
        </div>
        <div class="text-white p-[5px]">
            <h2 class="h2">Personal Statistics</h2>
            <ul class="mb-[20px] px-[5px] rounded ">
                <li class="flex justify-between">
                    <p>Total Question Handled</p>
                    <p>{{ stats.total_handled }}</p>
                </li>
                <li class="flex justify-between">
                    <p>Total Validated Question</p>
                    <p>{{ stats.total_questions_you_validated }}</p>
                </li>
                <li class="flex justify-between">
                    <p>Total Invalidated Question</p>
                    <p>{{ stats.total_questions_you_invalidated }}</p>
                </li>
            </ul>
        </div>
    </div>

</template>

<style scoped lang="scss">
div{
    div{
        ul{
            li{
                @apply py-[20px] px-[5px] bg-gray-600 my-[10px] rounded flex-col;
                p:nth-of-type(2){
                    align-self: end;
                    font-size: 30px;
                }
            }
        }
    }
}
</style>
