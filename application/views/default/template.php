<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title; ?></title>
    <script type="text/javascript">
    var baseUrl = "<?php echo base_url();?>";
    </script>
    <link href="<?php echo base_url() ;?>public/<?php echo $module; ?>/css/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="<?php echo base_url() ;?>public/<?php echo $module; ?>/js/jquery-1.8.0.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ;?>public/<?php echo $module; ?>/js/easyAccordion.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ;?>public/<?php echo $module; ?>/js/utility.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ;?>public/<?php echo $module; ?>/js/main_nav.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ;?>public/<?php echo $module; ?>/js/tabs_nav.js"></script>
	
</head>
<body>
<div id="page-wrap">
<?php
    $this->load->view("$module/top");
?>
<?php
    $this->load->view("$module/menu");
 ?>
	<div id="page-info">
            <div id="featured">
                <div id="accordion">
                    <dl class="easy-accordion">
                        <dt>First slide</dt>
                            <dd>
                                <h3><a href="#">This is the first slide</a></h3>
                                <p><img src="<?php echo base_url() ;?>public/<?php echo $module; ?>/images/post-images/img1.png" alt="Alt text to go here" />Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, enim.<br /><a href="#" class="more">Read more</a></p>
                            </dd>
                        <dt>Second slide</dt>
                            <dd>
                                <h3><a href="#">Here is the second slide</a></h3>
                                <p><img src="<?php echo base_url() ;?>public/<?php echo $module; ?>/images/post-images/img2.png" alt="Alt text to go here" />Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, enim.<br /><a href="#" class="more">Read more</a></p>
                            </dd>
                        <dt>One more slide</dt>
                            <dd>
                                <h3><a href="#">One more slide to go here</a></h3>
                                <p><img src="<?php echo base_url() ;?>public/<?php echo $module; ?>/images/post-images/img3.png" alt="Alt text to go here" />Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, enim.<br /><a href="#" class="more">Read more</a></p>
                            </dd>
                        <dt class="active">Another slide</dt>
                            <dd>
                                <h3><a href="#">Another slide to go here</a></h3>
                                <p><img src="<?php echo base_url() ;?>public/<?php echo $module; ?>/images/post-images/img4.png" alt="Alt text to go here" />Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, enim.<br /><a href="#" class="more">Read more</a></p>
                            </dd>
                        <dt>Another slide</dt>
                            <dd>
                                <h3><a href="#">Another slide to go here</a></h3>
                                <p><img src="<?php echo base_url() ;?>public/<?php echo $module; ?>/images/post-images/img5.png" alt="Alt text to go here" />Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, enim.<br /><a href="#" class="more">Read more</a></p>
                            </dd>
                        <dt>Another slide</dt>
                            <dd>
                                <h3><a href="#">Another slide to go here</a></h3>
                                <p><img src="<?php echo base_url() ;?>public/<?php echo $module; ?>/images/post-images/img6.png" alt="Alt text to go here" />Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, enim.<br /><a href="#" class="more">Read more</a></p>
                            </dd>
                    </dl>
                </div><!--end accordion-->
            </div><!--end featrued-->
            <div id="facebook">
                <div id="fb-root"></div>
                    <script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.0";
                      fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
                <div class="fb-facepile" data-href="https://www.facebook.com/FacebookDevelopers" data-width="225" data-height="260" data-max-rows="6" data-colorscheme="light" data-size="medium" data-show-count="true"></div>  
            </div>       
        </div><!--end page-info-->
        <div id="content-wrap">
        	<?php
            $this->load->view("$module/left");
            ?>
            <div id="main-content">
			<h2><a href="#">Tin Mới Nhất</a></h2>
                <?php
                $this->load->view($loadPage);
                ?>
            </div><!--end main-content-->
        </div><!--End content-wrap-->
<?php
    $this->load->view("$module/bottom");
    ?>
</div><!--End Wrapper-->
</body>
</html>