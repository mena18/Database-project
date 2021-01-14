<div class="new-post">
    <div class="row">
        <div class="col-md-2">
            <img src="<?php echo public_path('images/profile_pic.jpg')?>" alt="">
        </div>
        <div class="col-md-9" onclick="show_form('create-post')">
            <p class="lead">What's on your mind?</p>
        </div>
    </div>
    <hr>
</div>
<?php require(app_path('views/components/profile/post/new-post-popup.php'));?>