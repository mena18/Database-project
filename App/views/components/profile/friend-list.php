<div class="friends-list">
    <div class="row">
    
        <?php  foreach ($users as $user) { ?>
            <?php require (app_path('views/components/profile/friends/friend-form.php'))?>    
        <?php } ?>
        
    </div>
</div>