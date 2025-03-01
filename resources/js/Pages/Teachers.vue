<template>
    <div class="header-container">
        <Header :isAuthenticated="isAuthenticated" :user="user"/>
    </div>

    <section>
        <h2 class="title">Список курсов</h2>
        <div v-for="teacher in teachers" :key="teacher.id" class="course-list">
            <div class="course-item">
                <div class="course-item_title">
                    <h2>{{ teacher.last_name }} {{ teacher.first_name }} {{ teacher.patronymic }}</h2>
                </div>
                <div class="course-item_more">
                    <button @click="goToCourse(teacher.id)">Подробнее</button>
                </div>
            </div>
        </div>
    </section>
</template>

<script>

import Header from '@/Components/MainComponents/Header.vue';

export default {
    components: {
        Header
    },
    props: {
        isAuthenticated: Boolean,
        user: Object,
        teachers: Array
    },
    methods:{
        goToCourse(teacherId){
            this.$inertia.get('/teachers/' + teacherId);
        }
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

    .course-list{
        width: 100%;
        display: flex;
        justify-content: space-around;
    }

    .course-item{
        background-color: black;
        color: white;
        width: 100%;
        margin: 1vw;
        border-radius: 1rem;
        padding: 1rem;
        display: flex;
        justify-content: space-between;
    }

    .course-item_title h2{
        font-size: 3vw;
    }   

    .course-item_more{
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 1em;
    }

    button{
        background-color: white;
        color: black;
        border-radius: 0.5rem;
        padding: 0.5rem;
        border: none;
    }
</style>