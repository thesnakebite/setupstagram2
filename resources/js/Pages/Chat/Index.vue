<template>
    <app-layout>
        <!-- component -->
        <div class="w-7/12">
            <div class="grid grid-cols-3 min-w-full border rounded" style="min-height: 80vh;">
                <div class="col-span-1 bg-white border-r border-gray-300">
                    <div class="my-3 mx-3 ">
                        <div class="relative text-gray-600 focus-within:text-gray-400">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6 text-gray-500"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                            </span>
                            <input v-model="search" 
                                   @keyup="searchFriends"
                                   aria-placeholder="Busca tus amigos o contacta nuevos" 
                                   placeholder="Busca tus amigos"
                                   class="py-2 pl-10 block w-full rounded bg-gray-100 outline-none focus:text-gray-700" type="search" name="search" required autocomplete="search" />
                        </div>
                    </div>

                    <ul v-if="search != ''" class="overflow-auto" style="height: 400px;">
                        <h2 class="ml-2 mb-2 text-gray-600 text-lg my-2">Amigos</h2>
                        <li v-if="userchats.length > 0" v-for="(user, index) in userchats" :key="index">
                            <user-chats :username="user.nick_name" 
                                        :image="user.profile_photo_url" 
                                        :message="[]">
                            </user-chats>
                        </li>
                        <div v-else class="ml-2 mb-2 text-gray-600 text-sm my-2">
                            No se encontraron amigos
                        </div>
                    </ul>

                    <ul class="overflow-auto" style="height: 500px;">
                        <h2 class="ml-2 mb-2 text-gray-600 text-lg my-2">Chats</h2>
                        <li>
                            <user-chats></user-chats>
                        </li>
                    </ul>
                </div>
                <div class="col-span-2 bg-white">
                    <chat></chat>
                </div>
            </div>
        </div>
    </app-layout>
</template>


<script>
    import AppLayout from '@/Layouts/AppLayout'
    import UserChats from '@/Components/UserChats'
    import Chat from '@/Components/Chat'


    export default{

        data() {
            return {
                search: '',
                userchats: [],
            }
        },

        components: {
            AppLayout,
            UserChats,
            Chat,
        },

        methods: {
            async searchFriends(){
                if(this.search !=''){
                    await axios('/user/chat/' + this.search)
                    .then(response => {
                        this.userchats = response.data
                    })
                } else{
                    this.userchats = []
                }
            }
        }
    }

</script>