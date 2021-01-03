<?php require_once(app_path('views/header.php')); ?>
  
<h1>Friends List (<?=count($data['users'])?>)</h1>




<?php 

foreach ($data['users'] as $user ) {
    echo "Email : ".$user->email . "<br/>" ;
    echo "FriendShip Date : ".$user->date . "<br/>" ;
    echo  "<br/>" ;
}

?>



<?php require_once(app_path('views/footer.php')); ?>