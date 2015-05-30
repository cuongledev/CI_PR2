           <div class="formPanel big">
            <?php
            //echo validation_errors("<li>","</li>");
            if(isset($error)){
                echo "<div class='mess_errors'>";
                echo "<ul>";
                echo "<li>$error</li>";
                echo "</ul>";
                echo "</div>";
            }
            ?>
            <div id="mess_form"></div>
            <fieldset>
                <legend>Edit A News</legend>
                <form action="<?php echo base_url()."admin/news/edit/".$info['news_id']; ?>" method="post" enctype="multipart/form-data">
                    <label>Categorie :</label><select id="cate" name="cate">
                    <option value="0">Root</option>
                    <?php
                    callMenu($menu,0,"--",$info['cate_id']);
                    ?>
                    </select><br />
                    <label>News Title :</label><input type="text" id="txttitle" name="txttitle" size="40" value="<?php echo $info['news_title'];?>" /><br />
                    <label>News Author :</label><input type="text" id="txtau" name="txtau" size="40" value="<?php echo $info['news_author'];?>" /><br />
                    <label>News Info :</label><textarea name="txtinfo" cols="45" rows="4" ><?php echo $info['news_info'];?></textarea><br />
                    <label>News Detail :</label><textarea name="txtdetail" cols="45" rows="15"><?php echo $info['news_full'];?></textarea><br />
                    <script type="text/javascript">
                        CKEDITOR.replace( 'txtdetail', {
                            language: 'fr',
                            uiColor: '#9AB8F3'
                        });
                    </script>
                    <label>Images :</label><input type="file" name="img" size="40" /><br />
                    <?php
                    if($info['news_img'] !=""){
                        echo "<label>Your Image :<img src='".base_url()."/uploads/news_main/$info[news_img]' width='150'/></label><br/>";
                    }
                    ?>
                    <label>&nbsp;</label><input type="submit" id="ok" name="ok" value="Submit" class="button" />
                </form>
            </fieldset>
            </div>