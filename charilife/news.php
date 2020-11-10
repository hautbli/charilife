<?php
include_once 'Snoopy.class.php';
include 'session.php';

$snoopy = new snoopy;

$snoopy->fetch('https://search.daum.net/search?w=news&DA=PGD&enc=utf8&cluster=y&cluster_page=1&q=%EA%B8%B0%EB%B6%80&p=1');
preg_match('/<ul id="clusterResultUL" class="list_info mg_cont clear">(.*?)<\/ul>/is', $snoopy->results, $text);
//echo $text[0];
preg_match_all('/<li>(.*?)<\/li>/is', $text[0], $text1);
//echo $text1[0];

//text1은 9개 원소를 가진 배열이 두개 있는 배열!  array(2) {array(9), array(9)} 연관배열
//var_dump($text1);
//foreach ($text1[0] as $key => $value) {
////    echo $value;
//    preg_match('/<img(.*?)>/is', $value, $image);
////    var_dump($image);
//    //li image = array() {이미지,이미지주소?}, ..외 8개> li가 9개니
//    preg_match('/<div class="cont_inner">(.*?)<\/div>/is', $value, $title);
//    preg_match('/<span class="f_nb date">(.*?)<\/a>/is', $value, $date);
//    preg_match('/<p class="f_eb desc">(.*?)<\/p>/is', $value, $contents);
//    echo $image[0];
//    echo $title[0];
//    echo $date[0] . '</span>';
//    echo $contents[0];
//    echo '<br>';
//}
//?>

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
<?php
include "top.php";
echo '<script > document . getElementById("news") . className = "active";</script>';
?>

<section class="banner-area relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row justify-content-lg-end align-items-center banner-content">
            <div class="col-lg-5">
                <h1 class="text-white">나눔 뉴스</h1>
                <p>함께 나누는 따뜻한 소식</p>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="/test/js/bootstrap.js"></script>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--    <link rel="stylesheet" href="boardlist.css">-->
    <link rel="stylesheet" href="style.css">

</head>
<div class="container" id="board_area" style="width:1000px">
    <table class="list-table" id="news_box">
        <thead>
        <tr>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <?php // DB에 저장된 글목록을 idx의 내림차순으로 가져와 페이지에 집어넣기
        //sql에서 dele
        foreach ($text1[0] as $key => $value) {
            preg_match('/<img(.*?)>/is', $value, $image);
            //    var_dump($image);
            //li image = array() {이미지,이미지주소?}, ..외 8개> li가 9개니
            preg_match('/<div class="wrap_tit mg_tit">(.*?)<\/div>/is', $value, $title);
//            preg_match('/target="_blank">(.*?)<\/a>/is', $title, $title_fn);

            preg_match('/<span class="f_nb date">(.*?)<\/a>/is', $value, $date);
            preg_match('/<p class="f_eb desc">(.*?)<\/p>/is', $value, $contents);
            preg_match('/href="(.*?)"/is', $title[0], $href);
//            echo $href[0];
//            var_dump($href[0]);
            $link = str_replace('"', "'", $href[0]);
//            echo $link;

            $ti = str_replace('<b>','',$title[0]);
            $ti = str_replace('</b>','',$ti);
            $con = str_replace('<b>','',$contents[0]);
            $con = str_replace('</b>','',$con);
            ?>
            <tbody>
            <!--tr태그 안에 쌍따옴표 안에는 꼭 작은따옴표로 넣어야 됨!! -->
            <tr onClick="location.<?= $link ?>" style="cursor:pointer">
                <td><?php echo $image[0]; ?></td>
                <!--제목 클릭시 게시글 읽기-->
                <td style="width: 400px"><b><?php echo $ti; ?></b>
                    <?php echo $date[0] . '</span>'; ?></td>
                <td><?php echo $con; ?></td>
            </tr>

            </tbody>
            <?php
        } ?>
    </table>
    <hr/>
</div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

//infinite 내꺼하자
<script type="text/javascript">

    let x = true; //로드모어데이터 변수 설
    let i = 1;//e

    $(window).scroll(function () {

        let scrollHeight = Math.max(document.documentElement.scrollHeight, document.body.scrollHeight);
        let scrollTop = Math.max(document.documentElement.scrollTop, document.body.scrollTop);
        // let clientHeight =document.getElementById('board_area').clientHeight;
        let clientHeight = document.documentElement.clientHeight;
        console.log(scrollHeight, scrollTop, clientHeight);

        if (scrollTop + clientHeight + 10 >= scrollHeight) {
            i++;
            loadMoreData();
        }
    });

    function loadMoreData() {
        $.ajax(
            {
                url: 'loadmore.php',
                data: {
                    i: i
                },
                type: "post",
                // 비동기!!!!!!!!! 이거해서 두번 되는거 막았다.
                async: false,
                beforeSend: function () {
                    $('.ajax-load').show();
                }
            })
            .done(function (data) {
                $('.ajax-load').hide();
                $("#news_box").append(data);
                // alert(data);
            })
            .fail(function (request, status, error) {
                alert('code:' + request.status + 'message:' + request.responseText + 'error:' + error);

            });

    }

</script>

//위로가기버튼


<style>
    a.top {
        display: none;
        position: fixed;
        right: 10%;
        bottom: 80px;
        padding: 10px 11px;
        font-size: 13px;
        line-height: 100%;
        text-align: center;
        color: #fff;
        background-color: #222;
        border-radius: 3px;
        z-index: 10000;
        cursor: pointer;
        -webkit-transition: background-color 0.2s;
        -o-transition: background-color 0.2s;
        transition: background-color 0.2s;
    }
</style>

<script>
    $(document).ready(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 200) {
                $('.top').fadeIn();
            } else {
                $('.top').fadeOut();
            }
        });
        $('.top').click(function () {
            $('html, body').animate({scrollTop: 0}, 400);
            return false;
        });
    });
</script>
<a href="#" class="top"> TOP </a>




