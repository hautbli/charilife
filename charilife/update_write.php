<?php

echo $data['name'];

$idx = $_GET['idx'];
// 해당 글을 읽어오기 위한 쿼리문..

$sql = "SELECT * FROM board WHERE idx='$idx'";
$result = $dbConnect->query($sql);
$data = $result->fetch_array(MYSQLI_ASSOC);

//session에 데이터가 없다면 메인 화면으로 GO
if (!isset($_SESSION['ses_userid']) || $_SESSION['ses_userid'] != $data['name']) {
    echo "<script>alert(\"접근 권한이 없습니다\");location.replace('index.php?page=4');</script>";
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
<head>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="/test/js/bootstrap.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>글 수정하기</title>
    <link rel="stylesheet" href="/test/css/bootstrap.css">
</head>
<!--php에서 html로 변수 가져오는 방법-->
<input type="hidden" id="index1" value="<?= $idx ?>">
<script>
    $(document).ready(function () {
        $('#form_data').submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'update.php',
                // serialize()뒤에 데이터 붙이는 방법
                data: $(this).serialize() + "&idx=" + $('#index1').val(),
                success: function (result) {
                    if (result === "success") {
                        alert("게시글을 수정하였습니다.");
                        location.replace('index.php?page=4')
                    } else if (result === "Fail:save") {
                        alert("글 수정 실패...다시 시도 해주세요.");
                    } else if (result === "Fail:title") {
                        alert("제목이 없습니다. 제목을 입력하세요.");
                    } else if (result === "Fail:contents") {
                        alert("글 내용이 없습니다. 글 내용을 입력하세요.");
                    }
                },
                error: function (xtr, status, error) {
                    alert(xtr + ":" + status + ":" + error);
                },
                // complete : function(data){
                //     alert("complete!!")
                // }
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
    jQuery(document).ready(function() {

        jQuery("#btn").click(function() {

                jQuery("#image-src").css("display", "none");
                <?= $data['image']==null ?>

        });
    });
</script>


<body>
<div class="container">
    <form id='image-form' enctype='multipart/form-data'>
        <input type='file' name='image' onchange="image_upload()">
    </form>

    <form id="form_data" method="POST">
        <table class="table table-bordered">
            <thead>
            <caption></caption>
            </thead>
            <tbody>
            <tr>
                <th>제목 :</th>
                <td><input type="text" name="title" id="title" class="form-control" value = "<?= $data['title'] ?>"placeholder="Enter your Title"></td>
            </tr>
            <tr>
                <th>작성자 :</th>
                <td><?php echo $data['name']; ?></td>
            </tr>
            <tr>
                <th>이미지 :</th>
                <td>  <div id="image-src">
                        <img src="<?php echo $data['image']; ?>" width=300/>
                    </div></td>
            </tr>
            <tr>
                <th>내용 :</th>
                <td><textarea cols="10" name="contents" id="contents" class="form-control" placeholder="Enter your Contents"
                              style="margin-top: 0px; margin-bottom: 0px; height: 279px;"><?= $data['contents'] ?></textarea></td>
            </tr>

            <button type="button" id="btn">이미지 삭제</button>


            <input id="image-url" type="hidden" name="image-url" value="">


            </tbody>
        </table>
        <input type="submit" class="btn btn-outline-primary" value="저장하기">
    </form>
</div>
</body>
</html>
