<?php

include "dbConnect.php";
include "session.php";

$index = $_POST['bno'];
$content = $_POST['content'];
$user = $_POST['dat_user'];

$sql = "insert into reply(con_num,name,content,delete_rp) values({$index},'{$user}','{$content}','y')";
$res = $dbConnect->query($sql);

if ($res){
    echo 'success';
    exit();
}else{
    echo mysqli_errno($dbConnect);
    exit();
}

?>