<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Đăng nhập</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/Bootstrap/css/bootstrap.min.css">
	<link rel="icon" href="<?= base_url(); ?>vendor/image/logo.ico">
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Js/jquery-3.3.1.min.js"></script>
	
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Js_ui/jquery-ui.js"></script>
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/Js_ui/jquery-ui.theme.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/Js_ui/jquery-ui.css">
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Js/print.min.js"></script>

	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/FontAwesome/css/font-awesome.css">
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Raleway'>
	<link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
	<link href="https://fonts.googleapis.com/css?family=Roboto+Mono:100,100i,300,300i,400,400i,500,500i,700,700i&amp;subset=vietnamese" rel="stylesheet">
	<!-- font-family: 'Roboto Mono', monospace; -->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/Css/login.css">
	
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Js/login.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Js/login_ajax.js"></script>
</head>
<body>
	
	<div class="login-page">

	  <div class="form">
	    <form class="login-form">
	    	<div class="text-center">LOGIN</div>
	      <input type="text" placeholder="username" class="username" />
	      <div class="error1" hidden="true">Vui lòng điền vào trường này !!!</div>
	      <input type="password" placeholder="password" class="password" />
	      <div class="error2" hidden="true">Vui lòng điền vào trường này !!!</div>
	      <div class="error3" hidden="true">Sai tài khoản hoặc mật khấu !!!</div>
	      <button class="submit">login</button>
	    </form>
	  </div>
</div>
</body>
</html>