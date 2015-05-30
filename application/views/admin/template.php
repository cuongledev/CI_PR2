<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" /> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo base_url() ;?>public/<?php echo $module; ?>/css/style2.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
    var baseUrl = "<?php echo base_url();?>";
</script>
<script type="text/javascript" src="<?php echo base_url() ;?>public/<?php echo $module; ?>/js/java.js"></script>
<script type="text/javascript" src="<?php echo base_url() ;?>public/<?php echo $module; ?>/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ;?>public/<?php echo $module; ?>/js/jquery_custom.js"></script>
<script type="text/javascript" src="<?php echo base_url() ;?>public/<?php echo $module; ?>/js/ckeditor/ckeditor.js"></script>
<title><?php echo $title; ?></title>
</head>

<body>
	<?php
    $this->load->view("$module/top");
    ?>
    <?php
    if($this->session->userdata("username")){
        $this->load->view("$module/menu");
    }
    ?>
    <div id="main">
    	
        <div id="info">
            <?php
            $this->load->view($loadPage);
            ?>
        </div>
    </div>
    <?php
    $this->load->view("$module/bottom");
    ?>
</body>
</html>
