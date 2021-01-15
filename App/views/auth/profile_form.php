<?php require_once(app_path('views/header.php')); $profile_user = $data['user'];$user = $data['user']; $posts = $data['posts']?>

    <div class="profile-page-style">
        <?php require_once(app_path('views/components/profile/profile_header.php'));?>
        <div class="body container-fluid" id="profile-page-body">
            <div class="container post-container" id="posts-container">
                <?php require_once(app_path('views/components/profile/new-post.php'));?>

                
                <?php foreach ($data['posts'] as $post) {?>
                    <?php require(app_path('views/components/profile/post.php'));?>
                <?php } ?>


            </div>
            <div class="container friend-container" id="friends-container">
                
                <?php 
                    $users=$data['friends']; 
                    if($profile_user->email == $_SESSION['email']){
                        $status="friends";
                    }
                    require(app_path('views/components/profile/friend-list.php'));
                ?>
                
            </div>
            
            
            <?php if($profile_user->email == $_SESSION['email']) { ?>
                
                <div class="container friend-container" id="friend-requests-container">
                    <?php 
                        $users=$data['friend_requests']; 
                        $status="request";
                        require(app_path('views/components/profile/friend-list.php'));
                    ?>
                </div>
                <div class="container friend-container" id="blocked-users-container">
                    <?php 
                        $users=$data['blocked_users']; 
                        $status="block";
                        require(app_path('views/components/profile/friend-list.php'));
                    ?>
                </div>
                <div class="container edit-container" id="edit-container">
                    <?php require(app_path('views/components/profile/edit-form.php'))?>
                </div>

            <?php } ?>


        </div>
    </div>

<?php require_once(app_path('views/footer.php')); ?>