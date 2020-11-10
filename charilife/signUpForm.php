<!doctype html>
<html lang="zxx" class="no-js">
<!--<head>-->
<!--<meta charset="UTF-8" />-->
<!--<title>sign </title>-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.0.min.js"></script>
<script type="text/javascript" src="mySignupForm.js"></script>
<link rel="stylesheet" href="mySignupForm.css"/>
<!--</head>-->
<body>
<section class="banner-area relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row justify-content-lg-end align-items-center banner-content">
            <div class="col-lg-5">
                <h1 class="text-white">회원가입 </h1>
                <p>좋은 이웃이 되어주세요.</p>
            </div>
        </div>
    </div>
</section>
<div id="wrap">
    <div id="container">
        <h1 class="title">회원가입</h1>
        <div class="line">
            <p>아이디</p>
            <div class="inputArea">
                <input type="text" name="memberId" id="memberId" class="memberId"/>
            </div>
            <div
            <button class="memberIdCheck">
                중복 확인
            </button>
        </div>
        <div class="memberIdComment comment"></div>
    </div>
    <div class="line">
        <p>이름</p>
        <div class="inputArea">
            <input type="text" name="memberName" id="memberName" class="memberName"/>
        </div>
    </div>
    <div class="line">
        <p>비밀번호</p>
        <div class="inputArea">
            <input type="password" name="memberPw" id="memberPw" class="memberPw"/>
        </div>
    </div>
    <div class="line">
        <p>비밀번호 확인</p>
        <div class="inputArea">
            <input type="password" name="memberPw2" id="memberPw2" class="memberPw2"/>
            <div class="memberPw2Comment comment"></div>
        </div>
    </div>
    <div class="line">
        <p>이메일</p>
        <div class="inputArea">
            <input type="text" name="memberEmailAddress" id="memberEmailAddress" class="memberEmailAddress"/>
            <div class="memberEmailAddressComment comment"></div>
        </div>
    </div>
    <div class="line">
        <button id="membercheck">가입하기</button>
    </div>

    <div class="formCheck">
        <input type="hidden" name="idCheck" class="idCheck"/>
        <input type="hidden" name="pw2Check" class="pwCheck2"/>
        <input type="hidden" name="eMailCheck" class="eMailCheck"/>
    </div>
</div>
</div>
</body>
</html>
<script> // 글,제목,이름 데이터 저장

    $(document).ready(function () {

        $('#membercheck').on('click',function (e) {

            let memberId = document.getElementById("memberId").value;
            let memberName = document.getElementById("memberName").value;
            let memberPw = document.getElementById("memberPw").value;
            let memberPw2 = document.getElementById("memberPw2").value;
            let memberEmailAddress = document.getElementById("memberEmailAddress").value;

            if (memberId == "" || memberName == "" || memberPw == "" || memberPw2 == ""|| memberEmailAddress == "") {
                alert("빈칸을 입력해주세요");
                return;
            }
            $.ajax({
                type: 'POST',
                url: 'memberSave2.php',
                data: {
                    memberId: memberId,
                    memberName: memberName,
                    memberPw: memberPw,
                    memberPw2: memberPw2,
                    memberEmailAddress: memberEmailAddress
                },
                success: function (result) {
                    if (result === "success") {
                        alert("회원가입을 완료했습니다.");
                        location.replace('index.php?page=5');
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