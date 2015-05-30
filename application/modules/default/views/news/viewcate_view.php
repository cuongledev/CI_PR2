<?php
if($info != false){
    foreach($info as $item){
        $urltitle = unicode($item['news_title']);
        echo "<div class='post'>";
        if($item['news_img'] !=""){
             echo "<a href='".base_url()."news/detail/$item[news_id]-$urltitle.html'><img src='".base_url()."uploads/news_main/$item[news_img]' alt='post image' class='anh-post'/></a>";
        }
             echo "<h3><a href='".base_url()."news/detail/$item[news_id]-$urltitle.html'>$item[news_title]</a></h3>";
             echo "<p class='data-info'>".$item['news_info']."</p>";
             echo "<p class='meta-data'>By: $item[news_author] | On: August 20, 2014</p>";
             echo "<a class='comment-link' href=''>6</a>";
             echo "<a class='more-link' href='".base_url()."news/detail/$item[news_id]-$urltitle.html'>Continue reading ...</a>";
        echo "</div>";
    }
}else{
    echo "<div class='post-detail'>";
    echo "<h3><a>Chưa có tin tức ở chuyên mục này !</a></h3>";
    echo "</div>";
}
?>