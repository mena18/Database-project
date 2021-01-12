<div class="header container-fluid">
    <div class="container">
        <div class="profile-image">
            <img src="<?php echo public_path('images/profile_pic.jpg')?>" alt="">
        </div>
        <div class="profile-data">
            <p class="lead name"><?= $user->first_name ?> <?= $user->last_name ?> <span class="nickname">(<?= $user->nick_name ?>)</span></p>
            <p class="lead about">
                Hope<br>
                Computer Engineering <br>
                Programmer <br>
                Anime <br>
                Fightiiing <br>
            </p>
        </div>
        <hr>
        <nav class="navbar navbar-expand-lg pt-0">
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active" id="my-posts-btn" onclick="switch_active_btn('my-posts-btn')">
                        <div class="nav-link btn">Posts</div>
                    </li>
                    <li class="nav-item" id="my-friends-btn" onclick="switch_active_btn('my-friends-btn')">
                        <div class="nav-link btn">Friends</div>
                    </li>
                    <li class="nav-item" id="edit-my-profile-btn" onclick="switch_active_btn('edit-my-profile-btn')">
                        <div class="nav-link btn">Edit</div>
                    </li>
                    <li class="nav-item" id="my-friend-requests" onclick="switch_active_btn('my-friend-requests')">
                        <div class="nav-link btn">Friend Requests</div>
                    </li>
                    <li class="nav-item" id="edit-my-profile-btn">
                        <div class="nav-link btn">Unfriend</div>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <div class="nav-link btn">
                            <a href="">Home</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-link btn">
                            <a href="">Notification</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>