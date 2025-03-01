<template>

    <div class="header-container">
        <Header :isAuthenticated="isAuthenticated" :user="user"/>
    </div>
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
        title: String
    }
}

</script>

<style>

</style>