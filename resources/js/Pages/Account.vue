<template>

    <div class="header-container">
        <Header :isAuthenticated="isAuthenticated" :user="user"/>
    </div>

    <section>
        <h2 class="page-title">Аккаунт пользователя</h2>
        <div class="account-info">
            <div class="personal-title">
                {{ userPersonalInfo.last_name }} {{ userPersonalInfo.first_name }} {{ userPersonalInfo.patronomyc }}
            </div>
            <div class="personal-info">
                <p>Почта: {{ userPersonalInfo.email }}</p>
                <p>Телефон: {{ userPersonalInfo.phone }}</p>
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
        userPersonalInfo: Object
    }
}

</script>

<style>
section{
    width: 100%;
    display: flex;
    align-items: center;
    flex-direction: column;
}

.page-title{
    font-size: 5vw;
}

.account-info{
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.personal-title{
    font-size: 3vw;
    width: 100%;
    display: flex;
    justify-content: center;
    background-color: black;
    color: white;
    margin: 10px;
    padding: 10px;
}

.personal-info{
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    margin: 10px;
    padding: 10px;
    background-color: white;
    border-radius: 10px;
}
</style>