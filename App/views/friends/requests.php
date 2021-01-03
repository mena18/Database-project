<?php require_once(app_path('views/header.php')); ?>
  
<h1>Friends Requests (<?=count($data['users'])?>)</h1>




<?php 


if(!$data['users']){
    echo "<h2 style='color:red'>No friend requests poor man!!</h2>";
}

foreach ($data['users'] as $user ) {
    echo "Email : ".$user->email . "<br/>" ;
    echo "request Date : ".$user->date . "<br/>" ;
    echo  "<br/>" ;
}

?>


<?php require_once(app_path('views/footer.php')); ?>