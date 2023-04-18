import { createRouter, createWebHistory } from "vue-router";
import QuizAnswerComponent from "../components/QuizAnswerComponent.vue";

const routes = [
    {
        path: '/',
        name: 'QuizAnswer',
        component: QuizAnswerComponent
    }
]
 export default createRouter({
     history: createWebHistory(),
     routes
 })
