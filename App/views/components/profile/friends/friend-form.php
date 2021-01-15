<div class="col-md-6">
    <div class="friend-form">
        <img src="<?php echo public_path($user->picture)?>" alt="">
        <a href="<?=url("auth/profile/").$user->email?>"><?=$user->first_name ." ". $user->last_name?></a>
        <!-- <form class="d-inline-block" action="">
            <button class="btn">Unfriend</button>
        </form> -->
    </div>
</div>