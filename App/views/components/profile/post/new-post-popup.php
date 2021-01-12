<div class="creat-post" id="create-post">
    <div class="create-post-form">
        <div class="header row">
            <div class="title col-md-8 offset-md-2" style="text-align: center">
                Create Post
            </div>
            <div class="col-md-2">
                <i class="fas fa-times-circle btn" id="create-post-close-btn" onclick="hide_form('create-post')"></i>
            </div>
        </div>
        <hr>
        <div class="outer-container">
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
                <div class="display-image" id="create-post-image-container">
                    <i class="fas fa-times-circle btn" onclick="$('#create-post-image-container').css('display', 'none')"></i>
                    <img src="#" alt="" id="create-post-image">
                </div>
                <div class="form-group pl-3">
                    <input type="file" name="image" id="create-post-input-image" onchange="display_selected_image(this, 'create-post-image')" hidden/>
                    <label for="create-post-input-image">
                        <i class="fas fa-image"></i>
                        <span class="image-span">Add image</span>
                    </label>
                </div>
                <button class="btn">Post</button>
            </form>
        </div>
    </div>
</div>