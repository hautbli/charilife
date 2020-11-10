<?php
include_once('mailer.lib.php');

$name = $_POST['name'];
$subject = $_POST['subject'];
$email = $_POST['email'];
$message = $_POST['message'];

// mailer("보내는 사람 이름", "보내는 사람 메일주소", "받는 사람 메일주소", "제목", "내용", "1");
$result =mailer($name, "tpfk49@naver.com", "tpfk49@naver.com","hopems : ".$subject, $message."[보낸사람이메일] : ".$email, 1);

if ($result){
    echo "success";
}else{
    echo "false";
}


?>
