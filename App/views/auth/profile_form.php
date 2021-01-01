<?php require_once(app_path('views/header.php')); $user = $data['user']?>
  

<form action="<?= url('auth/my_profile/') ?>" method="POST" enctype="multipart/form-data">
    
    <div class="form-group">
        <label for="email">Email*:</label>
        <input value="<?= $user->email ?>" disabled type="email" class="form-control" id="email" placeholder="email" name="email" required>
    </div>
    
    <div class="form-group">
        <label for="first_name">First name*:</label>
        <input value="<?= $user->first_name ?>" type="text" class="form-control" id="first_name" placeholder="Enter First name" name="first_name" required>
    </div>

    <div class="form-group">
        <label for="last_name">Last name*:</label>
        <input value="<?= $user->last_name ?>" type="text" class="form-control" id="last_name" placeholder="Enter Last name" name="last_name" required>
    </div>



    <div class="form-group">
        <label >Gender*:</label><br>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male" checked>
            <label class="form-check-label" for="inlineRadio1">Male</label>
        </div>
        
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female">
            <label class="form-check-label" for="inlineRadio2">Female</label>
        </div>
        
    </div>
    
    <div  class="form-group">
        <label for="birth_date">Birth Date*:</label>
        <input value="<?= $user->birth_date ?>" type="date" class="form-control" id="birth_date" placeholder="Enter Birth Date" name="birth_date" required>
    </div>



    <div class="form-group">
        <label for="nick_name">NickName:</label>
        <input value="<?= $user->nick_name ?>" type="text" class="form-control" id="nick_name" placeholder="nick_name" name="nick_name">
    </div>

    <div class="form-group">
        <label for="picture">profile picture:</label>
        <input type="file" class="form-control-file" id="picture" placeholder="picture" name="picture">
    </div>

    <div class="form-group">
        <label for="home_town">Home Town:</label>
        <input value="<?= $user->home_town ?>" type="text" class="form-control" id="home_town" placeholder="home_town" name="home_town">
    </div>


    <div class="form-group">
        <label >Marital Status:</label><br>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="status" id="married" value="married">
            <label class="form-check-label" for="married">Married</label>
        </div>
        
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="status" id="signle" value="signle">
            <label class="form-check-label" for="signle">Single</label>
        </div>
        
    </div>

    <div class="form-group">
        <label for="about_me">About me:</label>
        <input value="<?= $user->about_me ?>" type="text" class="form-control" id="about_me" placeholder="about_me" name="about_me">
    </div>

    
    


    <button id='sub_form' type="submit" class="btn btn-primary">Submit</button>
</form>


<?php require_once(app_path('views/footer.php')); ?>