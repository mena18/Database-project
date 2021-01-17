<!--<h1> this is Footer</h1>-->

<?php require_once(app_path('views/error.php')); ?>




</div>
<script src="<?php echo public_path('js/Main.js'); ?>"></script>


<?php  if(isset($_SESSION['alerts']) && count($_SESSION['alerts'])>0){ ?>

<div class="creat-post" id="alert" >
    <div class="create-post-form" style="height: 300px">
        <div class="header row">
            <div class="pb-5 title col-md-8 offset-md-2" style="text-align: center;">
                <!-- Alert Message -->
            </div>
            <div class="col-md-2">
                <i class="fas fa-times-circle btn" id="create-post-close-btn" onclick="hide_form('alert')"></i>
            </div>
        </div>
        <div class="outer-container" style="text-align:center;color:white;" > 
        
            <?php foreach ($_SESSION['alerts'] as $alert) { ?>
                <h3><?= $alert ?></h3>
            <?php } unset($_SESSION["alerts"]); ?>
            
            
        </div>
        
    </div>
</div>
    <script>
        show_form('alert');
    </script>

<?php  }  ?>












</body>
</html>
