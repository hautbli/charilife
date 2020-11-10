<?php
include "dbConnect.php";
include "session.php";

$memberId = $_POST['memberId'];
$memberPw = md5($memberPw = $_POST['password']);


$sql1 = "SELECT * FROM member WHERE memberId = '{$memberId}' AND password = '{$memberPw}'";
$res1 = $dbConnect->query($sql1);
$row1 = $res1->fetch_array(MYSQLI_ASSOC);
$result = $row1 != null;

if ($result) {
    $_SESSION['ses_userid'] = $row1['memberId'];
    echo "success";
//    header("location: index.php?page=4");
} else {
    echo "false";

//        echo '<script>alert("아이디와 비밀번호가 일치하지 않습니다.");location.replace(\'index.php?page=5\');</script>';

}


?>