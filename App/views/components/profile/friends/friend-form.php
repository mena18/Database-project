<div class="col-md-6">
    <div class="friend-form">
        <img src="<?php echo public_path($user->picture)?>" alt="">
        <a href="<?=url("auth/profile/").$user->email?>"><?=$user->first_name ." ". $user->last_name?></a>

        <?php if( isset($status) ){ ?>    

        <?php if($status=="friends"){ ?>    
            
            <form class="d-inline-block" method="POST" action="<?=url('friend/delete')?>">
                <input type="hidden" name="receiver" value="<?=$user->email?>">
                <button class="btn">Un Friend</button>
            </form>
            
            <form class="d-inline-block" method="POST" action="<?=url('friend/block')?>">
                <input type="hidden" name="receiver" value="<?=$user->email?>">
                <button class="btn">Block</button>
            </form>

        <?php }else if($status=="request"){ ?>
            
            <form class="d-inline-block" method="POST" action="<?=url('friend/response')?>">
                <input type="hidden" name="sender" value="<?=$user->email?>">
                <input type="hidden" name="response" value="accept">
                <button class="btn">Accept</button>
            </form>

            <form class="d-inline-block" method="POST" action="<?=url('friend/response')?>">
                <input type="hidden" name="sender" value="<?=$user->email?>">
                <input type="hidden" name="response" value="reject">
                <button class="btn">reject</button>
            </form>
            
            

        <?php }else if($status=="block"){ ?>
            
            <form class="d-inline-block" method="POST" action="<?=url('friend/un_block')?>">
                <input type="hidden" name="receiver" value="<?=$user->email?>">
                <button class="btn">Unblock</button>
            </form>

        <?php } ?>

        <?php } ?>
    </div>
</div>