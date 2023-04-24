<template>
    <div>
        <dropdown align="right" width="80" overflow="overflow-y-auto" maxHeight="300">
        <template #trigger>
            <div @click="markAsRead" class="mr-3 relative">
                <div  
                     class="absolute text-white flex items-center justify-center bg-red-600 w-4 h-4 text-xs top-0 right-0 rounded-full">
                     {{ $page.props.unreadNotifications > 9 ? '+9' : $page.props.unreadNotifications }}
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" 
                     fill="none" 
                     viewBox="0 0 24 24" 
                     stroke-width="1.5" 
                     stroke="currentColor" 
                     class="w-6 h-6 cursor-pointer">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                </svg>

            </div>
        </template>

        <template #content>
            <div v-if="$page.props.notifications.length > 0">
                <inertia-link v-for="(notification, index) in $page.props.notifications" :key="index" 
                    class="hover:bg-gray-100 text-xs text-gray-600 flex items-center py-2 px-3">
                    <img :src="notification.data.user.profile_photo_url" 
                         :alt="notification.data.user.name" 
                         class="w-9 h-9 object-cover rounded-full border">
                    <div class="text-sm font-light text-gray-700 ml-3">
                        <div>{{notification.data.user.nick_name  + ' ' +  notification.data.message}}</div>
                        <div class="text-xs text-gray-500">{{ 'Hace ' + getDifferenceDate(created_at) }}</div>
                    </div>

                    <div v-if="$page.props.notifications.length === 0" class="flex items-center py-2 px-3">
                        <span class="text-gray-500 text-sm font-light">No tienes notificaciones</span>
                    </div>
                </inertia-link>
            </div>
        </template>
    </dropdown>
    </div>
    
</template>

<script>
    import Dropdown from '@/Components/Dropdown.vue'
    import moment from 'moment'

    export default {
        components: {
            Dropdown,
        },

        methods: {
            markAsRead(){
                axios.post('/markAsRead').then(response => {
                    this.$page.props.unreadNotifications = 0
                })
            },

            notification(){
                window.Echo.private('App.Models.User.' + this.$page.props.user.id)
                .notification( (notification) => {
                    this.$page.notifications.push({
                        data: {
                            user: notification.user,
                            message: notification.message
                        },
                        created_at: notification.date
                    })
                    this.$page.props.unreadNotifications++
                })
            },

            getDifferenceDate(date){
                return moment(date).toNow(true)
            }
        },

        mounted() {
            this.notification()
        }
        
    }

</script>