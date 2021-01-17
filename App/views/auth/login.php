<?php require_once(app_path('views/header.php')); if(isset($data['old'])){ $old = $data['old'];}else{$old=[];} ?>

    <div class="login-page-style" id="login-page">
        <div class="container">
            <div class="row">
                <div class="col-6 offset-1">
                    <img src="<?php echo public_path('images/logo.svg'); ?>" alt="Facebook">
                    <p class="lead">
                        Facebook helps you connect and share with the people in your life.
                    </p>
                </div>
                <div class="col-5">
                    <div class="form-container">
                        <form action="<?= url('auth/login/') ?>" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?php if(isset($old['email'])){echo $old['email'];}?>" required>
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                            </div>

                            <button id='sub_form' type="submit" class="btn btn-primary">Log In</button>
                        </form>
                        <div class="forgotten-password-link">
                            <!-- <a href="">Forgotten Password?</a> -->
                            <hr>
                        </div>
                        <div class="new-account-btn">
                            <div class="btn btn-success" id="create-new-account" onclick="show_signup_popup()" >Create New Account</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="signup-popup" id="signup-form">
                <div class="signup-popup-container">
                    <div class="header">
                        <span class="title">Sign Up</span>
                        <i class="fas fa-times btn" id="signup-close-btn" onclick="hide_signup_popup()"></i>
                    </div>
                    <span class="pl-3" style="color: #606771; font-size: 14px;">It's quick and easy.</span>
                    <hr>
                    <form action="<?= url('auth/sign_up/') ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" name="first_name" placeholder="First name" required>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="last_name" placeholder="Last name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12">
                                <span class="label">Date of birth</span>
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
                        <div class="form-row" style="margin-top: -17.5px;">
                            <div class="col-md-12">
                                <span class="label">Gender</span>
                            </div>
                            <div class="form-group form-check form-check-inline col-md-4">
                                <label class="form-check-label" for="female">
                                    <span>Female</span>
                                    <input class="form-check-input" type="radio" name="gender" id="female" value="female" required>
                                </label>
                            </div>
                            <div class="form-group form-check form-check-inline col-md-4">
                                <label class="form-check-label" for="male">
                                    <span>Male</span>
                                    <input class="form-check-input" type="radio" name="gender" id="male" value="male" required>
                                </label>
                            </div>
                        </div>
                        <button class="btn btn-success">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.onload = () => {
            init_date_selectors();
        }
        $('body').css('background-color', '#F0F2F5');
    </script>

<?php require_once(app_path('views/footer.php')); ?>