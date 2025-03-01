<template>
    <div class="header-container">
        <Header :isAuthenticated="isAuthenticated" :user="user"/>
    </div>

    <section>
        <h2 class="title">Информация о преподавателе</h2>
        <div class="course-item">
            <div class="teacher-item_title">
                <h2>{{ currentTeacher.last_name }} {{ currentTeacher.first_name }} {{ currentTeacher.patronymic }}</h2>
            </div>
            <div class="course-list">
                <h2>Курсы, которые ведет: </h2>
                <div v-for="course in currentTeacher.courses" :key="course.id" class="course-container" v-if="currentTeacher.courses.length">
                    <div class="course">
                        <div class="course-item_title">
                            <h2>{{ course.name }}</h2>
                            <hr>
                            <p><b>{{ course.price }}</b> Рублей</p>
                        </div>
                        <div class="course-item_more">
                            <button @click="goToCourse(course.id)">Подробнее</button>
                        </div>
                    </div>
                </div>
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
        currentTeacher: Array
    },
    methods:{
        goToCourse(courseId){
            this.$inertia.get('/courses/' + courseId);
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
    .teacher-item_title{
        background-color: black;
        color: white;
        width: 100%;
        padding: 1rem;
        margin: 1rem;
        display: flex;
        justify-content: center;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .teacher-item_title h2{
        font-size: 3vw;
    }

    .course-list{
        width: 100%;
        display: flex;
        justify-content: space-around;
        flex-direction: column;
        align-items: center;
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
        display: flex;
        flex-direction: column;
    }
    .course-item_title h2{
        font-size: 3vw;
    }

    .course-container{
        width: 100%;
        padding: 1rem;
        margin: 1rem;
        display: flex;
        justify-content: center;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .course{
        background-color: black;
        color: white;
        width: 100%;
        margin: 1vw;
        border-radius: 1rem;
        padding: 1rem;
        display: flex;
        justify-content: space-between;
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