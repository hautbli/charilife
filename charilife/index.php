<?php
include "session.php";
include "dbConnect.php";


$index = $_GET['idx'];
// 쿠키없으면 조회수 1증가 쿠키 있으면 조회수 증가 노노 >> 아이디 없거나 아이디 달라도..
if (!empty($_GET['idx']) && empty($_COOKIE['board' . $_GET['idx']])) {
    $sql0 = 'update board set views = views + 1 where idx = ' . $index;
    $result0 = $dbConnect->query($sql0);
    setcookie('board' . $index, TRUE, time() + (60 * 60 * 24), '/');
}

if (!isset($_GET['page'])) header('Location: index.php?page=1');
$page = $_GET['page'];
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png">
    <!-- Author Meta -->
    <meta name="author" content="colorlib">
    <!-- Meta Description -->
    <meta name="description" content="">
    <!-- Meta Keyword -->
    <meta name="keywords" content="">
    <!-- meta character set -->
    <meta charset="UTF-8">
    <!-- Site Title -->
    <title>Charilife Charity</title>

    <link href="https://fonts.googleapis.com/css?family=Lora:400,700|Roboto:300,400" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!--
            CSS
            ============================================= -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/main.css">
</head>

<body>

<!--================ Start Header Area =================-->
<?php
include "top.php";
switch ($page) {
    case '1':
        echo '<script > document . getElementById("Charilife") . className = "active";</script>'; ?><?php
        include 'charlie.php';
        break;
    case '2':
        echo '<script > document . getElementById("about") . className = "active";</script>'; ?><?php
        include 'about.php';
        break;
    case '3':
        echo '<script > document . getElementById("donate") . className = "active";</script>'; ?><?php
        include 'donate.php';
        break;
    case '4':
        echo '<script > document . getElementById("boardpg") . className = "active";</script>'; ?><?php
        include 'main.php';
        break;
    case '5':
        echo '<script > document . getElementById("login") . className = "active";</script>'; ?><?php
        include 'login.php';
        break;
    case '6':
        include 'signUpForm.php';
        break;
    case '7':
        echo '<script > document . getElementById("boardpg") . className = "active";</script>'; ?><?php

        include 'update_write.php';
        break;
    case '8':
        echo '<script > document . getElementById("boardpg") . className = "active";</script>'; ?><?php
        include 'read.php';
        break;
    case '9':
        echo '<script > document . getElementById("boardpg") . className = "active";</script>'; ?><?php
        include 'write.php';
        break;
    case '10':
        echo '<script > document . getElementById("contact") . className = "active";</script>'; ?><?php
        include 'contact.php';
        break;
    case '11':
        echo '<script > document . getElementById("donate") . className = "active";</script>'; ?><?php
        include 'donation.php';
        break;
    case '12':
        echo '<script > document . getElementById("navbardrop") . className = "active";</script>'; ?><?php
        include 'mydonation.php';
        break;
//    case '13':
//        echo '<script > document . getElementById("news") . className = "active";</script>'; ?><!----><?php
//        include 'news.php';
//        break;


}
?>


<!--================ start footer Area =================-->

<footer class="footer">
    <div class="footer-area">
        <div class="container">
            <div class="row section_gap">
                <div class="col-lg-5 col-md-6 col-sm-6">
                    <div class="single-footer-widget tp_widgets">
                        <h4 class="footer_title large_title">아동 권리 협약</h4>
                        <p>
                            어린이에게는 행복하게 누려야 할 많은 권리가 있습니다. 아동권리협약(Convention on the Rights of the Child : CRC)은 18세 미만 아동의 모든 권리를 담은
                            국제적인 약속으로 1989년 11월 20일 유엔에서 만장일치로 채택되었습니다. 우리나라를 포함한 전 세계 196개국(2019년 현재)이 지키기로 했습니다. 아동권리협약에는
                            이 세상 어린이라면 누구나 마땅히 누려야 할 생존·보호·발달·참여의 권리가 담겨 있습니다.
                        </p>
                        <p>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script>
<!--                            All rights reserved | This template is made with <i class="fa fa-heart-o"-->
<!--                                                                                aria-hidden="true"></i> by <a-->
<!--                                    href="https://colorlib.com" target="_blank">Colorlib</a>-->
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
                <div class="offset-lg-1 col-lg-2 col-md-6 col-sm-6">
                    <div class="single-footer-widget tp_widgets">
<!--                        <h4 class="footer_title">Quick Links</h4>-->
<!--                        <ul class="list">-->
<!--                            <li><a href="#">Home</a></li>-->
<!--                            <li><a href="#">Shop</a></li>-->
<!--                            <li><a href="#">Blog</a></li>-->
<!--                            <li><a href="#">Product</a></li>-->
<!--                        </ul>-->
                    </div>
                </div>
                <div class="offset-lg-1 col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget tp_widgets">
                        <h4 class="footer_title">    </h4>
                        <div class="ml-5">
                            <p class="sm-head">
                                <span class="fa fa-location-arrow"></span>
                                주소
                            </p>
                            <p>서울특별시 용산구 한강로 123</p>

                            <p class="sm-head">
                                <span class="fa fa-phone"></span>
                                후원 문의
                            </p>
                            <p>
                                02 123 4566
                            </p>

                            <p class="sm-head">
                                <span class="fa fa-envelope"></span>
                                Email
                            </p>
                            <p>
                                charilfe@exemail.com
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--================ End footer Area =================-->

<!--<script src="js/vendor/jquery-2.2.4.min.js"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/parallax.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/isotope.pkgd.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/countdown.js"></script>
<script src="js/jquery.sticky.js"></script>
<script src="js/main.js"></script>
</body>

</html>