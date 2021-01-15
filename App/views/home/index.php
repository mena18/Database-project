<?php require_once(app_path('views/header.php')); $posts = $data['posts'];?>


<div class="home-page-style">
    <div class="header container-fluid">
        <div class="container">
            <?php require(app_path('views/components/main-navbar.php')) ?>
        </div>
    </div>
    <div class="body container-fluid" id="profile-page-body">
        <div class="container post-container">

            
        
        <?php foreach ($data["posts"] as $post) {  ?>
            <?php require(app_path('views/components/profile/post.php')); ?>                    
        <?php } ?>


        </div>
    </div>
</div>


<?php require_once(app_path('views/footer.php')); ?>