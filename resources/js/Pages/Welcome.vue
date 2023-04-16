<template>
    <div class="max-w-sm sm:max-w-md md:max-w-lg lg:max-w-xl xl:max-w-2xl w-full">
        <button @click="changedStateShowCreatePost" 
                class="w-full mb-5 text-center bg-blue-500 rounded text-white py-2 outline-none focus:outline-none hover:bg-blue-600">
            Agregar publicación
        </button>
        <post-component></post-component>

        <modal :show="showModal" @close="changedStateShowCreatePost">
            <div class="p-5">
                <div class="">
                    <input v-model="text" 
                           type="text" 
                           class="w-full outline-none focus:outline-none p-2 rounded appearance-none border-none" 
                           placeholder="En que estas pensando?">
                           <div class="my-5">
                                <img v-if="url" :src="url" style="max-width: 100%; max-height: 400px; margin: 0 auto;">
                            </div>
                            <div class="flex justify-end">
                                <button @click="selectImage" 
                                        class="outline-none focus:outline-none inline-flex items-center rounded-full cursor-pointer bg-blue-500 p-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" 
                                             fill="none" 
                                             viewBox="0 0 24 24" 
                                             stroke-width="1.5" 
                                             stroke="currentColor" 
                                             class="text-white w-7 h-7">
                                             <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                        </svg>

                                </button>
                                <input @change="fileschanges" 
                                        id="image"
                                        type="file" 
                                        name="image" 
                                        accept="image/gif,image/jpg,image/png,image/jpeg" 
                                        style="display: none;" 
                                />
                            </div>
                            <div class="text-red-500 p-2 mt-5">
                                Error
                            </div>
                </div>
                <button @click="createPost"
                        v-if="text.length > 0 && image != null" 
                        class="w-full mb-5 my-3 text-center bg-blue-500 rounded text-white py-2 outline-none focus:outline-none hover:bg-blue-600">
                        Publicar
                </button>
            </div>
        </modal>
    </div>
</template>

<script>
    import PostComponent from '@/Components/PostComponent';
    import Modal from '@/Jetstream/Modal';

    export default {
  
        data() {
            return {
                showModal: false,
                url: null,
                image: null,
                text: '',
                posts: [],
            }
        },

        components: { 
            PostComponent,
            Modal,
        },

        methods: {
            changedStateShowCreatePost() {
                this.showModal = !this.showModal
            },

            fileschanges(e) {
                let file = e.target.files[0]
                this.image = file
                this.url = URL.createObjectURL(file)
            },

            selectImage() {
                document.getElementById('image').click();
            },

            async createPost(){
                const formData = new FormData()
                formData.append('image', this.image)
                formData.append('text', this.text)

                await axios.post('/create-post', formData, {
                    headers: {
                        'Content-Type':'multipart/form-data'
                    }
                }).then((response) => {
                    this.posts.unshift(response.data)
                    this.resetData()
                })
            },

            resetData(){
                this.showModal = false
                this.url = null
                this.image = null
                this.text = ''
            },
        },
    }
</script>
