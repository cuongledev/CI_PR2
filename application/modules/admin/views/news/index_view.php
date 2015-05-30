<div align="center">
<?php
if(isset($mess) && $mess !=""){
    echo "<div class='mess_succ'>";
    echo "<ul>";
    echo "<li>$mess</li>";
    echo "</ul>";
    echo "</div>";
}
?>
<table align="center" width="700">
    	<tr>
        	<td colspan="6"><strong><a href="<?php echo base_url()."$module";?>/news/add"><font color="#99CC33">Add A News</font></a></strong></td>
        </tr>
    	<tr>
        	<td class="title">STT</td>
            <td class="title">News Title</td>
            <td class="title">Username</td>
            <td class="title">Categorie</td>
            <td class="title">Edit</td>
            <td class="title">Del</td>
        </tr>
        <?php
        $i = 0;
        foreach($info as $item){
            $i++;
            echo "<tr>";
            echo "<td>$i</td>";
            echo "<td>$item[news_title]</td>";
            echo "<td>$item[username]</td>";
            echo "<td>$item[cate_title]</td>";
            echo "<td><a href='".base_url()."$module/news/edit/$item[news_id]'>Edit</a></td>";
            echo "<td><a href='".base_url()."$module/news/del/$item[news_id]' onclick='return confirm_delete(\"Do you want to delete for News ? \")'>Del</a></td>";
            echo "</tr>";
            
            
        }
        ?>
                
</table>
<br />
<?php echo $page_link; ?>
<br />
<br />
</div>