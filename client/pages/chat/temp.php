<?php include_once "../header.php" ?>
<link rel="stylesheet" href="../../../public/css/setting.css">
</head>
<style>
    .scrollbar-hide::-webkit-scrollbar {
        display: none;
    }

    .scrollbar-hide {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }

    .chat-section {
        overflow-y: auto;
        flex-grow: 1;
    }

    .chat-section ul {
        padding: 0;
        margin: 0;
        list-style: none;
    }

    .chat-section li {
        margin-bottom: 10px;
    }

    .chat-input-container {
        display: flex;
        gap: 10px;
        padding: 10px;
        background-color: #1B1F23;
        position: sticky;
        bottom: 0;
        z-index: 10;
    }

    .chat-input-container input {
        flex-grow: 1;
        padding: 10px;
        border: none;
        border-radius: 5px;
        background-color: #282B27;
        color: white;
    }

    .chat-input-container button {
        padding: 10px;
        border: none;
        border-radius: 5px;
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
    }

    .chat-input-container button:hover {
        background-color: #45a049;
    }

    /* Ensure the chat area is scrollable and takes up remaining space */
    #chatArea {
        display: flex;
        flex-direction: column;
        height: 100vh;
    }

    /* Ensure the chat section takes up remaining space and is scrollable */
    #chatArea .chat-section {
        flex-grow: 1;
        overflow-y: auto;
    }

    /* Add a 1px white border to separate the user list and chat area */
    #profileFeed {
        border-right: 1px solid white;
    }

    /* Make the profile in the chat area header clickable */
    .clickable-profile {
        cursor: pointer;
    }
</style>

<body class="bg-gray-900 text-white">

    <!-- Top Bar for smaller screens -->
    <div class="md:hidden fixed top-0 left-0 right-0 bg-gray-800 z-30 p-2 flex justify-between items-center">
        <!-- Hamburger Icon (shown in profile feed) -->
        <button id="hamburgerButton" onclick="toggleSidebar()" class="text-white focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="3" y1="12" x2="21" y2="12"></line>
                <line x1="3" y1="6" x2="21" y2="6"></line>
                <line x1="3" y1="18" x2="21" y2="18"></line>
            </svg>
        </button>

        <!-- Back Button (shown in chat area) -->
        <button id="backButton" onclick="goBackToProfileFeed()" class="text-white focus:outline-none hidden">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M19 12H5M12 19l-7-7 7-7" />
            </svg>
        </button>

        <span class="text-white text-lg font-bold">Chat App</span>
    </div>

    <div class="flex flex-col sm:flex-row h-screen pt-12 md:pt-0 ">
        <!-- Left side bar -->
        <div id="sidebar" class="sidebar bg-gray-800 sticky top-0 z-20 rounded-lg hidden md:block flex items-center">
            <div class="flex flex-col h-screen">
                <div class="flex items-center bg-gray-700 rounded-lg p-2 mb-4 cursor-pointer hover:bg-gray-600" onclick="window.location.href='../home/index.php'">
                    <span class="mr-2">
                        <!-- Home Icon SVG -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 60 60" fill="none">
                            <path d="M11.25 53.75H48.75" stroke="#FC8A8A" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M11.25 53.75V20M48.75 53.75V20" stroke="#FC8A8A" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M5 25L30 5L55 25" stroke="#FC8A8A" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M23.75 53.75V31.25H36.25V53.75" stroke="#FC8A8A" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </div> 
            </div>
        </div>

        <!-- Profile Feed -->
        <div id="profileFeed" class="rounded-none w-full md:w-1/6 bg-[#1B1F23] md:block">
            <section class="pt-2.5 w-full bg-[#18181B] pb-[35rem] shadow-[0px_4px_4px_rgba(0,0,0,0.25)]">
                <div class="flex flex-col pl-1.5 w-full">
                    <ul class="flex list-none p-0 m-0 overflow-y-auto h-screen scrollbar-hide w-full">
                        <li class="flex flex-col md:flex-row w-full">
                            <div class="flex flex-col gap-3.5 w-full">
                                <!-- Profile 1 -->
                                <div class="flex items-center hover:bg-gray-800 transition duration-300 p-2 rounded w-full cursor-pointer" onclick="showChatArea()">
                                    <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/bd2f17561c9249ef9149481515aca2d2/b917abc0a25da1dbd3e8c9d9d7b222c11636ee71ba3f566062297f5e7a5e271e?placeholderIfAbsent=true" alt="Profile picture of Daivd" class="object-contain rounded-full aspect-square w-10 md:w-12" />
                                    <div class="flex flex-col ml-2">
                                        <h2 class="text-xl font-black text-white">Daivd</h2>
                                        <p class="self-start text-sm text-[#D6D3D1]">davi_23</p>
                                    </div>
                                </div>
                                <!-- Add more profiles here -->
                            </div>
                        </li>
                    </ul>
                </div>
            </section>
        </div>

        <!-- Chat Area -->
        <main id="chatArea" class="flex flex-col h-screen w-full md:w-5/6 focus:outline-none focus:ring-2 focus:ring-blue-500 hidden md:block" role="main" aria-label="Chat interface">
            <header class="flex flex-col pt-1.5 pl-2 w-full whitespace-nowrap rounded bg-zinc-800">
                <div style="background-color: #282B27;" class="flex gap-2 self-start w-full rounded-2xl clickable-profile" onclick="window.location.href='../home/index.php'">
                    <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/bd2f17561c9249ef9149481515aca2d2/f4ae4fef877ac4cfe6540e096988883e270ff5e4d5137c05556e06acf0e83ee4" class="object-contain shrink-0 rounded-full aspect-square w-20 hover:opacity-90 transition-opacity" alt="Profile picture of kishan" />
                    <div class="flex flex-col self-start">
                        <h1 class="self-start text-xl font-black text-white hover:text-gray-100 transition-colors">kishan</h1>
                        <p class="mt-2.5 text-sm text-stone-300 hover:text-stone-200 transition-colors">kishan_234</p>
                    </div>
                </div>
                <div class="shrink-0 self-end max-w-full h-0.5 border-2 border-solid border-stone-600" role="separator"></div>
            </header>

            <!-- Chat Section -->
            <section class="chat-section" role="log" aria-label="Chat messages">
                <ul id="chatMessages" class="list-none p-0 m-0 w-full">
                    <li class="flex justify-start mb-2">
                        <div class="bg-blue-500 text-white p-3 rounded-lg max-w-xs">
                            <p class="select-text">Hey, shu kar chho </p>
                        </div>
                    </li>
                    <li class="flex justify-end mb-2">
                        <div class="bg-green-500 text-white p-3 rounded-lg max-w-xs">
                            <p class="select-text">nothing  </p>
                        </div>
                    </li>
                    <li class="flex justify-start mb-2">
                        <div class="bg-blue-500 text-white p-3 rounded-lg max-w-xs">
                            <p class="select-text">this is last message</p>
                        </div>
                    </li>
                    <li class="flex justify-end mb-2">
                        <div class="bg-green-500 text-white p-3 rounded-lg max-w-xs">
                            <p class="select-text">Hey  </p>
                        </div>
                    </li>
                    <li class="flex justify-end mb-2">
                        <div class="bg-green-500 text-white p-3 rounded-lg max-w-xs">
                            <p class="select-text">how s going  </p>
                        </div>
                    </li>
                    <li class="flex justify-end mb-2">
                        <div class="bg-green-500 text-white p-3 rounded-lg max-w-xs">
                            <p class="select-text">how s going  </p>
                        </div>
                    </li>
                </ul>
            </section>

            <footer class="chat-input-container">
                <input type="text" id="chatInput" placeholder="chat something here :)" class="bg-transparent border-none outline-none text-neutral-400 flex-grow placeholder-neutral-500 focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg transition-all" aria-label="Chat input" />
                <button onclick="sendMessage()" class="focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg p-2 hover:bg-slate-600 active:bg-slate-500 transition-colors" aria-label="Send message">
                    <img loading="lazy" src="../../../public/images/chat/send.svg" class="object-contain shrink-0 w-[4.4rem] hover:opacity-90 transition-opacity" style="aspect-ratio: 1.16" alt="Send button" />
                </button>
            </footer>
        </main>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('hidden');
        }

        function showChatArea() {
            const chatArea = document.getElementById('chatArea');
            const profileFeed = document.getElementById('profileFeed');
            const hamburgerButton = document.getElementById('hamburgerButton');
            const backButton = document.getElementById('backButton');

            // Hide profile feed and show chat area on smaller screens
            if (window.innerWidth < 768) {
                profileFeed.classList.add('hidden');
                chatArea.classList.remove('hidden');
                hamburgerButton.classList.add('hidden');
                backButton.classList.remove('hidden');
            }
        }

        function goBackToProfileFeed() {
            const chatArea = document.getElementById('chatArea');
            const profileFeed = document.getElementById('profileFeed');
            const hamburgerButton = document.getElementById('hamburgerButton');
            const backButton = document.getElementById('backButton');

            // Hide chat area and show profile feed on smaller screens
            if (window.innerWidth < 768) {
                chatArea.classList.add('hidden');
                profileFeed.classList.remove('hidden');
                hamburgerButton.classList.remove('hidden');
                backButton.classList.add('hidden');
            }
        }

        function sendMessage() {
            const chatInput = document.getElementById('chatInput');
            const chatMessages = document.getElementById('chatMessages');

            if (chatInput.value.trim() !== '') {
                const newMessage = document.createElement('li');
                newMessage.classList.add('flex', 'justify-end', 'mb-2');

                const messageDiv = document.createElement('div');
                messageDiv.classList.add('bg-green-500', 'text-white', 'p-3', 'rounded-lg', 'max-w-xs');
                messageDiv.textContent = chatInput.value;

                newMessage.appendChild(messageDiv);
                chatMessages.appendChild(newMessage);

                chatInput.value = '';
                chatMessages.scrollTop = chatMessages.scrollHeight;
            }
        }

        // Optional: Handle window resize to adjust layout dynamically
        window.addEventListener('resize', () => {
            const chatArea = document.getElementById('chatArea');
            const profileFeed = document.getElementById('profileFeed');

            if (window.innerWidth >= 768) {
                // On larger screens, show both profile feed and chat area
                profileFeed.classList.remove('hidden');
                chatArea.classList.remove('hidden');
            } else {
                // On smaller screens, hide chat area by default
                chatArea.classList.add('hidden');
                profileFeed.classList.remove('hidden');
            }
        });
    </script>

</body>

</html>