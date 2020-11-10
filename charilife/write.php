<?php
//session에 데이터가 없다면 메인 화면으로 GO
if (!isset($_SESSION['ses_userid'])) {
    echo "<script>alert(\"접근 권한이 없습니다\");location.replace('http://localhost:63342/charilife/board.php');</script>";
}
?>
<!DOCTYPE html>
<html>
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

<script> // 글,제목,이름 데이터 저장
    $(document).ready(function () {
        $('#form_data').submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'insert.php',
                data: $(this).serialize(),
                success: function (result) {
                    if (result === "success") {
                        alert("게시글이 작성되었습니다.");
                        location.replace('index.php?page=4')
                    } else if (result === "Fail:save") {
                        alert("글 쓰기 저장 실패...다시 시도 해주세요.");
                    } else if (result === "Fail:title") {
                        alert("제목이 없습니다. 제목을 입력하세요.");
                    } else if (result === "Fail:contents") {
                        alert("글 내용이 없습니다. 글 내용을 입력하세요.");
                    } else if (result === "Fail:img_url") {
                        alert("이미지가 없습니다. 이미지 입력하세요.");
                    } else {
                        alert(result);
                    }
                },
                error: function (xtr, status, error) {
                    alert(xtr + ":" + status + ":" + error);
                }
            });
        });
    });
</script>

<script> // 이미지 서버 저장
    var img_url;

    function image_upload() {
        var image_form = document.getElementById('image-form');
        formData = new FormData(image_form);
        $.ajax({
            url: "upload.php",
            type: "post",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
        }).done(function (data) {
            document.getElementById('image-src').innerHTML = "<img src=" + data + " width=300>";
            document.getElementById('image-url').value = data;// 데이터 위에서 넣은 걸 여기서 value =  하고 포스트로 값 넘김 아래로
            jQuery("#image-src").show();


        });
    }


</script>
<script type="text/javascript">
    jQuery(document).ready(function () {

        jQuery("#btn").click(function () {

            jQuery("#image-src").css("display", "none");
            document.getElementById('image-url').value = null;// 데이터 위에서 넣은 걸 여기서 value =  하고 포스트로 값 넘김 아래로

        });
    });
</script>
<body>

<div class="container" id="board_write">
    <form id='image-form' enctype='multipart/form-data'>
        <input type='file' name='image' onchange="image_upload()">
    </form>

    <form id="form_data" method="POST">
        <table class="table table-bordered">
            <thead>
            </thead>
            <body>
            <div id="write_area">
                <tr id="in_title">
                    <th>제목 :</th>
                    <td><input type="text" name="title" id="title" class="form-control" placeholder="제목을 입력하세요"></td>
                </tr>
                <tr id='in_name' class='wi_line '>
                    <th>작성자 :</th>
                    <td><?= $_SESSION['ses_userid'] ?></td>
                </tr>
                <tr id='in_name' class='wi_line '>
                    <th>이미지 :</th>
                    <td><p id="image-src"></p></td>
                </tr>

                <tr class='wi_line ' id='in_content'>
                    <th>내용 :</th>
                    <td><textarea cols="10" name="contents" id="contents" class="form-control"
                                  placeholder="내용을 입력하세요"
                                  style="margin-top: 0px; margin-bottom: 0px; height: 279px;"></textarea></td>
                </tr>

                <button type="button" id="btn">이미지 삭제</button>


                <input id="image-url" type="hidden" name="image-url" value="">

            </div>
            </body>
        </table>
        <input type="submit" class="bt_se" value="저장하기">
    </form>
</div>

</body>
</html>
