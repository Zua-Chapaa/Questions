<script setup>
import {Link, useForm} from "@inertiajs/vue3";


const props = defineProps(['question'])
const question = props.question

const analysis = useForm({
    question_id: question.id,
    invalid_context: false,
    spelling: false,
    invalid_choices: false,
    inappropriate_question: false,
    invalid_category: false,
    other: false,
    remark: ""
})

console.log(analysis.question_id)

function validate(){
    analysis.post(route('SetValid'))
    window.location.href = window.location.href
}

function invalidate(){
    analysis.post(route('SetInvalid'))
    window.location.href = window.location.href
}

</script>

<template>
    <div class="container w-full h-[100vh] ">
        <div class="flex justify-end h-[50px] border-b" style="padding: 10px 10px">
            <Link as="button" class="btn-danger  px-[10px] py-[3px] rounded" href="/StopSession">Stop Session</Link>
        </div>
        <div style="padding: 15px" class="text-white text-sm">
            <p class="category">{{ question.category }}</p>
            <p class="mb-[10px]">{{ question.question }}</p>
            <ol>
                <li>{{ question.choice_1 }}</li>
                <li>{{ question.choice_2 }}</li>
                <li>{{ question.choice_3 }}</li>
                <li>{{ question.choice_4 }}</li>
            </ol>
        </div>
        <div style="padding: 15px" class="text-white text-sm">
            <p>Anything wrong with the above question?</p>
            <ul class="mb-[10px]">
                <li><input v-model="analysis.invalid_context" type="checkbox"><label>Invalid Context</label></li>
                <li><input v-model="analysis.spelling" type="checkbox"><label>Spelling</label></li>
                <li><input v-model="analysis.invalid_choices" type="checkbox"><label>Invalid Choices</label></li>
                <li><input v-model="analysis.invalid_category " type="checkbox"><label>Invalid Category</label></li>
                <li><input v-model="analysis.inappropriate_question" type="checkbox"><label>Inappropriate question</label></li>
                <li><input v-model="analysis.other" type="checkbox"><label>Other</label></li>
            </ul>
            <p>Remarks</p>
            <textarea v-model="analysis.remark" class="w-full rounded text-gray-600 text-sm"></textarea>
        </div>
        <div style="padding: 15px" class="flex justify-between">
            <button @click.prevent="validate" type="button" class="btn btn-success">Valid</button>
            <button @click.prevent="invalidate" type="button" class="btn btn-danger">Invalid</button>
        </div>
    </div>
</template>

<style scoped lang="scss">
.category {
    @apply p-[4px] bg-orange-400 w-fit mb-[10px] rounded-lg;
}

div {
    li {
        input {
            @apply m-[8px]
        }
    }
}
</style>
