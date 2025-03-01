<template>

    <div class="header-container">
        <Header :isAutentificated="isAuthentificated" :user="user"/>
    </div>

    <section>
        <h2>Авторизация</h2>
        <div class="form-authorization">
            <form @submit.prevent="login">
                <input type="text" placeholder="Введите почту" v-model="form.email">
                <input type="password" placeholder="Введите пароль" v-model="form.password">
                <div class="separator"></div>
                <button type="submit">
                    Войти
                </button>
            </form>
            <Link href="/register">Нет аккаунта? Зарегестрироваться</Link>
        </div>
    </section>


</template>

<script>

import Header from '@/Components/MainComponents/Header.vue';
import { Link } from '@inertiajs/vue3';

export default {
    data(){
        return {
            form: {
                email: '',
                password: ''
            }
        }
    },
    components: {
        Header,
        Link
    },
    props: {
        isAuthentificated: Boolean,
        user: Object,
    },
    methods:{
        async login() {
            console.log('Отправляемые данные:', this.form);
            try {
                await axios.post('/login', this.form, {
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                });
                console.log('Login successful');
                window.location.href = '/'; // Перенаправление на страницу после успешного входа
            } catch (error) {
                if (error.response && error.response.data) {
                    this.errors = error.response.data.errors;
                    console.error('Validation errors:', this.errors);
                } else {
                    console.error('Login failed:', error);
                }
            }
        }
    }
}

</script>

<style scoped>

    h2{
        font-size: 5vw;
    }
    section{
        width: 100%;
        height: auto;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .form-authorization{
        background-color: black;
        padding: 2rem;
        border-radius: 2rem;
        color: white;
    }
    form{
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    input{
        border-radius: 1rem;
        padding: 1em;
        width: 100%;
        margin: 1vw;
        color: black;
    }
    button{
        background-color: white;
        color: black;
        border-radius: 1rem;
        padding: 0.5em;
        width: 100%;
    }
    .separator{
        width: 100%;
        border: 1px solid white;
        margin: 0.5em;
    }
</style>