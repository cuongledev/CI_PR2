<div id="first-sidebar">
    <div class="widget">
        <h2>Văn Hóa</h2>
        <ul id="menu-categories-menu"> 
        <?php
        foreach($side_bar as $item){
            echo "<li><a href='".base_url()."default/news/viewcate/$item[cate_id]'>$item[cate_title]</a></li>"; 
        }
        ?>
	    </ul> 
    </div>
    <div class="widget">
        <h2>RSS Feeds</h2>
        <p class="date">August 20, 2014</p>
        <h4><a href="#">Lorem ipsum dolor sit amet</a></h4>
        <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus</p>
    </div>
</div><!--end first-sidebar-->