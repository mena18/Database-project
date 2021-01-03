<?php

require_once(app_path('views/header.php'));
  
echo "should not exists here because you are allowed to view any one profile even if he is not friend";

require_once(app_path('views/footer.php'));