<?php require_once(app_path('views/header.php')); if(isset($data['old'])){ $old = $data['old'];}else{$old=[];} ?>
  

<form action="<?= url('auth/login/') ?>" method="POST" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="email">Email*:</label>
        <input type="email" class="form-control" id="email" placeholder="email" name="email" value="<?php if(isset($old['email'])){echo $old['email'];}?>" required>
    </div>


    <div class="form-group">
        <label for="password">Password*:</label>
        <input type="password" class="form-control" id="password" placeholder="password" name="password" required>
    </div>

    
    

    
    


    <button id='sub_form' type="submit" class="btn btn-primary">Submit</button>
</form>


<?php require_once(app_path('views/footer.php')); ?>