<script setup>

import {useForm} from "@inertiajs/vue3";

const questions = defineProps(['questions'])

function accept_question(question){
    const questionsFrom = useForm({
        'question':question
    });

    questionsFrom.post(route('acceptQuestion'))
}

function reject_question(question){
    const questionsFrom = useForm({
        'question':question
    });

    questionsFrom.post(route('rejectQuestion'))
}
</script>

<template>
    <div class="text-white container" style="padding-top: 20px">
        <div class="mb-[30px] bg-gray-600 rounded" style="padding: 10px" v-for="question in questions.questions">
            <p >{{ question.question}}</p>
            <ul style="padding: 0 20px;margin-bottom: 20px">
                <li>{{question.choice_1}}</li>
                <li>{{question.choice_2}}</li>
                <li>{{question.choice_3}}</li>
                <li>{{question.choice_4}}</li>
            </ul>
            <p style="margin-bottom: 10px">Corrections</p>
            <ul style="padding: 0 20px;margin-bottom: 20px">
                <li>{{question.answer}}</li>
                <li>{{question.choices[0]}}</li>
                <li>{{question.choices[1]}}</li>
                <li>{{question.choices[2]}}</li>
            </ul>
            <div class="flex">
                <button @click="accept_question(question)" class="btn btn-success" style="margin-right: 30px">Validate</button>
                <button @click="reject_question(question)" class="btn btn-danger">Invalidate</button>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
</style>
