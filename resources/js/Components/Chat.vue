<template>
    <div class="w-full">
        <div class="flex items-center border-b border-gray-300 pl-3 py-3">
            <img class="h-10 w-10 rounded-full object-cover"
                    src="https://images.pexels.com/photos/3777931/pexels-photo-3777931.jpeg?auto=compress&cs=tinysrgb&h=750&w=1260"
                    alt="username" />
            <span class="block ml-2 font-bold text-base text-gray-600">Eduard</span>
            <span class="connected text-green-500 ml-2" >
                <svg width="6" height="6">
                    <circle cx="3" cy="3" r="3" fill="currentColor"></circle>
                </svg>
            </span>
        </div>
        <div id="chat" class="w-full overflow-y-auto p-10 relative" style="height: 700px;" ref="toolbarChat">
            <ul>
                <li class="clearfix2">
                    <div class="w-full flex justify-start">
                        <div class="bg-gray-100 rounded px-5 py-2 my-2 text-gray-700 relative" style="max-width: 300px;">
                            <span class="block">Hello bro</span>
                            <span class="block text-xs text-right">10:30pm</span>
                        </div>
                    </div>
                    <div class="w-full flex justify-end" >
                        <div class="bg-gray-100 rounded px-5 py-2 my-2 text-gray-700 relative" style="max-width: 300px;">
                            <span class="block">Hello</span>
                            <span class="block text-xs text-left">10:32pm</span>
                        </div>
                    </div>
                    <div class="w-full flex justify-end" >
                        <div class="bg-gray-100 rounded px-5 py-2 my-2 text-gray-700 relative" style="max-width: 300px;">
                            <span class="block">how are you?</span>
                            <span class="block text-xs text-left">10:32pm</span>
                        </div>
                    </div>
                    <div class="w-full flex justify-start">
                        <div class="bg-gray-100 rounded px-5 py-2 my-2 text-gray-700 relative" style="max-width: 300px;">
                            <span class="block">I am fine</span>
                            <span class="block text-xs text-right">10:42pm</span>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <div class="w-full py-3 px-3 flex items-center justify-between border-t border-gray-300">
            <button class="outline-none focus:outline-none">
                <svg class="text-gray-400 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </button>
            <button class="outline-none focus:outline-none ml-1">
                <svg class="text-gray-400 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                </svg>
            </button>

            <input aria-placeholder="Escribe un mensaje aquí" placeholder="Escribe un mensaje aquí"
                class="py-2 mx-3 pl-5 block w-full rounded-full bg-gray-100 outline-none focus:text-gray-700" type="text" name="message" required/>

            <button class="outline-none focus:outline-none" type="submit">
                <svg class="text-gray-400 h-7 w-7 origin-center transform rotate-90" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z" />
                </svg>
            </button>
        </div>
    </div>
</template>

<script>

    export default {

    }
</script>