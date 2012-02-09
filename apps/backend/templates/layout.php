<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/images/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
  	<div id="header">
  		<div id="header-left">
  			<img src="/images/logo.png" alt="logotip empresa Flux"/>
  		</div>
  		<div id="header-right">
  			Backend
  		</div>
  	</div>
  	<div id="main">
  		<div id="main-left">
  			<?php if ($sf_user->isAuthenticated()) include_component('menu', 'showMenu'); ?>
  		</div>
  		<div id="main-right">
  			<?php echo $sf_content ?>
  		</div>
  	</div>
    <!-- 
    <div id="footer">
			<div id="footer-left">
				FL
			</div>
			<div id="footer-center">
				FC
			</div>
			<div id="footer-right">
				FR
			</div>		
		</div>
		--> 
  </body>
</html>
