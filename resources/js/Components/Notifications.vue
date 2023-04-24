<template>
    <div>
        <dropdown align="right" width="80" overflow="overflow-y-auto" maxHeight="300">
        <template #trigger>
            <div class="mr-3 relative">
                <div class="absolute text-white flex justify-center items-center bg-red-600 w-4 h-4 text-xs font-bold top-0 rounded-full">
                    9
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
            <inertia-link class="hover:bg-gray-100 text-xs text-gray-600 flex items-center py-2 px-3">
                <img src="" alt="name" class="w-9 h-9 object-cover rounded-full border">
                <div class="text-sm font-light text-gray-700 ml-3">
                    <div>Te ha comenzado a seguir</div>
                    <div class="text-xs text-gray-500">hace un momento</div>
                </div>
            </inertia-link>
        </template>
    </dropdown>
    </div>
    
</template>

<script>
    import Dropdown from '@/Components/Dropdown.vue'

    export default {
        components: {
            Dropdown,
        }
        
    }

</script>