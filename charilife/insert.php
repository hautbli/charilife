<?php
include "dbConnect.php";
include "session.php";

$title = $_POST['title'];
$contents = $_POST['contents'];
$name = $_SESSION['ses_userid'];
$img_url = $_POST['image-url'];

// 제목하고 글 내용이 비어있는지 확인 후 insert 쿼리 실행

if ($title == NULL) {
    echo "Fail:title";
} else if ($contents == NULL) {
    echo "Fail:contents";
}
//else if ($img_url == null) {
//    echo "Fail:img_url";
//}
else {
    $sql = "INSERT INTO board (title,name,contents,views,deletego,image)
VALUES ('$title','$name','$contents',0,'y','$img_url')";
    $result = $dbConnect->query($sql);
    if ($result) {
        echo "success";
    } else {
        echo mysqli_errno($dbConnect);
    }

}
?>
