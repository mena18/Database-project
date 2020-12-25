<?php




require_once(app_path('views/header.php'));
  
foreach ($data['tests'] as $test ) {
    echo "$test->name <br>";
}

require_once(app_path('views/footer.php'));