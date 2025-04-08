<div class="create-post col-md-10 col-12 d-flex justify-content-center align-items-center">
    <div class="card">
        <div class="user-info w-100 h-25 d-flex">
            <div class="w-75 d-flex flex-row justify-content-start gap-5 align-items-center">
                <div class="profile-picture px-2">
                    <img src="../../../public/images/homess/user2.jpg" alt="">
                </div>
                <div class="username d-flex flex-column text-white gap-1">
                    <p class="fs-5"><b>Kishan Chauhan</b></p>
                    <p>kishan007</p>
                </div>
            </div>
            <div class="cancel w-25 d-flex justify-content-end align-items-center px-2">
                <a href="../userprofile/" style="width: 30%; height: 100%;" class="d-flex justify-content-center align-items-center">
                    <img src="../../../public/images/create_post/close.png" alt="close"
                        style="width: 100%; cursor: pointer;">
                </a>
            </div>
        </div>

        <textarea name="description" id="desc" placeholder="What do you want to post?"
            class="form-control border-0 text-white"></textarea>

        <div class="img-show">
            <?php

            if (isset($_POST['btn'])) {
                if ($_FILES['img_file']['type'] == "image/png") {
                    if (!is_dir('../../../public/uploads/posts')) {
                        mkdir('../../../public/uploads/posts');
                    }
                    $filename = uniqid() . "_" . $_FILES['img_file']['name'];
                    if (move_uploaded_file($_FILES['img_file']['tmp_name'], "../../../public/uploads/posts" . $filename)) {
                        echo "<img src='../../../public/uploads/posts{$filename}' class='h-100 object-fit-cover'>";
                    }
                } else {
                    echo "please select a img file";
                }
            }
            ?>
        </div>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="upload-files d-flex justify-content-start gap-2 border-bottom">
                <input type="file" name="img_file" id="image-upload" accept="image/*" style="display: none;">
                <label for="image-upload">
                    <img src="../../../public/images/create_post/image.png" alt="Upload Image" style="cursor: pointer;">
                </label>

                <input type="file" name="video_file" id="video-upload" accept="video/*" style="display: none;">
                <label for="video-upload">
                    <img src="../../../public/images/create_post/video.png" alt="Upload Video" style="cursor: pointer;">
                </label>
            </div>

            <div class="post d-flex justify-content-end p-2">
                <button type="submit" name="btn" class="btn btn-primary rounded-5">Post</button>
            </div>
        </form>



    </div>
</div>