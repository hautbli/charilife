<!DOCTYPE html>
<html>
<head>
    <meta charset="EUC-KR">
    <title>후원문의 운영시간 안내</title>
    <script language="JavaScript">
        function setCookie(name, value, expiredays) {
            var date = new Date();
            //현재날짜에서 + 1일 해서 setdate함! >> 파기날짜..
            date.setDate(date.getDate() + expiredays);
            document.cookie = escape(name) + "=" + escape(value) + "; expires=" + date.toUTCString();
        }

        function closePopup() {
            if (document.getElementById("check").value) {
                setCookie("popupYN", "N", 1);
                self.close();
            }
        }
    </script>
</head>
<body>
<img src="img/logo.png" alt=""><br>
<fontsize=20> <b>'코로나19'지역감염 위험에 따른, 후원문의 운영시간 안내</b><br>
월~금 오전11시~오후4시까지</font>
<br>
<br>
<input type="checkbox" id="check" onclick="closePopup();">
<fontsize=5>다시 보지 않기 </font>
</body>
</html>


