<script setup>
import MenuButtons from "@/Compoents/MenuButtons.vue";
import {reactive} from "vue";
import {usePage} from "@inertiajs/vue3";

const props = defineProps(['stats'])
const page = usePage()
const user = page.props.auth.user;


const acceptable = [
    1
]

function allowed(){
    return acceptable.includes(user.id);
}


let menu = reactive({})

function openMenu() {
    let menu = $('#menu')
    menu.fadeIn();
}

function closeMenu() {
    let menu = $('#menu')
    menu.fadeOut();
}
</script>

<template>
    <div class="flex test-white">
        <div id="menu" class="w-[200px] h-[100vh] bg-gray-600" style="display: none">
            <div class=" flex items-start justify-between">
                <img class="w-[140px] p-[10px] mb-[20px]" src="/storage/system/logo.png">
                <div @click.prevent="closeMenu" class="h-[100%] w-[40px] flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="white" class="bi bi-x"
                         viewBox="0 0 16 16">
                        <path
                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                    </svg>
                </div>
            </div>
            <MenuButtons :is_admin="allowed()"></MenuButtons>
        </div>
        <div class="text-white w-[200px]">
            <div class="h-[50px] bg-gray-800 w-[100vw] flex justify-between">
                <div @click.prevent="openMenu" class="h-[100%] w-[40px] flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                         class="bi bi-list" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                    </svg>
                </div>
            </div>
            <slot/>
        </div>
    </div>
</template>

<style scoped lang="scss">

</style>
