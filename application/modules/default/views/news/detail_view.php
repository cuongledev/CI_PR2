<div class='post-detail'>
<?php
    echo "<h3><a>$info[news_title]</a></h3>";
     echo "<p class='data-info'>".$info['news_full']."</p>";
     echo "<div class='meta-data1'><p class='comment-link1'>6</p><a class='binhluan'>Bình luận</a> <span class='meta-data2'>By: $info[news_author] | On: August 20, 2014</span></div> ";
     if($order != false){
        echo "<h4>Những tin khác cùng chuyên mục :</h4>";
        echo "<ul>";
        foreach($order as $item){
            $urltitle = unicode($item['news_title']);
            echo "<li><a href='".base_url()."news/detail/$item[news_id]-$urltitle.html'>$item[news_title]</a></li>";
        }
        echo "</ul>";
     }
?>
</div>