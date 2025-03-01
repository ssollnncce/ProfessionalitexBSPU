<template>

    <Header :isAutentificated="isAuthentificated" :user="user"/>

    <section>
        <h2>Регистрация</h2>
        <div class="form-registration">
            <form @submit.prevent="register">
                <input type="text" placeholder="Введите имя" v-model="form.first_name">
                <input type="text" placeholder="Введите фамилию" v-model="form.last_name">
                <input type="text" placeholder="Введите отчество" v-model="form.patronomyc">
                <input type="email" placeholder="Введите почту" v-model="form.email">
                <input type="text" placeholder="Введите номер телефона" v-model="form.phone">
                <div class="password-group">
                    <input type="password" class="password" placeholder="Введите пароль" v-model="form.password">
                    <input type="password" class="password" placeholder="Подтвердите пароль" v-model="form.password_confirmation">
                </div>
                <div class="separator"></div>
                <button type="submit">
                    Зарегестрироваться
                </button>
            </form>
        </div>
    </section>

</template>

<script>

import axios from 'axios';
import Header from '@/Components/MainComponents/Header.vue';

export default {
    data(){
        return {
            form: {
                name: '',
                first_name: '',
                last_name: '',
                patronomyc: '',
                email: '',
                phone: '',
                password: '',
                password_confirmation: ''
            }
        }
    },
    components: {
        Header
    },
    props: {
        isAuthentificated: Boolean,
        user: Object,
    },
    methods: {
        async register() {
            try {
                await axios.post('/register', this.form, {
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                });
                console.log('Registration successful');
                window.location.href = '/login';
            } catch (error) {
                if (error.response && error.response.data) {
                    this.errors = error.response.data.errors;
                    console.error('Validation errors:', this.errors);
                } else {
                    console.error('Registration failed:', error);
                }
            }
        }
    }
}

</script>

<style scoped>
    section{
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
    }
    h2{
        font-size: 5vw;
    }
    .form-registration{
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
        margin: 0.5rem;
        padding: 0.5rem;
        border-radius: 0.5rem;
        border: none;
        width: 100%;
        color: black;
    }
    .password-group{
        display: flex;
        justify-content: space-between;
        gap: 1em;
    }
    .password{
        margin: 0;
    }

    button{
        width: 100%;
        background-color: white;
        color: black;
        border-radius: 0.5rem;
        padding: 0.5rem;
    }

    .separator{
        width: 100%;
        height: 1px;
        background-color: white;
        margin: 1rem 0;
    }
</style>