<div class="formPanel medium">
<?php
if( $error != ""){
    echo "<div class='mess_errors'>";
    echo "<ul>";
    echo "<li>$error</li>";
    echo "</ul>";
    echo "</div>";
}
?>
<fieldset>
<legend>Admin Control Panel</legend>
<form action="<?php echo base_url()."admin/verify/login"; ?>" method="post">
    <label>Username :</label><input type="text" size="25" name="txtuser" /><br />
    <label>Password :</label><input type="password" size="25" name="txtpass" /><br />
    <label>&nbsp;</label><input type="submit" name="ok" value="Login" class="button"/>
</form>
</fieldset>
</div>