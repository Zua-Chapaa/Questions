<script setup>
import {Link} from "@inertiajs/vue3";
</script>

<template>
    <div class="container w-full h-[100vh] ">
        <div class="flex justify-end h-[50px] border-b bg-red-400"style="padding: 10px 10px">
            <Link as="button" class="btn-danger  px-[10px] py-[3px] rounded" href="/StopSession">Stop Session</Link>
        </div>
        <div style="padding: 15px" class="text-white text-sm">
            <p class="category">Category</p>
            <p class="mb-[10px]">Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ab aperiam beatae deleniti ?</p>
            <ul>
                <li>Choice 1</li>
                <li>Choice 2</li>
                <li>Choice 3</li>
                <li>Choice 4</li>
            </ul>
        </div>
        <div style="padding: 15px" class="text-white text-sm">
            <p>Anything wrong with the above question?</p>
            <ul class="mb-[10px]">
                <li><input type="checkbox"><label>Invalid Context</label></li>
                <li><input type="checkbox"><label>Spelling</label></li>
                <li><input type="checkbox"><label>Invalid Choices</label></li>
                <li><input type="checkbox"><label>Invalid Category</label></li>
                <li><input type="checkbox"><label>Inappropriate question</label></li>
                <li><input type="checkbox"><label>Other</label></li>
            </ul>
            <p>Remarks</p>
            <textarea class="w-full rounded text-gray-600 text-sm"></textarea>
        </div>
        <div style="padding: 15px" class="flex justify-between">
            <button class="btn btn-success">Valid</button>
            <button class="btn btn-danger">Invalid</button>
        </div>
    </div>
</template>

<style scoped lang="scss">
.category{
    @apply p-[4px] bg-orange-400 w-fit mb-[10px] rounded-lg;
}

div{
    li{
        input {
            @apply m-[8px]
        }
    }
}
</style>
