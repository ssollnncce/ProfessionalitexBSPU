<template>
    <header>
        <div class="nav-bar">
            <ul>
                <li>
                    <Link href="/" :class="{active: isActive('App')}">Главная страница</Link>
                </li>
                <li>
                    <Link href="/courses" :class="{active: isActive('Courses' || 'CourseDetail')}">Курсы</Link>
                </li>
                <li>
                    <Link href="/teachers" :class="{active: isActive('Teachers' || 'TeacherDetail')}">Преподаватели</Link>
                </li>
            </ul>
        </div>
        <div class="vertical-separator"></div>
        <div class="auth-container">
            <ul>
                <template v-if="isAuthenticated">
                    <li>
                        <Link href="/account">Личный аккаунт {{ user.first_name }}</Link>
                    </li>
                    <li>
                        <Link href="/logout">Выйти</Link>
                    </li>
                </template>
                <template v-else="!isAuthentificated">
                    <li class="auth">
                        <Link href="/login">Войти/Зарегестрироваться</Link>
                    </li>
                </template>
            </ul>
        </div>
    </header>
</template>

<script>

import { Link } from '@inertiajs/vue3';

export default {
    components: {
        Link
    }, 
    props: {
        isAuthenticated: Boolean,
        user: Object,
    },
    methods: {
        isActive(page) {
            return this.$page.component === page;
        }
    }
}


</script>

<style scoped>

    .active{
        font-weight: bold;
    }

    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
        background-color: black;
        color: white;
        margin: 10px;
        border-radius: 1rem;
        height: fit-content;
    }

    .nav-bar {
        width: 60%;
    }

    .nav-bar ul {
        display: flex;
        list-style-type: none;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    .vertical-separator {
        width: 1px;
        height: 100%;
        border: 1px solid white;
    }
    .auth{
        background-color: white;
        color: black;
        border-radius: 0.5rem;
        padding: 0.5em;
    }
    .auth-container ul{
        display: flex;
        gap: 1em;
    }
</style>