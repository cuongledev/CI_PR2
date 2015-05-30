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
<div id="recordData">
<table align="center" width=500">
    	<tr>
        	<td class="title">STT</td>
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
            echo "<td>$item[cate_title]</td>";
            echo "<td><a href='".base_url()."$module/categorie/edit/$item[cate_id]'>Edit</a></td>";
            echo "<td><a href='".base_url()."$module/categorie/del/$item[cate_id]' onclick='return confirm_delete(\"Do you want to delete for Categorie ? \")'>Del</a></td>";
            echo "</tr>"; 
        }
        ?>
        </table>
</div>
        <table align="center" width="500">
        <tr>
        	<td colspan="4"><strong><a href="javascript:void(0,0)" class="addcate"><font color="#99CC33">Add A Categorie</font></a></strong></td>
        </tr>        
</table>
</div>
        <div id="formaction">
            <div class="formPanel small">
            <div id="mess_form"></div>
            <fieldset>
                <legend>Add A Categorie</legend>
                <form action="" method="post">
                    <label>Categorie :</label><select id="cate" name="cate">
                    <option value="0">Root</option>
                    <?php
                    callMenu($info);
                    ?>
                    </select><br />
                    <label>Categorie name :</label><input type="text" id="txtcate" /><br />
                    <label>&nbsp;</label><input type="submit" id="ok" value="Submit" class="button" />
                </form>
            </fieldset>
            </div>
        </div>




