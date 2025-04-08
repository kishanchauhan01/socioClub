<?php include_once "../header.php" ?>

<link rel="stylesheet" href="../../../public/css/setting.css" />
<style>
    body {
        background-color: #000;
        color: #fff;
    }

    .about-container {
        max-width: 800px;
        background: #111;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
    }

    h2,
    h3 {
        color: #0d6efd;
    }

    p,
    li {
        color: #ccc;
        font-size: 16px;
    }

    ul {
        padding-left: 20px;
    }

    .btn-primary {
        background: #0d6efd;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        transition: 0.3s;
    }

    .btn-primary:hover {
        background: #0b5ed7;
    }
</style>
</head>

<body>

    <div class="hero vh-100 vw-100 bg-black overflow-y-autoz overflow-x-hidden">
        <div class="row w-100 h-100 gap-0 m-0">

            <!-- Left Sidebar -->
            <?php include_once "navbar.php" ?>

            <!-- Right Content (About Us) -->
            <div class="col-md-10 col-12 h-md-100 p-4 d-flex justify-content-center align-items-center">
                <div class="about-container">
                    <h2 class="text-center mb-4">About Socioclub</h2>

                    <section>
                        <h3>Our Story</h3>
                        <p>
                            Socioclub is a vibrant social media platform designed to connect people from all walks of life. Our mission is to create a space where users can share their thoughts, experiences, and creativity through posts, comments, and likes. We believe in the power of community and strive to foster meaningful connections among our users.
                        </p>
                    </section>

                    <section>
                        <h3>Our Vision</h3>
                        <p>
                            At Socioclub, we envision a world where everyone can express themselves freely and connect with others who share their interests. Our goal is to empower individuals to share their stories and engage with a diverse community, making social interaction enjoyable and enriching.
                        </p>
                    </section>

                    <section>
                        <h3>Our Values</h3>
                        <ul>
                            <li><strong>Community:</strong> We prioritize building a supportive and inclusive community where everyone feels welcome.</li>
                            <li><strong>Engagement:</strong> We encourage active participation, allowing users to interact through comments, likes, and shares.</li>
                            <li><strong>Innovation:</strong> We continuously improve our platform to enhance user experience and introduce new features.</li>
                            <li><strong>Respect:</strong> We promote respectful interactions and strive to create a safe environment for all users.</li>
                        </ul>
                    </section>

                    <section class="mt-5 text-center">
                        <h3>Join the Socioclub Experience</h3>
                        <p>
                            Become a part of Socioclub today! Whether you want to share your thoughts, connect with friends, or discover new interests, our platform is here for you. Join us and start engaging with a community that values your voice.
                        </p>
                        <a href="../Guest/pages/" class="btn btn-primary">Get Started Now</a>
                    </section>

                </div>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

</body>

</html>