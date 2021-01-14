<div class="post-form">
    <div class="user-info row">
        <div class="user-photo col-md-2">
            <img src="<?php echo public_path($post->user_picture)?>" alt="">
        </div>
        <div class="user-name col-md-5">
            <a href="<?=url('auth/profile/').$post->writer?>">
                <span><?= $post->user_first_name." ".$post->user_last_name ?></span>
            </a>
        </div>
        <?php if($post->writer == $_SESSION['email']){ ?>
            <?php echo "can edit" ?>
            <div class="user-name col-md-3 edit-btn-container">
                <div class="edit-btn" onclick="show_form('edit-post')">
                    <i class="fas fa-edit"></i>
                    <span>Edit</span>
                </div>
            </div>
        <?php } ?>
    </div>
    <div class="post-data">
        <p class="lead">
            <?= $post->caption ?></p>
<!--            --><?php //echo $caption;?>
        <div class="image-cover">
            <img src="<?php echo public_path($post->image)?>" alt="">
<!--            <img src="--><?php //echo $image?><!--" alt="">-->
        </div>
    </div>
    <div class="post-interaction">
        <div class="row">
            <div class="col-md-4 interaction-btn" id="love-btn">
                <i class="fas fa-heart love-color"></i>
                <span class="love-color"><?= $post->n_reacts ?></span>
            </div>
            <div class="col-md-4 interaction-btn" id="show-comments-btn" onclick="show_form('comment-container')">
                <i class="fas fa-comment"></i>
                <span>Comment</span>
            </div>
            <div class="col-md-4 interaction-btn" id="share-btn">
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
        <div class="col-md-3 btn" id="comment-btn">
            <i class="fas fa-comment"></i>
            <span>Comment</span>
        </div>
    </div>
</div>

<?php require_once (app_path('views/components/profile/post/edit_popup.php')); ?>
<?php require(app_path('views/components/profile/post/comment-popup.php')); ?>
