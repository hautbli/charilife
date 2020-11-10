$(document).ready(function () {
    $("#rep_bt").click(function () {//댓글 입력 js
        $.ajax({
            url: "reply_ok.php",
            method: 'POST',
            data: {
                bno: $(".bno").val(),
                dat_user: $(".dat_user").html(),
                content: $(".reply_content").val()
            },
            success: function (data) {
                if (data === 'success') {
                    alert("댓글이 작성되었습니다");
                    location.reload();
                } else {
                    alert(data);
                    // location.reload();
                }
            }
        });
    });
    let obj;

    $(".dat_edit_bt").off().on('click', function () {//댓글 수정하는 모달 창 js
        /* dat_edit_bt클래스 클릭시 동작(댓글 수정) */
        obj = $(this).parent().siblings(".dat_edit");

        // alert(obj.html());

        $(this).parent().siblings(".dat_edit").dialog({
            // 다이얼로그 생성 후 취소하면 선택 태그가 변환돼서 (원래있던거 없어짐)
            //다시 객체가 안왔는데 다이얼로그 디스트로이해서 해결..
            // 원래는 autoopen이 false여서 버튼 클릭하면 open > close로 해야하는데
            //내건 계속 재생성이라 디스트로이 해야함 >> 케이스가 다름쓰~
            modal: true,
            width: 650,
            height: 200,
            title: "댓글 수정하기",
            open: function () {
                $('.ui-widget-overlay').off().on('click', function () {
                    obj.dialog('destroy');
                    //아무데나 눌렀을 때

                });
                $('.ui-dialog-titlebar-close').off().on('click', function () {
                    obj.dialog('destroy');

                    //종료버튼 눌렀을 떄
                });
            }
        });

    });

    $(".dat_delete_bt").click(function () {//댓글 삭제 버튼 js
        let rno = $(this).siblings('.rno').val();
        if (confirm('댓글을 삭제하시겠습니까?')===true)
        { $.ajax({
            url: "reply_delete.php",
            method: 'POST',
            data: {
                rno: rno,
                // delete_rp: delete_rp
            },
            success: function (data) {
                if (data === 'success') {
                    alert("댓글이 삭제되었습니다");
                    location.reload();
                } else {
                    alert(data);
                }
            }
        });}else{
            return false;
        }
    });
    $(".re_mo_bt").click(function () {//댓글 수정하기 !!  데이터 보내기
        let content = $(this).siblings('.dap_edit_t').val();
        let rno = $(this).siblings('.rno').val();

        $.ajax({
            url: "reply_modify_ok.php",
            method: 'POST',
            data: {
                rno: rno,
                content: content
            },
            success: function (data) {
                if (data === 'success') {
                    alert("댓글이 수정되었습니다");
                    location.reload();
                } else {
                    alert(data);
                }
            }
        });
    });

});