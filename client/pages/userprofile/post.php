<?php include_once "../header.php" ?>

<!-- <link rel="stylesheet" href="../../../public/css/userProfile.css" /> -->
<style>
    .users-posts {
        height: 100%;
        flex-grow: 1;
        overflow-y: auto;
        /* max-height: calc(100vh); */
        /* Subtract the height of .thoughts from the full height */

    }

    .card {
        width: 80%;
        border-bottom: 0.5px solid wheat;
    }

    .user-img img {
        width: 70px;
        height: 70px;
        border-radius: 50%;
    }

    .posts-photos img {
        border: 1px solid wheat;
    }

    .post-description {
        position: relative;
        overflow: hidden;
        max-height: 70px;
        /* Adjust height based on requirement */
        transition: max-height 0.3s ease-in-out;
    }

    .post-description.expanded {
        max-height: none;
    }

    .read-more-btn {
        cursor: pointer;
        color: blue;
        background: none;
        border: none;
        font-size: 16px;
        padding: 5px 0;
    }

    #like {
        cursor: pointer;
    }

    #comment {
        cursor: pointer;
    }

    #share {
        cursor: pointer;
    }
</style>
</head>

<body>
    <div class="hero vh-100 vw-100 bg-black overflow-x-hidden overflow-y-auto">
    <a href="./index.php" class="text-light fs-4 m-1 w-25">
        <i class="bi bi-arrow-left"></i>
    </a>
        <div class="users-posts w-100 h-100 bg-black">
            <div class="row w-100 h-100 mx-auto d-md-flex justify-content-md-center">
                <div class="col-md-6 pt-5 p-0 d-md-flex justify-content-md-start align-items-md-center flex-md-column h-100">
                    <div class="posts-of-users mb-5 w-100 d-flex justify-content-center">
                        <div class="card bg-black text-white">
                            <div class="card-title">
                                <div class="users-detail d-flex justify-content-between pt-2 px-2">
                                    <div class="user-img w-25">
                                        <img src="../../../public/images/homess/user2.jpg" alt="">
                                    </div>
                                    <div class="d-flex w-75 flex-column">
                                        <h4 class="user-name">heee_jjinn</h4>
                                        <p class="userID">heee007</p>
                                    </div>
                                </div>
                            </div>
                            <div class="posts-photos">
                                <img src="../../../public/images/homess/post1.jpg" alt="" class="card-img-bottom">
                            </div>
                            <div class="post-description mt-2" id="description">
                                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptate,
                                    ducimus ut! Aspernatur veniam incidunt, labore dolor officiis
                                    laborum
                                    illo temporibus dicta in ipsum sapiente quibusdam placeat quis ut!
                                    Quibusdam, eligendi. Lorem ipsum dolor sit amet consectetur,
                                    adipisicing
                                    elit. Pariatur consectetur placeat, asperiores voluptatem in magni
                                    quibusdam amet harum eum dolore officia at sequi neque repellat
                                    doloremque iusto illo enim. A? Lorem ipsum, dolor sit amet
                                    consectetur
                                    adipisicing elit. Officiis impedit sapiente modi perspiciatis
                                    eligendi
                                    maiores maxime totam nulla iusto nihil accusantium reiciendis
                                    laudantium
                                    numquam, consequatur, architecto animi perferendis commodi fuga.</p>
                            </div>
                            <div class="d-flex justify-content-start">
                                <button class="read-more-btn w-25 d-flex justify-content-start" id="toggle-btn">Read
                                    More</button>
                            </div>

                            <div class="like-comment-share d-flex justify-content-between mb-3">
                                <div class="w-75 d-flex justify-content-start gap-1">

                                    <svg id="like" aria-label="Like" class="x1lliihq x1n2onr6 xyb1xck"
                                        fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30">
                                        <title>Like</title>
                                        <path
                                            d="M16.792 3.904A4.989 4.989 0 0 1 21.5 9.122c0 3.072-2.652 4.959-5.197 7.222-2.512 2.243-3.865 3.469-4.303 3.752-.477-.309-2.143-1.823-4.303-3.752C5.141 14.072 2.5 12.167 2.5 9.122a4.989 4.989 0 0 1 4.708-5.218 4.21 4.21 0 0 1 3.675 1.941c.84 1.175.98 1.763 1.12 1.763s.278-.588 1.11-1.766a4.17 4.17 0 0 1 3.679-1.938m0-2a6.04 6.04 0 0 0-4.797 2.127 6.052 6.052 0 0 0-4.787-2.127A6.985 6.985 0 0 0 .5 9.122c0 3.61 2.55 5.827 5.015 7.97.283.246.569.494.853.747l1.027.918a44.998 44.998 0 0 0 3.518 3.018 2 2 0 0 0 2.174 0 45.263 45.263 0 0 0 3.626-3.115l.922-.824c.293-.26.59-.519.885-.774 2.334-2.025 4.98-4.32 4.98-7.94a6.985 6.985 0 0 0-6.708-7.218Z">
                                        </path>
                                    </svg>
                                    <svg id="comment" aria-label="Comment" class="x1lliihq x1n2onr6 x5n08af"
                                        fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30">
                                        <title>Comment</title>
                                        <path d="M20.656 17.008a9.993 9.993 0 1 0-3.59 3.615L22 22Z" fill="none"
                                            stroke="currentColor" stroke-linejoin="round" stroke-width="2">
                                        </path>
                                    </svg>
                                </div>
                                <div class="w-25 d-flex justify-content-end">
                                    <svg id="share" aria-label="Share" class="x1lliihq x1n2onr6 xyb1xck"
                                        fill="currentColor" height="30" role="img" viewBox="0 0 24 24" width="30">
                                        <title>Share</title>
                                        <line fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                            x1="22" x2="9.218" y1="3" y2="10.083">
                                        </line>
                                        <polygon fill="none"
                                            points="11.698 20.334 22 3.001 2 3.001 9.218 10.084 11.698 20.334"
                                            stroke="currentColor" stroke-linejoin="round" stroke-width="2">
                                        </polygon>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>



</body>

</html>