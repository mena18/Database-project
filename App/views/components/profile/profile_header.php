<div class="header container-fluid">
    <div class="container">
        <form action="" class="profile-photo-form">
            <img src="<?php echo public_path($profile_user->picture)?>" alt="" onclick="$('#profile-photo').click()">
            <i class="fas fa-camera" onclick="$('#profile-photo').click()"></i>
            <input type="file" id="profile-photo" onchange="$('#change-profile-photo-btn').click()" hidden>
            <input type="submit" id="change-profile-photo-btn" hidden>
        </form>
        <div class="profile-data">
            <p class="lead name">
            <?= $profile_user->first_name ." ". $profile_user->last_name ?> 
                <?php if($profile_user->nick_name) { ?> 
                <span class="nickname">
                   (<?= $profile_user->nick_name ?>)
                </span>
                <?php } ?>
            </p>
            <p class="lead about">
                <?=$profile_user->about_me?>
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
                    <?php if($profile_user->email == $_SESSION['email']) { ?>
                        <li class="nav-item" id="my-friend-requests" onclick="switch_active_btn('my-friend-requests')">
                            <div class="nav-link btn">Friend Requests<span>5</span></div>
                        </li>
                        <li class="nav-item" id="blocked-users-btn" onclick="switch_active_btn('blocked-users-btn')">
                            <div class="nav-link btn">Blocked Users</div>
                        </li>
                        <li class="nav-item" id="edit-my-profile-btn" onclick="switch_active_btn('edit-my-profile-btn')">
                            <div class="nav-link btn">Edit</div>
                        </li>
                    <?php } ?>
                    <li class="nav-item" id="edit-my-profile-btn">
                        <div class="nav-link btn">Unfriend</div>
                    </li>
                    <li class="nav-item" id="edit-my-profile-btn">
                        <div class="nav-link btn">Block</div>
                    </li>
                </ul>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <div class="nav-link btn">
                            <a href="<?=url('home/index')?>">Home</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="nav-link btn">
                            <a href="<?=url('auth/logout')?>">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>