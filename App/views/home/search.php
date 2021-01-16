<?php require_once(app_path('views/header.php')); ?>


<div class="home-page-style">
    <div class="header container-fluid">
        <div class="container">
            <?php require(app_path('views/components/main-navbar.php')) ?>
        </div>
    </div>
    <div class="body container-fluid">
        <div class="container friend-container">
            <?php
                $users=$data['users'];
                if (count($users) > 0)
                    require(app_path('views/components/profile/friend-list.php'));
                else {
            ?>
            <h1>Can not find users by searching about "<?=$data['search']?>"</h1>
            <?php } ?>
        </div>
    </div>
</div>

<script>
    $('#home-btn').removeClass('active');
</script>


<?php require_once(app_path('views/footer.php')); ?>