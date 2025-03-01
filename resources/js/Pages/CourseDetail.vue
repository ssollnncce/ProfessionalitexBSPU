<template>
    <div class="header-container">
        <Header :isAuthenticated="isAuthenticated" :user="user"/>
    </div>

    <section>
        <h2 class="title">Описание курса</h2>
        <div class="course-item">
            <div class="course-item_title">
                <h2>{{ currentCourse.name }}</h2>
            </div>
            <div class="course-item_description">
                <p>{{ currentCourse.description }}</p>
                <p>Цена: <b>{{ currentCourse.price }} </b> Рублей</p>
                <Link :href="'/teachers/' +  currentCourse.teacher.id">Преподаватель: {{ currentCourse.teacher.first_name }} {{ currentCourse.teacher.last_name }} {{ currentCourse.teacher.patronymic }}</Link>
                <p>Дата старта: {{ currentCourse.start_date }}</p>
                <p>Дата завершения: {{ currentCourse.end_date }}</p>
            </div>
        </div>
    </section>
</template>

<script>

import Header from '@/Components/MainComponents/Header.vue';
import { Link } from '@inertiajs/vue3';

export default {
    components: {
        Header,
        Link
    },
    props: {
        isAuthenticated: Boolean,
        user: Object,
        currentCourse: Array
    }
}

</script>

<style scoped>
    .title{
        font-size: 5vw;
    }

    section{
        width: 100%;
        display: flex;
        align-items: center;
        flex-direction: column;
    }

    .course-item{
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .course-item_title{
        background-color: black;
        color: white;
        width: 100%;
        padding: 1rem;
        margin: 1rem;
        display: flex;
        justify-content: center;
    }
    .course-item_title h2{
        font-size: 3vw;
    }
</style>