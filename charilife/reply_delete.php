<?php
include "dbConnect.php";
include "session.php";

$rno = (int)$_POST['rno'];
//$sql = mq("select * from reply where idx_rp='".$rno."'");
//$reply = $sql->fetch_array();
//
//$index = $_POST['b_no'];
//$sql2 = mq("select * from board where idx='".$index."'");
//$board = $sql2->fetch_array();
//
//$pwk = $_POST['pw'];
//$bpw = $reply['pw'];




$sql3 = "update reply set delete_rp='n' where idx_rp = {$rno}";
$res = $dbConnect->query($sql3);
if ($res){
    echo 'success';
    exit();
}else{
    echo mysqli_errno($dbConnect);
    exit();
}

?>
