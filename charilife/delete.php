<?php
include "dbConnect.php";

//session_start();

$idx = $_POST['idx'];


$sql = "UPDATE board SET deletego = 'n' WHERE idx ='$idx'";

$result = $dbConnect->query($sql);
if ($result) {
    echo "success";
} else {
    echo "Fail:save";
}
?>