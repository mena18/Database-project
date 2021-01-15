<?php $user = $data['user']; ?>
<div class="edit-form">
    <form method="POST" action="<?=url('auth/edit_profile')?>">
        <div class="form-row">
            <div class="col">
                <input name="first_name" type="text" class="form-control" value="<?=$user->first_name?>">
            </div>
            <div class="col">
                <input name="last_name" type="text" class="form-control" value="<?=$user->last_name?>">
            </div>
            <div class="col">
                <input name="nick_name" type="text" class="form-control" value="<?=$user->nick_name?>">
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <input type="email" class="form-control" value="<?=$user->email?>" readonly>
            </div>
            
            <div class="col">
                <select name="gender" id="" class="form-control">
                    <option value="male"  <?php if($user->gender == "male"){echo "selected";} ?> >Male</option>
                    <option value="female" <?php if($user->gender == "female"){echo "selected";} ?> >Female</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <label for="">About me</label>
                <textarea class="form-control" name="about_me" id="" rows="10" maxlength="250">
<?= $user->about_me ?>
</textarea>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <input name="hone_town" type="text" class="form-control" value="<?=$user->home_town?>">
            </div>
        </div>
        <div class="phone-numbers-list">
            <div class="new-phone-btn btn" onclick="add_new_phone()">
                <span>New phone</span>
                <i class="far fa-plus-square"></i>
            </div>
            <div class="row phone-numbers-container" id="phone-numbers-container">

            <?php $inital_id=1 ?>

                <?php foreach ($data['phones'] as $phone ) { ?>
                
                    <div class="form-row col-md-4 mb-3" id="phone-number-<?=$inital_id?>">
                        <div class="col">
                            <input name="phones[]" type="number" class="form-control" value="<?=$phone->phone_num?>">
                        </div>
                        <div class="remove-btn col" onclick="remove_phone_number(<?=$inital_id?>)">
                            <i class="far fa-trash-alt btn"></i>
                        </div>
                    </div>
                    <?php $inital_id++; ?>
                <?php } ?>

            </div>
        </div>
        <button class="btn">Save</button>
    </form>
</div>