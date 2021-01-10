<?php require_once(app_path('views/header.php')); $user = $data['user']?>

    <div class="profile-page-style">
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
                <nav class="navbar navbar-expand-lg">
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
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <div class="body container-fluid">
            <div class="container">
                <div class="new-post">
                    <div class="row">
                        <div class="col-md-2">
                            <img src="<?php echo public_path('images/profile_pic.jpg')?>" alt="">
                        </div>
                        <div class="col-md-9" onclick="show_create_post_form()">
                            <p class="lead">What's on your mind?</p>
                        </div>
                    </div>
                    <hr>
                </div>

                <div class="creat-post" id="create-post">
                    <div class="create-post-form">
                        <div class="header row">
                            <div class="title col-md-8 offset-md-2" style="text-align: center">
                                Create Post
                            </div>
                            <div class="col-md-2">
                                <i class="fas fa-times-circle btn" id="create-post-close-btn" onclick="hide_create_post_form()"></i>
                            </div>
                        </div>
                        <hr>
                        <form class="mb-5" action="<?php echo url('post/create') ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group text-left pl-3 mb-0">
                                <img src="<?php echo public_path('images/profile_pic.jpg')?>" alt="">
                                <p class="lead name d-inline-block pl-2"><?= $user->first_name ?> <?= $user->last_name ?></p>
                                <div class="form-group d-inline-block">
                                    <select name="privacy" id="privacy" class="form-control">
                                        <option value="public" selected>public</option>
                                        <option value="private">private</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group pl-1">
                                <textarea placeholder="What's on your mind?" class="form-control" name="caption" id="caption" cols="5" rows="5"></textarea>
                            </div>
                            <div class="form-group pl-3">
                                <label for="file">
                                    <i class="fas fa-image"></i>
                                    <span class="image-span">Add image</span>
                                </label>
                                <input type="file" name="image" id="image" style="visibility: hidden" />
                            </div>
                            <button class="btn">Post</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>









<?php require_once(app_path('views/footer.php')); ?>