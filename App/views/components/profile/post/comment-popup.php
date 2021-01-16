<div class="creat-post" id="comment-container-<?php echo $post_id?>" >
    <div class="create-post-form">
        <div class="header row">
            <div class="title col-md-8 offset-md-2" style="text-align: center">
                Comments
            </div>
            <div class="col-md-2">
                <i class="fas fa-times-circle btn" id="create-post-close-btn" onclick="hide_form('comment-container-' + <?php echo $post_id?>)"></i>
            </div>
        </div>
        <hr>
        <div class="outer-container">
            <div class="notifications-list row" id="comment-inner-container-<?= $post_id ?>"></div>
        </div>
    </div>
</div>