<?php
// main.php에서 넘어온 글 번호 값
$index = $_GET['idx'];
////
// 쿠키없으면 조회수 1증가 쿠키 있으면 조회수 증가 노노 >> 아이디 없거나 아이디 달라도.. index에 있음!!
//if (!empty($index) && empty($_COOKIE['board' . $index])) {
//    $sql0 = 'update board set views = views + 1 where idx = ' . $index;
//    $result0 = $dbConnect->query($sql0);
//    setcookie('board' . $index, TRUE, time() + (60 * 60 * 24), '/');
//}


// 해당 글을 읽어오기 위한 쿼리문..
$sql = "SELECT * FROM board WHERE idx='$index'";
$result = $dbConnect->query($sql);
$data = $result->fetch_array(MYSQLI_ASSOC);
if ($data['deletego'] == 'n') {
    echo "<script>alert(\"삭제된 게시물입니다\");location.replace('index.php?page=4');</script>";
}

?>
<section class="banner-area relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row justify-content-lg-end align-items-center banner-content">
            <div class="col-lg-5">
                <h1 class="text-white">게시판</h1>
                <p>함께 나누는 따뜻 이야기</p>
            </div>
        </div>
    </div>
</section>
<head>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="/test/js/bootstrap.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="style.css">

</head>
<!--php의 변수 html로 가져오기-->
<input type="hidden" id="d1" value="<?= $index ?>">
<!--삭제를 위한 스크립트-->
<script>
    $(document).ready(function () {
        //삭제 버튼 클릭시
        $('#delete_btn').click(function () {

            if (confirm('게시물을 삭제하시겠습니까?') === true) {
                $.ajax({
                    type: 'POST',
                    url: 'delete.php',
                    data: {
                        idx: $("#d1").val()
                    },
                    success: function (result) {
                        if (result === "success") {
                            alert("게시물이 삭제되었습니다.");
                            location.replace('index.php?page=4');
                        } else if (result === "Fail:delete") {
                            alert("게시물 삭제 실패! ");
                        }
                    },
                    error: function (xtr, status, error) {
                        alert(xtr + ":" + status + ":" + error);
                    }
                });
            } else {
                return false;
            }
        });
    });
</script>

<div class="container">
    <table class="table table-bordered mt-5">
        <thead>
        <caption></caption>
        </thead>
        <tbody>
        <tr>
            <th>제목 :</th>
            <td><?php echo $data['title']; ?></td>
        </tr>
        <tr>
            <th>작성 일자 :</th>
            <td><?php echo $data['datetime']; ?></td>
        </tr>
        <tr>
            <th>조회수 :</th>
            <td><?php echo $data['views']; ?></td>
        </tr>
        <tr>
            <th>작성자 :</th>
            <td><?php echo $data['name']; ?></td>
        </tr>
        <tr>
            <th>이미지 :</th>
            <td><img src="<?php echo $data['image']; ?>" width=300/></td>
        </tr>
        <tr>
            <th>내용 :</th>
            <td style="margin-top: 0px; margin-bottom: 0px; height: 279px;"><?php echo nl2br($data['contents']); ?></td>
        </tr>
        </tbody>
    </table>
    <!--본인이 작성한 글이라면 수정,삭제 버튼 보이기-->
    <center>
        <?php
        if (isset($_SESSION['ses_userid']) && $_SESSION['ses_userid'] == $data['name']) {
            ?>
            <a class="btn btn-outline-primary" id="update_btn"
               href="index.php?page=7&idx=<?php echo $index; ?>">수정하기</a>
            <input type="button" class="btn btn-outline-primary" id="delete_btn" value="삭제하기">
            <a class="btn btn-outline-primary" href="index.php?page=4">목록</a>

            <?php
        } else { ?>
            <a class="btn btn-outline-primary" href="index.php?page=4">목록</a>
        <?php } ?>
    </center>

<!--- 댓글 불러오기 -->

<div class="reply_view">
    <h3>댓글목록</h3>
    <?php
    $sql3 = mq("select * from reply where delete_rp = 'y' and con_num='" . $index . "' order by idx_rp asc");
    while ($reply = $sql3->fetch_array()) {
        ?>
        <div class="">
            <div><b><?php echo $reply['name']; ?></b></div>
            <div class="dap_to comt_edit"><?php echo nl2br("$reply[content]"); ?></div>
            <div class="rep_me dap_to"><?php echo $reply['date']; ?></div>

            <?php //본인이 작성한 댓글만 나옴
            if (isset($_SESSION['ses_userid']) && $_SESSION['ses_userid'] == $reply['name']) {
                ?>
                <div class="rep_me rep_menu">
                    <button class="dat_edit_bt btn">수정</button>
                    <input type="hidden" name="rno" class="rno" value="<?= $reply['idx_rp'] ?>"/>
                    <button class="dat_delete_bt btn">삭제</button>
                </div>
            <?php } ?>

            <!-- 댓글 수정 폼 dialog -->
            <div class="dat_edit">
                <input type="hidden" name="rno" class="rno" value="<?= $reply['idx_rp'] ?>"/>
                <input type="hidden" name="b_no" value="<?php echo $index; ?>">
                <textarea name="content" class="dap_edit_t"><?php echo $reply['content']; ?></textarea>
                <button id="rep_modify_bt" class="re_mo_bt">수정하기</button>
            </div>
        </div>
    <?php } ?>

    <?php // 로그인 상태면
    if (isset($_SESSION['ses_userid'])) {
    ?>
    <!--- 댓글 입력 폼 -->
    <div class="dap_ins">
        <input type="hidden" name="bno" class="bno" value="<?php echo $index; ?>">
        <p type="text" name="dat_user" id="dat_user" class="dat_user"
           size="15"><?= $_SESSION['ses_userid'] ?></p>
        <div style="margin-top:10px; ">
            <textarea name="content" class="reply_content" id="re_content"></textarea>
            <button id="rep_bt" class="re_bt">등록</button>
        </div>
    </div>

<div id="foot_box"></div>


<?php
} ?>

</div>
</div>

<script type="text/javascript" src="common.js"></script>
<script type="text/javascript" src="jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="jquery-ui.css"/>


