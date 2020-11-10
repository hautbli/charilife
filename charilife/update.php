<?php
include "dbConnect.php";
include "session.php";

$title = $_POST['title'];
$contents = $_POST['contents'];
//$name = $_SESSION['userNAME'];
$idx = $_POST['idx'];
$img_url = $_POST['image-url'];


// 제목하고 글 내용이 비어있는지 확인 후 insert 쿼리 실행
if($title == NULL){
    echo "Fail:title";
}else if($contents == NULL){
    echo "Fail:contents";
}else{
    $datetime = date_create()->format('Y-m-d H:i:s');
    $sql = "UPDATE board SET title = '$title', contents = '$contents' ,image ='$img_url' WHERE idx ='$idx'";

    $result = $dbConnect->query($sql);
    if($result){
        echo "success";
    }else{
        echo "Fail:save";
    }
}
?>
