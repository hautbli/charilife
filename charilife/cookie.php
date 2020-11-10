<!DOCTYPE html>
<html>
<head>
    <meta charset="EUC-KR">
    <title>Insert title here</title>
    <script type="text/javascript">

        function getCookie(name) {
            var cookie = document.cookie;
            if (document.cookie != "") {
                //문자열을 배열로 만들어줌 split
                var cookie_array = cookie.split("; ");
                for (var index in cookie_array) {
                    var cookie_name = cookie_array[index].split("=");
                    if (cookie_name[0] == name) {
                        return cookie_name[1];
                    }
                }
            }
            return;
        }
        function openPopup(url) {
            var cookieCheck = getCookie("popupYN");

            if (cookieCheck != "N") window.open(url, '', 'width=450,height=200,left=300,top=300')
        }

    </script>
</head>
<body onload="javascript:openPopup('popup.php')"></body>
</html>

