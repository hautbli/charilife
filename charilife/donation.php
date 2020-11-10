<script src="https://code.jquery.com/jquery-3.2.1.min.js" xmlns:id="http://www.w3.org/1999/xhtml"
        xmlns:id="http://www.w3.org/1999/xhtml" xmlns:id="http://www.w3.org/1999/xhtml"></script>
<link rel="stylesheet" href="style.css">

<section class="banner-area relative">
    <div class="overlay overlay-bg"></div>
    <div class="container">
        <div class="row justify-content-lg-end align-items-center banner-content">
            <div class="col-lg-5">
                <h1 class="text-white">후원하기</h1>
                <p>후원은 아이들의 미래를 변화시키는 소중한 나눔의 시작입니다.</p>
            </div>
        </div>
    </div>
</section>
<body>
<div class="container" id="board_area">
    <table class="list-table">
        <br>
        <br>

        <div class="checks" style="font-size: 24px">
            <input type="checkbox" id="water_bs" class="total_dn">
            <label for="ex_chk"><b>식수위생지원사업</b></label>
        </div>
        <br/>

        <div class="checks" style="font-size: 24px">
            <input type="checkbox" id="school_bs" class="total_dn">
            <label for="ex_chk"><b>희망학교지원사업</b></label>

        </div>
        <br/>
        <div class="checks" style="font-size: 24px">
            <input type="checkbox" id="education_bs" class="total_dn">
            <label for="ex_chk"><b>해외교육지원사업</b></label>

        </div>
        <br/>

        <p style="display:none" id="water_bs_p" class="total_dn">식수위생지원사업 :

            <input type="radio" name="radioTxt" value="10000" checked>10,000원
            <input type="radio" name="radioTxt" value="30000">30,000원
            <input type="radio" name="radioTxt" value="50000">50,000원
            <input type="radio" name="radioTxt" value="100000">100,000원
            <input type="radio" name="radioTxt" value="0">직접입력
            <input type="text" name="radioTxt_self" id="comma" value="" disabled onkeyup="check_number(this)">원

        </p>

        <p style="display:none" id="school_bs_p" class="total_dn">희망학교지원사업 :
            <input type="radio" name="radioTxt1" value="10000" checked>10,000원
            <input type="radio" name="radioTxt1" value="30000">30,000원
            <input type="radio" name="radioTxt1" value="50000">50,000원
            <input type="radio" name="radioTxt1" value="100000">100,000원
            <input type="radio" name="radioTxt1" value="0">직접입력
            <input type="text" name="radioTxt_self1" id="comma1" value="" disabled onkeyup="check_number(this)">원
        </p>

        <p style="display:none" id="education_bs_p" class="total_dn">해외교육지원사업 :
            <input type="radio" name="radioTxt2" value="10000" checked>10,000원
            <input type="radio" name="radioTxt2" value="30000">30,000원
            <input type="radio" name="radioTxt2" value="50000">50,000원
            <input type="radio" name="radioTxt2" value="100000">100,000원
            <input type="radio" name="radioTxt2" value="0">직접입력
            <input type="text" name="radioTxt_self2" id="comma2" value="" disabled onkeyup="check_number(this)">원

        </p>
        <div style="font-size: 24px">
            <em id="total"></em>원
            <button type="button" name="button" id="radioButton">후원하기</button>
        </div>

    </table>
</div>

</body>

<?php
//    val name = (String)request.getAttribute("name");
//    String email = (String)request.getAttribute("email");
//    String phone = (String)request.getAttribute("phone");
//    String address = (String)request.getAttribute("address");
//    int totalPrice = (int)request.getAttribute("totalPrice");
?>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script type="text/javascript" src="https://cdn.iamport.kr/js/iamport.payment-1.1.5.js"></script>

<script>

    //체크박스 클릭하면 라디오 나옴 안나옴!!!~~!`
    jQuery('#water_bs').click(function () {
        if ($("#water_bs_p").css("display") == "none") {
            jQuery('#water_bs_p').css("display", "block");
        } else {
            jQuery('#water_bs_p').css("display", "none");
        }
    });
    jQuery('#school_bs').click(function () {
        if ($("#school_bs_p").css("display") == "none") {
            jQuery('#school_bs_p').css("display", "block");
        } else {
            jQuery('#school_bs_p').css("display", "none");
        }
    });
    jQuery('#education_bs').click(function () {
        if ($("#education_bs_p").css("display") == "none") {
            jQuery('#education_bs_p').css("display", "block");
        } else {
            jQuery('#education_bs_p').css("display", "none");
        }
    });


    $(document).ready(function () {

        // 라디오버튼 누르면 텍스트칸 비활성화
        $("input:radio[name=radioTxt]").click(function () {

            if ($("input[name=radioTxt]:checked").val() === "0") {
                $("input:text[name=radioTxt_self]").attr("disabled", false);
            } else {// radio 버튼의 value 값이 ""이라면 활성화, 빈칸 만들어주기 !
                $("input:text[name=radioTxt_self]").attr("disabled", true);
                $('#comma').val("");
            }
        });
        $("input:radio[name=radioTxt1]").click(function () {

            if ($("input[name=radioTxt1]:checked").val() === "0") {
                $("input:text[name=radioTxt_self1]").attr("disabled", false);


            } else {// radio 버튼의 value 값이 ""이라면 활성화, 빈칸 만들어주기 !
                $("input:text[name=radioTxt_self1]").attr("disabled", true);
                $('#comma1').val("");

            }
        });
        $("input:radio[name=radioTxt2]").click(function () {

            if ($("input[name=radioTxt2]:checked").val() === "0") {
                $("input:text[name=radioTxt_self2]").attr("disabled", false);


            } else {// radio 버튼의 value 값이 ""이라면 활성화, 빈칸 만들어주기 !
                $("input:text[name=radioTxt_self2]").attr("disabled", true);
                $('#comma2').val("");

            }
        });
    });

    let radioVal, radioVal1, radioVal2;
    let total;

    function sum_total() {


        if ($("#water_bs_p").css("display") == "block") {
            if ($("input:text[name=radioTxt_self]").val() != "") {
                radioVal = parseInt($("input:text[name=radioTxt_self]").val());
            } else {
                radioVal = parseInt($('input[name="radioTxt"]:checked').val());
            }
        } else {
            radioVal = 0;
        }

        if ($("#school_bs_p").css("display") == "block") {
            //학교사업
            if ($("input:text[name=radioTxt_self1]").val() != "") {
                radioVal1 = parseInt($("input:text[name=radioTxt_self1]").val());
            } else {
                radioVal1 = parseInt($('input[name="radioTxt1"]:checked').val());
            }

        } else {
            radioVal1 = 0;
        }

        if ($("#education_bs_p").css("display") == "block") {
            //교육사업
            if ($("input:text[name=radioTxt_self2]").val() != "") {
                radioVal2 = parseInt($("input:text[name=radioTxt_self2]").val());
            } else {
                radioVal2 = parseInt($('input[name="radioTxt2"]:checked').val());
            }
        } else {
            radioVal2 = 0;
        }

        total = radioVal + radioVal1 + radioVal2;

        $('#total').html(numberFormat(total));

    }

    function numberFormat(inputNumber) {
        return inputNumber.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    //라디오랑 체크박스 태그를 total_dn이라는 클래스로 묶어서 클릭이벤트로 함수를 연결한당.... !!!! 별표...
    $('.total_dn').click(sum_total);

    //정규식 체크 !!!
    function check_number(t) {

        var x = t.value;
        x = x.replace(/,/gi, '');

        // 숫자 정규식 확인
        var regexp = /^[0-9]*$/;
        if (!regexp.test(x)) {
            $(t).val("");
            alert("숫자만 입력 가능합니다.");
        } else {
            //3자리 콤마
            // x = x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            $(t).val(x);
        }
        sum_total();
    }

    $("#radioButton").click(function () {


        var IMP = window.IMP; // 생략가능
        IMP.init('imp34009562'); // "가맹점 식별코드"를 사용
        var msg;


        //null 아니고 "" 이다!! 텍스트칸이 널이면 라디오버튼 값으로 계산 아님 텍스트 값으로 변수 설정해서 계산!!

        //식수
        if ($("#water_bs_p").css("display") == "block") {
            if (radioVal < 10000) {
                alert("후원금액은 10,000원 이상입니다");
                return;
            }
        }
        //학교사
        if ($("#school_bs_p").css("display") == "block") {
            if (radioVal1 < 10000) {
                alert("후원금액은 10,000원 이상입니다");
                return;
            }
        }
        //교육사업
        if ($("#education_bs_p").css("display") == "block") {
            if (radioVal2 < 10000) {
                alert("후원금액은 10,000원 이상입니다");
                return;
            }
        }
        IMP.request_pay({
                pg: 'kakaopay',
                pay_method: 'card',
                merchant_uid: 'merchant_' + new Date().getTime(),
                name: 'charilife 후원금 결제',
                amount: total,
                buyer_email: '<%@=email%>',
                buyer_name: '<%=name%>',
                buyer_tel: '<%=phone%>',
                buyer_addr: '<%=address%>',
                buyer_postcode: '123-456'
                //m_redirect_url : 'http://www.naver.com'
            },
            function (rsp) {
                if (rsp.success) {


                    //[1] 서버단에서 결제정보 조회를 위해 jQuery ajax로 imp_uid 전달하기
                    jQuery.ajax({
                        url: "complete.php", //cross-domain error가 발생하지 않도록 주의해주세요
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            imp_uid: rsp.imp_uid
                            //기타 필요한 데이터가 있으면 추가 전달
                        }
                    }).done(function (data) {
                        //[2] 서버에서 REST API로 결제정보확인 및 서비스루틴이 정상적인 경우
                        if (everythings_fine) {
                            msg = '결제가 완료되었습니다.';
                            msg += '\n고유ID : ' + rsp.imp_uid;
                            msg += '\n상점 거래ID : ' + rsp.merchant_uid;
                            msg += '결제 금액 : ' + rsp.paid_amount;
                            msg += '카드 승인번호 : ' + rsp.apply_num;

                            alert(msg);
                        } else {
                            //[3] 아직 제대로 결제가 되지 않았습니다.
                            //[4] 결제된 금액이 요청한 금액과 달라 결제를 자동취소처리하였습니다.
                        }
                    });
                    //성공시 이동할 페이지
                    // alert("후원금이 기부 완료됐습니다.");
                    // alert(radioVal);

                    $.ajax({
                        type: 'POST',
                        url: 'donation_total_insert.php',
                        data: {
                            radioVal: radioVal,
                            radioVal1: radioVal1,
                            radioVal2: radioVal2
                        },
                        success: function (result) {
                            if (result === "success") {
                                if (confirm('후원금이 기부 완료됐습니다. 후원내역을 확인하시겠습니까?') === true) {
                                    location.replace('index.php?page=12')
                                } else {
                                    location.replace('index.php?page=3')
                                }
                            } else {
                                alert(result);
                            }
                        },
                        error: function (xtr, status, error) {
                            alert(xtr + ":" + status + ":" + error);
                        }
                    });

                    location.href = '<%=request.getContextPath()%>/order/paySuccess?msg=' + msg;
                    location.href = "index.php?page=3";


                } else {
                    msg = '결제에 실패하였습니다.';
                    msg += '에러내용 : ' + rsp.error_msg;
                    //실패시 이동할 페이지
                    // location.href = "<%=request.getContextPath()%>/order/payFail";
                    location.href = "index.php?page=3";
                    alert(msg);
                }
            });

    });

    // $("#donate_btn").click(function javascript_onclikc(){
    //
    //     var IMP = window.IMP; // 생략가능
    //     IMP.init('imp34009562');  // 가맹점 식별 코드
    //
    //     IMP.request_pay({
    //         pg : 'html5_inicis', // 결제방식
    //         pay_method : 'card',	// 결제 수단
    //         merchant_uid : 'merchant_' + new Date().getTime(),
    //         name : '주문명: 결제 테스트',	// order 테이블에 들어갈 주문명 혹은 주문 번호
    //         amount : '100',	// 결제 금액
    //         buyer_email : '',	// 구매자 email
    //         buyer_name :  '',	// 구매자 이름
    //         buyer_tel :  '',	// 구매자 전화번호
    //         buyer_addr :  '',	// 구매자 주소
    //         buyer_postcode :  '',	// 구매자 우편번호
    //         // m_redirect_url : '/khx/payEnd.action'	// 결제 완료 후 보낼 컨트롤러의 메소드명
    //     }, function(rsp) {
    //         if ( rsp.success ) { // 성공시
    //             var msg = '결제가 완료되었습니다.';
    //             msg += '고유ID : ' + rsp.imp_uid;
    //             msg += '상점 거래ID : ' + rsp.merchant_uid;
    //             msg += '결제 금액 : ' + rsp.paid_amount;
    //             msg += '카드 승인번호 : ' + rsp.apply_num;
    //             alert("성공!")
    //
    //         } else { // 실패시
    //             var msg = '결제에 실패하였습니다.';
    //             alert("실패!");
    //             msg += '에러내용 : ' + rsp.error_msg;
    //         }
    //     });
    // });


</script>