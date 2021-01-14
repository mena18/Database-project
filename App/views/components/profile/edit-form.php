<div class="edit-form">
    <form action="">
        <div class="form-row">
            <div class="col">
                <input type="text" class="form-control" value="Ahmed">
            </div>
            <div class="col">
                <input type="text" class="form-control" value="Mehanna">
            </div>
            <div class="col">
                <input type="text" class="form-control" value="mehanna-cw">
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <input type="email" class="form-control" value="a@gmail.com" readonly>
            </div>
            <div class="col">
                <input type="password" class="form-control" placeholder="New Password">
            </div>
            <div class="col">
                <select name="" id="" class="form-control">
                    <option value="male" selected>Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <label for="">About me</label>
                <textarea class="form-control" name="" id="" rows="10" maxlength="250">
Hope
Computer Engineering
Programmer
Anime
Fightiiing</textarea>
            </div>
        </div>
        <div class="form-row">
            <div class="col">
                <input type="text" class="form-control" value="Alex Alex Alex">
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