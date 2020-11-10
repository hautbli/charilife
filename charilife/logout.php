<?php
include "session.php";

unset($_SESSION['ses_userid']);

if(!isset($_SESSION['ses_userid'])) {
    echo "success";
}else {
        echo mysqli_errno($dbConnect);
}
?>