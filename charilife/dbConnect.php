<?php
$host = '127.0.0.1';
$user = 'root';
$passWord = 'root-password';
$dbName = 'myClass';

$dbConnect = new mysqli($host,$user,$passWord,$dbName);

function mq($sql)
{
    global $dbConnect;
    return $dbConnect->query($sql);
}
?>