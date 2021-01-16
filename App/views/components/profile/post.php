<?php $post_id = $post->post_id ?>
<div class="post-form" id="post-container-<?= $post_id ?>">
    <div class="user-info row">
        <div class="user-photo col-md-2">
<!--            <img src="--><?php //echo public_path($post->user_picture)?><!--" alt="">-->
            <?php if ($post->user_picture == '') { ?>
                <img src="<?php echo public_path('images/' . $post->gender . '-profile-image.png')?>" alt="">
            <?php } else { ?>
                <img src="<?php echo public_path($post->user_picture)?>" alt="">
            <?php } ?>
        </div>
        <div class="user-name col-md-4">
            <a href="<?=url('auth/profile/').$post->writer?>">
                <span><?= $post->user_first_name." ".$post->user_last_name ?></span>
            </a>
        </div>
        <div class="date col-4">
            <span><?= substr($post->date, 0, 16) ?></span>
        </div>
        <?php if($post->writer == $_SESSION['email']){ ?>
            <div class="user-name col-md-1 edit-btn-container">
                <div class="edit-btn" onclick="show_form('edit-post-' + <?= $post->post_id?>)" >
                    <i class="fas fa-edit"></i>
                </div>
            </div>
            <div class="user-name col-md-1 edit-btn-container">
                <div class="edit-btn" onclick="deletePost('<?php echo $post->post_id ?>', '<?php echo $post->date ?>')" >
                    <i class="fas fa-trash"></i>
                </div>
            </div>
        <?php } else if ($profile_user->email == $_SESSION['email']) { ?>
            <div class="user-name col-md-1 edit-btn-container">
                <div class="edit-btn" onclick="deletePost('<?php echo $post->post_id ?>', '<?php echo $post->date ?>')" >
                    <i class="fas fa-trash"></i>
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

            <div class="col-md-4 love-btn interaction-btn <?php if($post->get_react($_SESSION['email'],$post_id)){echo 'love-color';} ?> " id="love-btn-<?php echo $post_id ?>" onclick="react(<?php echo $post_id ?>)">
                <i class="fas fa-heart"></i>
                <span id="react-number-<?php echo $post_id?>"><?= $post->n_reacts ?></span>
            </div>
            <div class="col-md-4 interaction-btn" id="show-comments-btn" onclick="displayComments(<?php echo $post_id?>)">
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
            <textarea class="form-control" id="comment-post-<?= $post->post_id ?>" placeholder="Write a comment..."></textarea>
        </div>
        <div class="col-md-3 btn" id="comment-btn-<?php echo $post_id ?>" onclick="comment(<?php echo $post_id?>)">
            <i class="fas fa-comment"></i>
            <span>Comment</span>
        </div>
    </div>
</div>

<?php require (app_path('views/components/profile/post/edit_popup.php')); ?>
<?php require(app_path('views/components/profile/post/comment-popup.php')); ?>
<?php require_once (app_path('views/components/profile/share-alert.php')); ?>
