<template>
    <app-layout>
        <!-- component -->
        <div class="w-7/12">
            <div class="flex justify-center pb-10">
                    <img :src="user.profile_photo_url"
                        class="h-40 w-40 rounded-full object-cover"
                        :alt="user.nick_name"/>
                    <div class="ml-10">
                        <div class="flex items-center">
                            <h2 class="block leading-relaxed font-light text-gray-700 text-3xl">
                                {{ user.nick_name }}
                            </h2>
                            <a class="cursor-pointer h-7 px-3 ml-3 outline-none border-transparent text-center rounded border bg-blue-500 hover:bg-blue-600 text-white bg-transparent font-semibold">Enviar mensaje</a>
                            <a class="cursor-pointer h-7 px-3 ml-3 focus:outline-none hover:border-transparent text-center rounded border border-gray-400 hover:bg-blue-500 hover:text-white bg-transparent text-gray-500 font-semibold">Editar perfil</a>
                            
                            <button class="flex items-center ml-3 border border-blue-600 hover:bg-blue-600 hover:text-white rounded outline-none focus:outline-none bg-transparent text-blue-600 text-sm py-1 px-2">
                                <span class="block">Seguir</span>
                                <svg class="block h-5 w-5 pl-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </button>
                        </div>
                        <ul class="flex justify-content-around items-center">
                            <li>
                                <span class="flex text-base">
                                    <span class="font-bold mr-2">{{ postsCount }}</span>
                                    Publicaciones
                                </span>
                            </li>
                            <li>
                                <span class="flex cursor-pointer text-base ml-5">
                                    <span class="font-bold mr-2">{{ followers }}</span>
                                    Seguidor
                                </span>
                            </li>
                            <li>
                                <span class="flex cursor-pointer text-base ml-5">
                                    <span class="font-bold mr-2">{{ followed }}</span>
                                    Seguidos
                                </span>
                            </li>
                        </ul>
                        <br>
                        <div class="">
                            <h1 class="text-base font-bold">{{ user.name }}</h1>
                            <span class="text-base">{{ user.presentation}}</span>
                            <a :href="user.web_site" 
                               class="block text-base text-blue-500 mt-2" 
                               target="_blank">
                               {{ user.web_site }}
                            </a>
                        </div>
                    </div>
            </div>
            <div class="border-b border-gray-300"></div>
            <article v-if="posts.length > 0" class="mt-5 grid grid-cols-3 gap-10">

                <!-- Listado de posts -->
                <image-post v-for="(post, index) in posts" :key="index" :post="post"></image-post>
                
            </article>
            <div v-else class="w-full text-center text-3xl pt-10">No hay publicaciones</div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import ImagePost from '@/Pages/UserProfile/ImagePost'

    export default {

        props: [
            'user',
            'followers',
            'followed',
            'postsCount',
            'posts',
        ],

        components: {
            AppLayout,
            ImagePost,
        }
    }

</script>
