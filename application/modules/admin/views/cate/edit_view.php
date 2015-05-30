           <div class="formPanel small">
<?php
            echo validation_errors("<li>","</li>");
?>
            <div id="mess_form"></div>
            <fieldset>
                <legend>Edit A Categorie</legend>
                <form action="<?php echo base_url()."admin/categorie/edit/$info[cate_id]"; ?>" method="post">
                    <label>Categorie :</label><select id="cate" name="cate">
                    <option value="0">Root</option>
                    <?php
                    callMenu($menu,0,"--",$info['cate_parent']);
                    ?>
                    </select><br />
                    <label>Categorie name :</label><input type="text" id="txtcate" name="txtcate" value="<?php echo $info['cate_title'] ;?>" /><br />
                    <label>&nbsp;</label><input type="submit" id="ok" value="Submit" class="button" />
                </form>
            </fieldset>
            </div>