<?php
include "dbConnect.php";
include "session.php";

$radioVal = (int)$_POST['radioVal'];
$radioVal1 = (int)$_POST['radioVal1'];
$radioVal2 = (int)$_POST['radioVal2'];
$name = $_SESSION['ses_userid'];

$isSuccess = true;
$isSuccess1 = true;
$isSuccess2 = true;


if ($radioVal !== 0) {

    $sql = "INSERT INTO donationlist VALUES (0, '식수위생지원사업' ,{$radioVal},'$name',now())";
    if ($dbConnect->query($sql)) {
    } else {
        echo 'water_error:'.mysqli_errno($dbConnect);
        $isSuccess = false;
    }
}

if ($radioVal1 !== 0) {

    $sql1 = "INSERT INTO donationlist VALUES (0, '희망학교지원사업' ,{$radioVal1},'{$name}',now())";
    if ($dbConnect->query($sql1)) {
    } else {
        $isSuccess1 = false;
        echo 'school_bs_error:'.mysqli_errno($dbConnect);
    }

}
if ($radioVal2 !== 0) {

    $sql2 = "INSERT INTO donationlist VALUES (0, '해외교육지원사업' ,{$radioVal2},'$name',now())";
    if ($dbConnect->query($sql2)) {
    } else {
        $isSuccess2 = false;
        echo 'education_bs_error:'.mysqli_errno($dbConnect);
    }

}

if ($isSuccess==true && $isSuccess1==true && $isSuccess2==true ){
    echo 'success';
}
?>
