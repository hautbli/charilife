<?php
while($post = $result->fetch_assoc()){//처음 화면
    ?>
    <div class="post-id" id="<?php echo $post['idx']; ?>">
        <h3><a href=""><?php echo $post['title']; ?></a></h3>
        <p><?php echo $post['contents']; ?></p>
        <div class="text-right">
            <button class="btn btn-success">Read More</button>
        </div>
        <hr style="margin-top:5px;">
    </div>
    <?php
}
?>