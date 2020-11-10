<header class="default-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="img/logo.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars"></span>
            </button>
            <style>
                .ca {text-transform: capitalize;}
                .up {text-transform: uppercase;}
                .lo {text-transform: lowercase;}
                .va {font-variant: small-caps;}
                .btn_c{
                    border: 1px solid black;
                    background-color: #f45c2e;
                    padding: 4px;
                }
            </style>
            <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <?php
                    if ($_SESSION['ses_userid']=="admin1"){
                        echo '<li><button id="chat_admin" onclick="chat_admin()" class="ca" >관리자 상담</button></li>';
                    }
                    ?>
                    <li><button id="chat_user"  class="ca btn_c"  onclick="chat_user()" >실시간 상담 문의</button></li>
                    <li><a id="Charilife" href="index.php?page=1" class="ca" >Charilife</a></li>
                    <li><a id="about" href="index.php?page=2">소개</a></li>
                    <li><a id="donate" href="index.php?page=3">후원하기</a></li>
                    <li><a id="boardpg" href="index.php?page=4">게시판</a></li>
                    <li><a id="contact" href="index.php?page=10">위치</a></li>
                    <li><a id="news" href="news.php">뉴스</a></li>



                    <!--                    <li><a id="login" href="index.php?page=5">로그인</a></li>-->
                    <li style="display:none;"><a id="signup" href="index.php?page=6">회원가입</a></li>
                    <li style="display:none;"><a id="update" href="index.php?page=7">수정</a></li>
                    <li style="display:none;"><a id="read" href="index.php?page=8">읽기</a></li>
                    <li style="display:none;"><a id="write" href="index.php?page=9">글쓰기</a></li>
                    <li style="display:none;"><a id="donation" href="index.php?page=11">글쓰기</a></li>

                    <!--                    <li class="dropdown">-->
                    <!--                        <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">-->
                    <!--                            MY-->
                    <!--                        </a>-->
                    <!--                        <div class="dropdown-menu">-->
                    <!--                            <a class="dropdown-item" href="logout.php">로그아웃</a>-->
                    <!--                            <a class="dropdown-item" href="elements.html">마이페이지</a>-->
                    <!--                        </div>-->
                    <!--                    </li>-->

                    <?php
                    if (isset($_SESSION['ses_userid'])) {
                        ?>
                        <li class="dropdown">
                            <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                                <?php echo $_SESSION['ses_userid'] ?>
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" id="logoutgg">로그아웃</a>
                                <a class="dropdown-item" href="index.php?page=12">나의 후원내역</a>
                            </div>
                        </li>

                        <?php
                    } else { ?>
                        <li><a id="login" href="index.php?page=5">로그인</a></li>

                    <?php }
                    ?>




                    <!--                    <li class="dropdown">-->
                    <!--                        <a class="dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">-->
                    <!--                            Blog-->
                    <!--                        </a>-->
                    <!--                        <div class="dropdown-menu">-->
                    <!--                            <a class="dropdown-item" href="blog.html">Blog</a>-->
                    <!--                            <a class="dropdown-item" href="blog-details.html">Blog Details</a>-->
                    <!--                        </div>-->
                    <!--                    </li>-->

                    <!--                    <li><a href="contact.html">Contact</a></li>-->
                </ul>
            </div>
        </div>
    </nav>
</header>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
    $(document).ready(function () {
        $('#logoutgg').on('click', function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'logout.php',
                data: $(this).serialize(),
                success: function (result) {
                    if (result === "success") {
                        alert("로그아웃 되었습니다");
                        window.location.reload();

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

    function chat_admin() {
        window.open('http://localhost:3000/index2.html ', '', 'width=600,height=400,left=300,top=300')
    }
    function chat_user() {
        window.open('http://localhost:3000/ ', '', 'width=600,height=400,left=300,top=300')
    }

</script>