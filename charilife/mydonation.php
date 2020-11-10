<section class="banner-area relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row justify-content-lg-end align-items-center banner-content">
            <div class="col-lg-5">
                <h1 class="text-white">나의 후원내역</h1>
                <p>여러분의 후원금으로 모든 어린이가 행복한 세상을 만듭니다.</p>
            </div>
        </div>
    </div>
</section>

<?php

$name = $_SESSION['ses_userid'];


$sql = "SELECT * FROM donationlist WHERE sponsor='$name'";
$result = $dbConnect->query($sql);
$data = $result->fetch_array(MYSQLI_ASSOC);

?>

<?php

//한 화면에 보여주는 글 목록 개
$page_size = 10;

//현재 페이지 기억
if (isset($_GET["current_page"])) { //페이지 get 변수가 있다면 받아오고, 없다면 1페이지를 보여준다.
    $current_page = $_GET["current_page"];
} else {
    $current_page = 1;
}

//시작 페이지 정하기
$begin = ($current_page - 1) * $page_size;
?>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="/test/js/bootstrap.js"></script>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <!--    <link rel="stylesheet" href="boardlist.css">-->
    <link rel="stylesheet" href="style.css">
</head>

<div class="container mt-3" id="board_area">
    <!--    <table class="list-table">-->
    <!--        <thead>-->
    <!--        <tr>-->
    <!--            <th>출금일</th>-->
    <!--            <th>후원분야</th>-->
    <!--            <th>납입금액</th>-->
    <!---->
    <!--        </tr>-->
    <!--        </thead>-->
    <?php // DB에 저장된 글목록을 idx의 내림차순으로 가져와 페이지에 집어넣기
    //sql에서 dele
    $sql = "SELECT * FROM donationlist WHERE sponsor  = '$name' ORDER BY num DESC limit {$begin},{$page_size}";
    $result = $dbConnect->query($sql);
    //총 후원금액
    $sql1 = "SELECT * FROM donationlist WHERE sponsor  = '$name'";
    $result1 = $dbConnect->query($sql1);
    //자르기 ...
    //        SELECT CONVERT(VARCHAR(10), GETDATE(), 121)
    $total_my_donation = 0;
    while($donationlist1 = $result1->fetch_array(MYSQLI_ASSOC)){
        $total_my_donation += $donationlist1['donation_fund'];
    }

    while ($donationlist = $result->fetch_array(MYSQLI_ASSOC)) {

        $current_user = $donationlist['sponsor'];

        $tbody .= "
            <tbody>
            <tr>
                <td>" . $donationlist['donate_date'] . "</td>
                <td>" . $donationlist['project'] . "</td>
                <td>" . number_format($donationlist['donation_fund']) . "</td>
                
            </tr>
            </tbody>";
    }
    //계정 다르면 못읽음..
    if (!isset($_SESSION['ses_userid']) || $_SESSION['ses_userid'] !=$current_user) {
    echo "<script>alert(\"접근 권한이 없습니다\");location.replace('index.php?page=1');</script>";
    }
    echo '<center><td>현재까지 ' . number_format($total_my_donation) . '원을 기부하셨습니다.</td></center>';
    echo '<table class="list-table">
   
        <thead>
        <tr>
            <th>날짜</th>
            <th>후원분야</th>
            <th>납입금액</th>

        </tr>
        </thead>' . $tbody . ' </table>'

    ?>

    <script>
        //1000의 자리 쉼표
        function numberFormat(inputNumber) {
            return inputNumber.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }
    </script>

    <!--페이지 번호-->
    <?php



    $page_sql = "SELECT COUNT(num) FROM donationlist WHERE sponsor  = '$name'";     // 글 목록 수 구하는 쿼리문
    $page_result = mysqli_query($dbConnect, $page_sql);    // 쿼리문 실행
    $row = mysqli_fetch_row($page_result);          // 실행 값 열로 가져오기(데이터 접근하기 위해)
    $total_records = $row[0];                       // [0]번째에 저장되어 있으므로..
    $total_pages = ceil($total_records / $page_size);   // 페이지 수 구하기
    ?>
    <div class="pagination justify-content-center">
        <ul class='pagination' style="">
            <?php
            // 페이지 수만큼 페이지 버튼 만들고 해당 페이지 번호에 게시글 배정
            for ($i = 1; $i <= $total_pages; $i++) {
                ?>
                <li class='page-item'><a class='page-link'
                                         href='index.php?page=12&current_page=<?php echo $i; ?>'><?php echo $i; ?></a>
                </li>
            <?php } ?>
    </div>
</div>
