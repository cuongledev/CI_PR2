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