<template>
    <app-layout>
        <welcome />
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from './Welcome.vue'

    export default {
        components: {
            AppLayout,
            Welcome,
        }
    }
</script>
