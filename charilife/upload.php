<?php
$allowed_ext = array('jpg','jpeg','png','gif');

$name = $_FILES['image']['name'];
$error = $_FILES['image']['error'];
$ext = explode('.', $name);
$ext =array_pop($ext);


if(!in_array($ext, $allowed_ext)) {
    echo "허용되지 않는 확장자입니다.";
    exit;
}

if( $error != UPLOAD_ERR_OK ) {
    switch( $error ) {
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            echo "파일이 너무 큽니다. ($error)";
            break;
        case UPLOAD_ERR_NO_FILE:
            echo "파일이 첨부되지 않았습니다. ($error)";
            break;
        default:
            echo "파일이 제대로 업로드되지 않았습니다. ($error)";
    }
    exit;
}

$isExtGood = true;

    // 허용할 확장자를 jpg, bmp, gif, png로 정함 그외는 업로드 불가
    if ($isExtGood) {
        // 임시 파일 옮길 저장 및 파일명
        $target_dir = "./board_image/";
        $myFile = $target_dir . basename($_FILES['image']['tmp_name']);
        // 임시 저장된 파일을 우리가 저장할 장소 및 파일명으로 옮김
        $imageUpload = move_uploaded_file($_FILES['image']['tmp_name'], $myFile);

        //업로드 성공 여부 확인
        if ($imageUpload == true) {
            echo $myFile;
//            "<img src='{}' width='300'/>";
        } else {
            echo '파일 업로드에 실패했습니다. ';
        }
    } //확장자가 jpg, bmp, gif, png가 아닐때
    else {
        echo "허용하는 확장자는 jpg, bmp, gif, png 입니다. - else";
        exit;
    }


//if(move_uploaded_file($_FILES['image']['tmp_name'], 'board_image/'.$name)){
//    echo 'board_image/'.$name;
//    $src='board_image/'.$name;
//    echo "<img src=$src width='300'/>";
//} else {
//    echo "이미지 업로드를 실패하였습니다.";
//}
?>