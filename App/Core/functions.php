<?php


//only for testing should remove later
function print_array($arr){
	echo "<pre>";
	print_r($arr);
	echo "</pre>";
}

function islogedin(){
	return isset($_SESSION['user']);
}


function require_login(){
	if(!isset($_SESSION['email']) ){
		redirect("auth/login");
	}
}

function validate($_data,$arr){
	$output = [];
	foreach ($arr as $key => $value) {

		if(isset($_data[$key])){
			$output[$key] = $_data[$key]; 
		}else if($value=="required"){ // it dosen't exists and it's required
			return "value ".$key ." is required";
		}else{
			$output[$key] = null; 
		}
		
			
		

	}
	return $output;
}

function upload_file($name){
	if(!$_FILES[$name]['name']){return "";}
	$img=$_FILES[$name];
	$extention = explode('.', $img['name'])[1];
	$img_name = "uploads/".uniqid('',true) .".". $extention;
	move_uploaded_file($img["tmp_name"],"Public/".$img_name);
	return $img_name;
}



function compare_questions($question,$user_answer){
		$correct_answer = $question['answer'];
		if(!is_array($user_answer)){return $correct_answer == $user_answer ? 1 : 0;}
		$options = explode(',',$question['options']);
		$correct_answer = explode(',',$correct_answer);
		$correct_ans = 0;
		$wrong_answers = count($options) - count($correct_answer);
		for($i=0;$i<count($user_answer);$i++){
			if(in_array($user_answer[$i],$correct_answer)){$correct_ans++;}
			else{$wrong_answers--;}
		}
		return ($correct_ans+$wrong_answers)/count($options);

}

function generate_random_password($n){
	$r="";
	$letters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^*";
	$len = strlen($letters);
	for ($i=0; $i <$n ; $i++) {
		$r.=$letters[rand(0,$len-1)];
	}
	return $r;
}
