<nav class="navbar navbar-expand-lg">
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav">
            <li class="nav-item active" id="home-btn">
                <div class="nav-link btn">
                    <a href="<?=url('home/index')?>">Home</a>
                </div>
            </li>
<!--            <li class="nav-item" id="notification-btn" onclick="show_form('notifications-container')">-->
<!--                <div class="nav-link btn">Notification</div>-->
<!--            </li>-->
            <li class="nav-item">
                <div class="nav-link btn">
                    <a href="<?=url('auth/profile')?>">Profile</a>
                </div>
            </li>
        </ul>
    </div>
    <form class="form-inline" action="<?=url('home/search')?>" method="POST">
        <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn my-2 my-sm-0" type="submit">Search</button>
    </form>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto mr-auto">
            <li class="nav-item">
                <div class="nav-link btn">
                    <a href="<?= url('auth/logout') ?>">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>