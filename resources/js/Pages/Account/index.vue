<script setup>
import {Link, useForm} from "@inertiajs/vue3";


const props = defineProps(['stats'])
</script>

<template>
    <div class="container w-full h-[100vh] ">
        <div class="flex justify-end h-[50px] border-b" style="padding: 10px 10px">
            <Link as="button" class="btn-primary  px-[10px] py-[3px] rounded" href="/StopSession">Home</Link>
        </div>
        <div class="text-white p-[10px]">
            <h2 class="h2" >Over All Stats</h2>
            <ul class="mb-[20px]">
                <li class="flex justify-between"><p>Total Applicants</p><p>{{stats.all_user}}</p></li>
                <li class="flex justify-between"><p>Total Question</p><p>{{stats.all_questions}}</p></li>
                <li class="flex justify-between"><p>Total Validated Question</p><p>{{stats.total_validated_questions}}</p></li>
                <li class="flex justify-between"><p>Total Invalidated Question</p><p>{{stats.total_invalidated_questions}}</p></li>
            </ul>
            <h2 class="h2" >Your Stats</h2>
            <ul class="mb-[20px]">
                <li class="flex justify-between"><p>Total Question Handled</p><p>{{stats.total_handled}}</p></li>
                <li class="flex justify-between"><p>Total Validated Question</p><p>{{stats.total_questions_you_validated}}</p></li>
                <li class="flex justify-between"><p>Total Invalidated Question</p><p>{{stats.total_questions_you_invalidated}}</p></li>
            </ul>
        </div>
    </div>

</template>

<style scoped lang="scss">

</style>
