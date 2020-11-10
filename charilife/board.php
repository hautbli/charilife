<!DOCTYPE html>
<html lang="ko">
<head>
    <title></title>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyCyE_ryzvEBoAS9pskMMDky_nR5kOXKaNY" ></script>
    <style>
        #map_ma {width:100%; height:400px; clear:both; border:solid 1px #f45c2e;}
    </style>
</head>
<body>
<div id="map_ma"></div>
<script type="text/javascript">
    $(document).ready(function() {
        var myLatlng = new google.maps.LatLng(35.837143,128.558612); // 위치값 위도 경도
        var Y_point			= 37.555880;		// Y 좌표
        var X_point			= 126.969621;		// X 좌표
        var zoomLevel		= 18;				// 지도의 확대 레벨 : 숫자가 클수록 확대정도가 큼
        var markerTitle		= "서울역";		// 현재 위치 마커에 마우스를 오버을때 나타나는 정보
        var markerMaxWidth	= 300;				// 마커를 클릭했을때 나타나는 말풍선의 최대 크기

// 말풍선 내용
        var contentString	= '<div>' +
            '<h2></h2>'+
            '<p>안녕하세요. Charilife입니다.</p>' +

            '</div>';
        var myLatlng = new google.maps.LatLng(Y_point, X_point);
        var mapOptions = {
            zoom: zoomLevel,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(document.getElementById('map_ma'), mapOptions);
        var marker = new google.maps.Marker({
            position: myLatlng,
            map: map,
            title: markerTitle
        });
        var infowindow = new google.maps.InfoWindow(
            {
                content: contentString,
                maxWizzzdth: markerMaxWidth
            }
        );
        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map, marker);
        });
    });
</script>
</body>
</html>


