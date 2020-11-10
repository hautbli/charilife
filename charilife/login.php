<!doctype html>
<html lang="zxx" class="no-js" xmlns:class="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8"/>
    <!--    <title>hello</title>-->
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js"></script>
    <script type="text/javascript" src="mySignInForm.js"></script>
    <link rel="stylesheet" href="mySignInForm.css"/>

    <section class="banner-area relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row justify-content-lg-end align-items-center banner-content">
                <div class="col-lg-5">
                    <h1 class="text-white">로그인 </h1>
                    <p>후원자님, 반갑습니다.</p>
                </div>
            </div>
        </div>
    </section>

    <div id="wrap">
        <div id="container">
            <h1 class="title"></h1>
            <form name="singIn" id="signIn" method="post" onsubmit="return checkSubmit()">
                <div class="line">
                    <p>아이디</p>
                    <div class="inputArea">
                        <input type="text" name="memberId" id="memberId" class="memberId"/>
                    </div>
                </div>

                <div class="line">
                    <p>비밀번호</p>
                    <div class="inputArea">
                        <input type="password" id="password" name="memberPw" class="memberPw"/>
                    </div>
                </div>
                <input type="checkbox" id="idSaveCheck">아이디 저장

                <div class="line">
                    <input type="submit" value="로그인" class="submit"/>
                    <input type="button" value="회원가입" class="submit1" onclick="location.href='index.php?page=6' "/>

                    <!--                <button type="button" class=signup" onclick="location.href='index.php?page=6' ">회원가입</button>-->
                </div>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#signIn').submit(function (e) {
                let memberId = document.getElementById("memberId").value;
                let password = document.getElementById("password").value;

                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'signin.php',
                    data: {
                        memberId: memberId,
                        password: password
                    },
                    success: function (result) {
                        if (result === "success") {
                            location.replace('index.php?page=1')
                        } else {
                            alert("아이디와 비밀번호가 일치하지 않습니다.");
                        }
                    },
                    error: function (xtr, status, error) {
                        alert(xtr + ":" + status + ":" + error);
                    }
                });
            });
        });
        $(document).ready(function () {

// 저장된 쿠키값을 가져와서 ID 칸에 넣어준다. 없으면 공백으로 들어감.
            var key = getCookie("key");
            $("#memberId").val(key);

            if ($("#memberId").val() != "") { // 그 전에 ID를 저장해서 처음 페이지 로딩 시, 입력 칸에 저장된 ID가 표시된 상태라면,
                $("#idSaveCheck").attr("checked", true); // ID 저장하기를 체크 상태로 두기.
            }

            $("#idSaveCheck").change(function () { // 체크박스에 변화가 있다면,
                if ($("#idSaveCheck").is(":checked")) { // ID 저장하기 체크했을 때,
                    setCookie("key", $("#memberId").val(), 7); // 7일 동안 쿠키 보관
                } else { // ID 저장하기 체크 해제 시,
                    deleteCookie("key");
                }
            });

            // ID 저장하기를 체크한 상태에서 ID를 입력하는 경우, 이럴 때도 쿠키 저장.
            $("#memberId").keyup(function () { // ID 입력 칸에 ID를 입력할 때,
                if ($("#idSaveCheck").is(":checked")) { // ID 저장하기를 체크한 상태라면,
                    setCookie("key", $("#memberId").val(), 7); // 7일 동안 쿠키 보관
                }
            });
        });

        function setCookie(cookieName, value, exdays) {
            var exdate = new Date();
            exdate.setDate(exdate.getDate() + exdays);
            var cookieValue = escape(value) + ((exdays == null) ? "" : "; expires=" + exdate.toGMTString());
            document.cookie = cookieName + "=" + cookieValue;
        }

        function deleteCookie(cookieName) {
            var expireDate = new Date();
            expireDate.setDate(expireDate.getDate() - 1);
            document.cookie = cookieName + "= " + "; expires=" + expireDate.toGMTString();
        }

        function getCookie(cookieName) {
            cookieName = cookieName + '=';
            var cookieData = document.cookie;
            var start = cookieData.indexOf(cookieName);
            var cookieValue = '';
            if (start != -1) {
                start += cookieName.length;
                var end = cookieData.indexOf(';', start);
                if (end == -1) end = cookieData.length;
                cookieValue = cookieData.substring(start, end);
            }
            return unescape(cookieValue);
        }

    </script>


