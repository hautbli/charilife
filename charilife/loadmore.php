<?php
//include "dbConnect.php";
//
//$idx = (int)$_POST['idx'];
//$sql = "SELECT * FROM board
//         WHERE idx < {$idx} ORDER BY idx DESC LIMIT 8";
//$result = $dbConnect->query($sql);
//
//if (!$result) {
//    echo mysqli_errno($dbConnect);
//    exit();
//}
//
//while ($post = $result->fetch_assoc()) {
//    echo '<div class="post-id" id=' . $post['idx'] . '>
//        <h3><a href="">' . $post['title'] . '</a></h3>
//        <p>' . $post['contents'] . '</p>
//        <div class="text-right">
//            <button class="btn btn-success">Read More</button>
//        </div>
//        <hr style="margin-top:5px;">
//    </div>';
//} ?>
<?php
include_once 'Snoopy.class.php';
$snoopy = new snoopy;

$i =$_POST[i];

$snoopy->fetch('https://search.daum.net/search?w=news&DA=PGD&enc=utf8&cluster=y&cluster_page=1&q=%EA%B8%B0%EB%B6%80&p='.$i);
preg_match('/<ul id="clusterResultUL" class="list_info mg_cont clear">(.*?)<\/ul>/is', $snoopy->results, $text);
//echo $text[0];
preg_match_all('/<li>(.*?)<\/li>/is', $text[0], $text1);

$idx = (int)$_POST['idx'];
// DB에 저장된 글목록을 idx의 내림차순으로 가져와 페이지에 집어넣기
//sql에서 dele
foreach ($text1[0] as $key => $value) {
    preg_match('/<img(.*?)>/is', $value, $image);
    //    var_dump($image);
    //li image = array() {이미지,이미지주소?}, ..외 8개> li가 9개니
    preg_match('/<div class="wrap_tit mg_tit">(.*?)<\/div>/is', $value, $title);
//            preg_match('/target="_blank">(.*?)<\/a>/is', $title, $title_fn);

    preg_match('/<span class="f_nb date">(.*?)<\/a>/is', $value, $date);
    preg_match('/<p class="f_eb desc">(.*?)<\/p>/is', $value, $contents);
    preg_match('/href="(.*?)"/is', $title[0], $href);
//            echo $href[0];
//            var_dump($href[0]);
    $link = str_replace('"', "'", $href[0]);
//            echo $link;
    $ti = str_replace('<b>','',$title[0]);
    $ti = str_replace('</b>','',$ti);
    $con = str_replace('<b>','',$contents[0]);
    $con = str_replace('</b>','',$con);



    echo '<tbody>

<!--tr태그 안에 쌍따옴표 안에는 꼭 작은따옴표로 넣어야 됨!! -->
            <tr onClick="location.' . $link . '" style="cursor:pointer" id="news_box">
                <td>' . $image[0] . '</td>
                <!--제목 클릭시 게시글 읽기-->
                <td style="width: 400px"><b>' . $ti . '</b>
                    ' . $date[0] . '</td>
                <td>' . $con . '</td>
            </tr>
   
            </tbody>';
}

?>
