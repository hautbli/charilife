<?php
include "dbConnect.php";
include "session.php";

$rno = (int)$_POST['rno'];

$sql3 = "update reply set content='{$_POST['content']}' where idx_rp = {$rno}";
$res = $dbConnect->query($sql3);
if ($res){
    echo 'success';
    exit();
}else{
    echo mysqli_errno($dbConnect);
    exit();
}

?>

