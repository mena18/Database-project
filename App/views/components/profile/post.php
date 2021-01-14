<div class="post-form">
    <div class="user-info row">
        <div class="user-photo col-md-2">
            <img src="<?php echo public_path('images/profile_pic.jpg')?>" alt="">
        </div>
        <div class="user-name col-md-5">
            <span>Omar Abo Al-Fotoh</span>
        </div>
        <div class="user-name col-md-3 edit-btn-container">
            <div class="edit-btn" onclick="show_form('edit-post-' + <?php echo $post_id?>)">
                <i class="fas fa-edit"></i>
                <span>Edit</span>
            </div>
        </div>
    </div>
    <div class="post-data">
        <p class="lead">
            <?php echo $caption;?>
        <div class="image-cover">
            <img src="<?php echo public_path($image)?>" alt="">
        </div>
    </div>
    <div class="post-interaction">
        <div class="row">
            <div class="col-md-4 interaction-btn love-color" id="love-btn-<?php echo $post_id ?>" onclick="react(<?php echo $post_id ?>)">
                <i class="fas fa-heart"></i>
                <span id="react-number-<?php echo $post_id?>">5</span>
            </div>
            <div class="col-md-4 interaction-btn" id="show-comments-btn" onclick="show_form('comment-container-' + <?php echo $post_id?>)">
                <i class="fas fa-comment"></i>
                <span>Comment</span>
            </div>
            <div class="col-md-4 interaction-btn" onclick="share(<?php echo $post_id?>)">
                <i class="fas fa-share"></i>
                <span>Share</span>
            </div>
        </div>
        <div style="padding-left: 25px;">
            <hr>
        </div>
    </div>
    <div class="post-write-comment row">
        <div class="col-md-8">
            <textarea class="form-control" id="comment" placeholder="Write a comment..."></textarea>
        </div>
        <div class="col-md-3 btn" id="comment-btn-<?php echo $post_id ?>">
            <i class="fas fa-comment"></i>
            <span>Comment</span>
        </div>
    </div>
</div>

<?php require (app_path('views/components/profile/post/edit_popup.php')); ?>
<?php require(app_path('views/components/profile/post/comment-popup.php')); ?>
