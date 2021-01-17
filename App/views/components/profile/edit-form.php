<?php $user = $data['user']; ?>
<div class="edit-form">
    <form method="POST" action="<?=url('auth/edit_profile')?>">
        <div class="form-row">
            <div class="col">
                <input name="first_name" type="text" class="form-control" placeholder="First Name" value="<?=$user->first_name?>" required>
            </div>
            <div class="col">
                <input name="last_name" type="text" class="form-control" placeholder="Last Name" value="<?=$user->last_name?>" required>
            </div>
            <div class="col">
                <input name="nick_name" type="text" class="form-control" placeholder="Nickname" value="<?=$user->nick_name?>">
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
            <div class="col-md-12">
                <span>Date of birth</span>
            </div>
            <div class="form-group col-md-4">
                <select name="day" id="days" class="form-control"></select>
            </div>
            <div class="form-group col-md-4">
                <select name="month" id="months" class="form-control"></select>
            </div>
            <div class="form-group col-md-4">
                <select name="year" id="years" class="form-control"></select>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <input name="old_password" type="password" class="form-control" placeholder="Old Password">
            </div>
            <div class="col">
                <input name="new_password" type="password" class="form-control" placeholder="New Password">
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
                <input name="home_town" type="text" class="form-control" placeholder="Address" value="<?=$user->home_town?>">
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

<?php 

$birth_day = $pieces = explode("-", $user->birth_date);
$year = $birth_day[0];
$month = $birth_day[1]-1;
$day = $birth_day[2];

?>

<script>
window.onload = () => {
    init_date_selectors(<?php echo "$day, $month, $year" ?> );
}
</script>