<?php

//한 화면에 보여주는 글 목록 개수
$page_size = 15;

//현재 페이지 기억
if (isset($_GET["current_page"])) { //페이지 get 변수가 있다면 받아오고, 없다면 1페이지를 보여준다.
    $current_page = $_GET["current_page"];
} else {
    $current_page = 1;
}

//시작 페이지 정하기
$begin = ($current_page - 1) * $page_size;
?>
<!DOCTYPE html>
<html>
<section class="banner-area relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row justify-content-lg-end align-items-center banner-content">
            <div class="col-lg-5">
                <h1 class="text-white">게시판</h1>
                <p>함께 나누는 따뜻한 이야기</p>
            </div>
        </div>
    </div>
</section>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="/test/js/bootstrap.js"></script>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>게시판 리스트</title>
<!--    <link rel="stylesheet" href="boardlist.css">-->
    <link rel="stylesheet" href="style.css">

</head>
<body>
<div class="container mb-5" id="board_area">
    <table class="list-table">
        <thead>
        <tr>
            <!--게시판 속성-->
            <th>글번호</th>
            <th>제목</th>
            <th>작성자</th>
            <th>날짜</th>
            <th>조회수</th>
        </tr>
        </thead>
        <?php // DB에 저장된 글목록을 idx의 내림차순으로 가져와 페이지에 집어넣기
        //sql에서 dele
        $sql = "SELECT * FROM board WHERE deletego  = 'y' ORDER BY idx DESC limit {$begin},{$page_size}";
        $result = $dbConnect->query($sql);

        while ($board = $result->fetch_array(MYSQLI_ASSOC)) {

            $title = $board['title'];
            // 만약 title의 길이가 길면 중간을 '....'으로 표시
//            if (strlen($title) > 20) {
//                $title = str_replace($board["title"], mb_substr($board["title"], 0, 15, "UTF8") . "...", $board["title"]); //title이 20을 넘어서면 ...표시
//            }
//            ?>
            <tbody>
            <tr>
                <td><?php echo $board['idx']; ?></td>
                <!--제목 클릭시 게시글 읽기-->
                <td><a href="index.php?page=8&idx=<?php echo $board['idx']; ?>"><?php echo $title; ?></td>
                <td><?php echo $board['name']; ?></td>
                <td><?php echo $board['datetime']; ?></td>
                <td><?php echo $board['views']; ?></td>
            </tr>
            </tbody>
            <?php
        } ?> <!--while문 종료-->
    </table>
    <hr/>

    <?php // 로그인 상태면
    if (isset($_SESSION['ses_userid'])) {
        ?>
        <div id="write_btn" >
        <a class="btn btn-outline-primary" href="index.php?page=9">글쓰기</a>
        </div>

        <?php
    } else { ?>
<!--    <div id="write_btn">-->
<!--        <a class="btn btn-outline-primary" href="login.php">로그인</a>-->
<!--    </div>-->
    <?php }
    ?>
    <!--페이지 번호-->
    <?php
    $page_sql = "SELECT COUNT(idx) FROM board WHERE deletego  = 'y'";     // 글 목록 수 구하는 쿼리문
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
                                         href='index.php?page=4&current_page=<?php echo $i; ?>'><?php echo $i; ?></a></li>
            <?php } ?>
    </div>
</div>
</body>
</html>