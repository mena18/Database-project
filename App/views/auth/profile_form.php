<?php require_once(app_path('views/header.php')); $user = $data['user']; $posts = $data['posts']?>

    <div class="profile-page-style">
        <?php require_once(app_path('views/components/profile/profile_header.php'));?>
        <div class="body container-fluid" id="profile-page-body">
            <div class="container post-container" id="posts-container">
                <?php require_once(app_path('views/components/profile/new-post.php'));?>

                <?php
                    foreach ($posts as $post) {
                        $post_id = $post->post_id;
                        $caption = $post->caption;
                        $image = $post->image;
//                        $first_name = $post->first_name;
//                        $last_name = $post->last_name;
                        require(app_path('views/components/profile/post.php'));
                    }
                ?>

            </div>
            <div class="container friend-container" id="friends-container">
                <?php require(app_path('views/components/profile/friend-list.php'));?>
            </div>
            <div class="container friend-container" id="friend-requests-container">
                <?php require(app_path('views/components/profile/friend-request-list.php')); ?>
            </div>
            <div class="container friend-container" id="blocked-users-container">
                <?php require(app_path('views/components/profile/blocked-list.php')); ?>
            </div>
            <div class="container edit-container" id="edit-container">
                <?php require(app_path('views/components/profile/edit-form.php'))?>
            </div>
        </div>
    </div>

<?php require_once(app_path('views/footer.php')); ?>