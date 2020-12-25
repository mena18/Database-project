<?php

require_once(app_path('views/header.php'));
  
echo "here to view list of posts<br>";

echo "this isn't direct page with a controller it made to be included inside (home page, your friend page , your page )";

require_once(app_path('views/footer.php'));