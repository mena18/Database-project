<?php
//
//require_once(app_path('views/header.php'));
//
//echo "form that will be used for creating and ediiting posts (if create then let it go to the create endpoint and if it
//edit then all the data should be included in the form and the endpoint should be edit post)";
//
//require_once(app_path('views/footer.php'));
//
//?>

<?php require_once (app_path('views/header.php')) ?>

    <form class="mt-5 mb-5" action="<?php url('post/create') ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="caption">Post Caption</label>
            <textarea class="form-control" name="caption" id="caption" cols="15" rows="5"></textarea>
        </div>

        <div class="form-group">
            <label for="image">Media</label>
            <input type="file" class="form-control-file" name="image" id="image">
        </div>

        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="privacy" id="privacy">
            <label class="form-check-label" for="privacy">Public</label>
        </div>

        <button class="btn btn-success pl-5 pr-5">POST</button>
    </form>

<?php require_once (app_path('views/footer.php')) ?>
