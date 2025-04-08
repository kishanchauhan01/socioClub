<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search - Instagram Style</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #000;
            color: #fff;
        }

        .search-bar {
            position: sticky;
            top: 0;
            z-index: 100;
            background: #111;
            padding: 10px;
        }

        .search-input {
            background: #222;
            border: none;
            color: #fff;
        }

        .search-input::placeholder {
            color: #aaa;
        }

        .search-results {
            margin-top: 10px;
        }

        .user-card {
            background: #111;
            border: none;
            padding: 10px;
            border-radius: 10px;
            display: flex;
            align-items: center;
        }

        .user-card a {
            text-decoration: none;
            color: inherit;
            display: flex;
            align-items: center;
            flex-grow: 1;
        }

        .user-card img {
            border-radius: 50%;
            width: 50px;
            height: 50px;
        }

        .follow-btn {
            font-size: 14px;
            padding: 5px 10px;
        }
    </style>
</head>

<body>

    <!-- Search Bar -->
    <div class="search-bar d-flex align-items-center px-3">
        <a href="../home" class="text-light fs-4 me-3">
            <i class="bi bi-arrow-left"></i>
        </a>
        <input type="text" class="form-control search-input" placeholder="Search users...">
    </div>

    <!-- Search Results -->
    <div class="container search-results mt-3">
        <h5 class="text-secondary">Recent Searches</h5>
        <div class="list-group">
            <div class="list-group-item user-card">
                <a href="../userprofile/">
                    <img src="../../../public/images/homess/user1.jpg" alt="User">
                    <div class="ms-3">
                        <h6 class="mb-0 text-white">Kishan Chauhan</h6>
                        <small class="text-secondary">@kishan007</small>
                    </div>
                </a>
                <button class="btn btn-outline-light follow-btn">Follow</button>
            </div>

            <div class="list-group-item user-card">
                <a href="../userprofile/">
                    <img src="../../../public/images/homess/user2.jpg" alt="User">
                    <div class="ms-3">
                        <h6 class="mb-0 text-white">John Doe</h6>
                        <small class="text-secondary">@johndoe</small>
                    </div>
                </a>
                <button class="btn btn-outline-light follow-btn">Follow</button>
            </div>

            <div class="list-group-item user-card">
                <a href="../userprofile/">
                    <img src="../../../public/images/homess/nuser.jpeg" alt="User">
                    <div class="ms-3">
                        <h6 class="mb-0 text-white">Jane Smith</h6>
                        <small class="text-secondary">@janesmith</small>
                    </div>
                </a>
                <button class="btn btn-outline-light follow-btn">Follow</button>
            </div>
        </div>
    </div>

</body>

</html>