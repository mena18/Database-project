<?php require_once(app_path('views/header.php')); ?>


<div class="home-page-style">
    <div class="header container-fluid">
        <div class="container">
            <?php require(app_path('views/components/main-navbar.php')) ?>
        </div>
    </div>
    <div class="body container-fluid">
        <div class="container friend-container">
        <h1>Search result for "<?=$data['search']?>"</h1>
            <?php $users=$data['users']; require(app_path('views/components/profile/friend-list.php'));?>
        </div>
    </div>
</div>

<script>
    $('#home-btn').removeClass('active');
</script>


<?php require_once(app_path('views/footer.php')); ?>