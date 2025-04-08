<?php include_once "../header.php" ?>
<link rel="stylesheet" href="../../../public/css/setting.css">
</head>
<style>
    /* Hide scrollbar for all elements */
    ::-webkit-scrollbar {
        display: none;
    }

    /* Hide scrollbar for Firefox */
    * {
        scrollbar-width: none;
    }

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

    /* Hide chat area on mobile when in profile feed */
    @media (max-width: 767px) {
        #chatArea {
            display: none;
        }
    }
</style>

<body class="bg-gray-900 text-white">

    <!-- Top Bar for smaller screens -->
    <div class="md:hidden fixed top-0 left-0 right-0 bg-gray-800 z-30 p-2 flex justify-between items-center">
        <!-- Back Button (shown in profile feed) -->
        <button id="backButtonProfile" onclick="window.location.href='../home/index.php'" class="text-white focus:outline-none">
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
                <div class="tab max-w-xs overflow-hidden">
                    <ul class="flex flex-col items-center space-y-1 list-none p-0 m-0">
                        <li class="flex items-center p-2 rounded-lg hover:bg-gray-600 cursor-pointer" onclick="window.location.href=''">
                            <span class="mr-2">
                                <!-- Search Icon SVG -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.9101 13.1085C4.9101 8.68273 8.4979 5.09493 12.9237 5.09493C17.3494 5.09493 20.9372 8.68273 20.9372 13.1085C20.9372 17.5343 17.3494 21.1221 12.9237 21.1221C8.4979 21.1221 4.9101 17.5343 4.9101 13.1085ZM12.9237 1.08815C6.28501 1.08815 0.90332 6.46984 0.90332 13.1085C0.90332 19.7472 6.28501 25.1288 12.9237 25.1288C15.2451 25.1288 17.4128 24.4708 19.2505 23.331L24.7491 28.8297C25.8249 29.9054 27.5691 29.9054 28.6448 28.8297C29.7206 27.7539 29.7206 26.0097 28.6448 24.934L23.1462 19.4353C24.286 17.5977 24.944 15.4299 24.944 13.1085C24.944 6.46984 19.5623 1.08815 12.9237 1.08815Z" fill="#FFEAEA" />
                                </svg>
                                </svg>
                            </span>
                        </li>
                        <li class="flex items-center p-2 rounded-lg hover:bg-gray-600 cursor-pointer" onclick="window.location.href='../settings/index.php'">
                            <span class="mr-2">
                                <!-- Settings Icon SVG -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 31 31" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.9247 10.3169C13.1586 10.3169 10.9163 12.5593 10.9163 15.3254C10.9163 18.0915 13.1586 20.3339 15.9247 20.3339C18.6908 20.3339 20.9332 18.0915 20.9332 15.3254C20.9332 12.5593 18.6908 10.3169 15.9247 10.3169ZM13.4205 15.3254C13.4205 13.9423 14.5417 12.8211 15.9247 12.8211C17.3078 12.8211 18.429 13.9423 18.429 15.3254C18.429 16.7084 17.3078 17.8296 15.9247 17.8296C14.5417 17.8296 13.4205 16.7084 13.4205 15.3254Z" fill="white" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.1634 2.10855C13.3938 2.10855 11.9592 3.54311 11.9592 5.3127C11.9592 6.71048 10.4461 7.58408 9.23561 6.88521C7.7031 6.00041 5.74348 6.52549 4.85868 8.058L4.09778 9.37592C3.21298 10.9084 3.73806 12.8681 5.27058 13.7529C6.48109 14.4518 6.48109 16.199 5.27058 16.8979C3.73806 17.7827 3.21298 19.7423 4.09778 21.2748L4.85868 22.5928C5.74348 24.1253 7.7031 24.6504 9.23561 23.7656C10.4461 23.0667 11.9592 23.9403 11.9592 25.338C11.9592 27.1076 13.3938 28.5422 15.1634 28.5422H16.6852C18.4548 28.5422 19.8893 27.1076 19.8893 25.338C19.8893 23.9403 21.4025 23.0666 22.613 23.7655C24.1455 24.6503 26.1052 24.1253 26.99 22.5927L27.7509 21.2748C28.6357 19.7423 28.1106 17.7827 26.5781 16.8979C25.3676 16.199 25.3676 14.4518 26.5781 13.7529C28.1106 12.8681 28.6357 10.9084 27.7509 9.37592L26.99 8.05803C26.1052 6.52549 24.1455 6.00042 22.613 6.88522C21.4025 7.58412 19.8893 6.7105 19.8893 5.31271C19.8893 3.5431 18.4548 2.10855 16.6852 2.10855H15.1634ZM14.6026 5.3127C14.6026 5.00299 14.8537 4.75192 15.1634 4.75192H16.6852C16.9949 4.75192 17.246 5.00299 17.246 5.31271C17.246 8.74538 20.9619 10.8908 23.9347 9.17444C24.2029 9.01958 24.5459 9.11149 24.7008 9.37971L25.4617 10.6976C25.6165 10.9658 25.5246 11.3088 25.2564 11.4637C22.2836 13.18 22.2836 17.4708 25.2564 19.1871C25.5246 19.342 25.6165 19.6849 25.4617 19.9532L24.7008 21.271C24.5459 21.5393 24.2029 21.6312 23.9347 21.4763C20.9619 19.76 17.246 21.9054 17.246 25.338C17.246 25.6478 16.9949 25.8988 16.6852 25.8988H15.1634C14.8537 25.8988 14.6026 25.6478 14.6026 25.338C14.6026 21.9054 10.8867 19.76 7.91393 21.4763C7.64572 21.6312 7.30275 21.5393 7.1479 21.2711L6.387 19.9532C6.23214 19.6849 6.32404 19.342 6.59226 19.1871C9.56502 17.4708 9.56502 13.18 6.59226 11.4637C6.32404 11.3088 6.23214 10.9658 6.387 10.6976L7.1479 9.37968C7.30275 9.11147 7.64572 9.01957 7.91393 9.17443C10.8867 10.8907 14.6026 8.74531 14.6026 5.3127Z" fill="white" />
                                </svg>
                            </span>
                        </li>
                        <li class="flex items-center p-2 rounded-lg hover:bg-gray-600 cursor-pointer" onclick="showContent('privacy')">
                            <!-- Privacy Icon SVG -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27" fill="none">
                                <path d="M3.45801 21.9277V4.69135C3.45801 4.07974 3.95842 3.57933 4.57003 3.57933H22.3624C22.974 3.57933 23.4744 4.07974 23.4744 4.69135V18.0356C23.4744 18.6472 22.974 19.1476 22.3624 19.1476H6.23806L3.45801 21.9277Z" stroke="white" stroke-width="2.22405" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M9.01855 8.02742H17.9147" stroke="white" stroke-width="2.22405" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M9.01855 11.3635H17.9147" stroke="white" stroke-width="2.22405" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M9.01855 14.6996H13.4666" stroke="white" stroke-width="2.22405" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </li>
                    </ul>
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
                <div style="background-color: #282B27;" class="flex gap-2 self-start w-full rounded-2xl">
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
            const backButtonProfile = document.getElementById('backButtonProfile');
            const backButton = document.getElementById('backButton');

            // Hide profile feed and show chat area on smaller screens
            if (window.innerWidth < 768) {
                profileFeed.classList.add('hidden');
                chatArea.classList.remove('hidden');
                backButtonProfile.classList.add('hidden');
                backButton.classList.remove('hidden');
            }
        }

        function goBackToProfileFeed() {
            const chatArea = document.getElementById('chatArea');
            const profileFeed = document.getElementById('profileFeed');
            const backButtonProfile = document.getElementById('backButtonProfile');
            const backButton = document.getElementById('backButton');

            // Hide chat area and show profile feed on smaller screens
            if (window.innerWidth < 768) {
                chatArea.classList.add('hidden');
                profileFeed.classList.remove('hidden');
                backButtonProfile.classList.remove('hidden');
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