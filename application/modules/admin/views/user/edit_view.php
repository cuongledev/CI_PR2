<div class="formPanel medium">
<?php
echo validation_errors("<li>","</li>");
$user = array(
    "name" => "username",
    "size" => "35",
    "value" => $info['username'],
);
$pass = array(
    "name" => "password",
    "size" => "35",
);
$pass2 = array(
    "name" => "password2",
    "size" => "35",
);
$level = array(
    "1" => "Administrator",
    "2" => "Member",
);
$email = array(
    "name" => "email",
    "size" => "35",
    "value" => $info['email'],
);
$submit = array(
    "name" => "ok",
    "value" => "submit",
    "class" =>"button",
);


echo form_fieldset();
echo form_open(base_url()."admin/user/edit/$info[id]");
echo form_label("Level").form_dropdown("level",$level,$info['level'])."<br />";
echo form_label("Tên đăng nhập : ").form_input($user)."<br />";
echo form_label("Mật khẩu :").form_password($pass)."<br />";
echo form_label("Re-mật khẩu :").form_password($pass2)."<br />";
echo form_label("Email :").form_input($email)."<br />";
echo form_label("&nbsp").form_submit($submit)."<br />";
echo form_close();
echo form_fieldset_close();
?>
</div>








