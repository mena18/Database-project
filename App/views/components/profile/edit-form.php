<?php $user = $data['user']; ?>
<div class="edit-form">
    <form action="">
        <div class="form-row">
            <div class="col">
                <input type="text" class="form-control" value="<?=$user->first_name?>">
            </div>
            <div class="col">
                <input type="text" class="form-control" value="<?=$user->last_name?>">
            </div>
            <div class="col">
                <input type="text" class="form-control" value="<?=$user->nick_name?>">
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <input type="email" class="form-control" value="<?=$user->email?>" readonly>
            </div>
            
            <div class="col">
                <select name="" id="" class="form-control">
                    <option value="male"  <?php if($user->gender == "male"){echo "selected";} ?> >Male</option>
                    <option value="female" <?php if($user->gender == "female"){echo "selected";} ?> >Female</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <label for="">About me</label>
                <textarea class="form-control" name="" id="" rows="10" maxlength="250">
<?= $user->about_me ?>
</textarea>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <input type="text" class="form-control" value="<?=$user->home_town?>">
            </div>
        </div>
        <div class="phone-numbers-list">
            <div class="new-phone-btn btn" onclick="add_new_phone()">
                <span>New phone</span>
                <i class="far fa-plus-square"></i>
            </div>
            <div class="row phone-numbers-container" id="phone-numbers-container">
                <div class="form-row col-md-4 mb-3" id="phone-number-1">
                    <div class="col">
                        <input type="number" class="form-control" value="01010915791">
                    </div>
                    <div class="remove-btn col" onclick="remove_phone_number(1)">
                        <i class="far fa-trash-alt btn"></i>
                    </div>
                </div>
            </div>
        </div>
        <button class="btn">Save</button>
    </form>
</div>