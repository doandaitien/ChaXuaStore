<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Trang chủ</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- load jquery -->
	<script type="text/javascript" src="<?php echo base_url(); ?>vendor/JS/jquery-3.3.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- load bootstrap  -->
	<script type="text/javascript" src="<?php echo base_url(); ?>vendor/Bootstrap/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/Bootstrap/css/bootstrap.min.css">
	<!-- cdn -->
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
	
	<!-- load font awesome -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/FontAwesome/css/font-awesome.css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;subset=vietnamese" rel="stylesheet">
	<!-- font-family: 'Nunito', sans-serif; -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
	<!-- font-family: 'Poppins', sans-serif; -->
	<link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext" rel="stylesheet">
	<!-- font-family: 'Lato', sans-serif; -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/Carousel/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/Carousel/owl.theme.default.min.css">

	<script type="text/javascript" src="<?php echo base_url(); ?>vendor/Carousel/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>vendor/Carousel/owl.carousel.min.js"></script>
	<!-- https://place-hold.it/1900x700 -->
	<!-- load file dinh kem -->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/CSS/home.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>vendor/JS/home.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>vendor/JS/home.js"></script>

	<!-- checkbox -->
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/slick-master/slick/slick.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/slick-master/slick/slick-theme.css">

	<script type="text/javascript" src="<?php echo base_url(); ?>vendor/slick-master/slick/slick.js"></script>

	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">

	<!-- jQuery Modal -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
</head>
<body>
	<!-- menu -->
	<div class="menuchinh">
		 <nav class="navbar navbar-expand-lg navbar-dark bg-menu fixed-top" style="margin:0 0 0 0;">
		 	<div class="container">
		 		<a class="navbar-brand" href="<?php echo base_url();?>Home_C"><img src="<?php echo base_url(); ?>vendor/Image/logo.png" alt="" width="80px" height="80px"></a>
				  <button class="navbar-toggler navbar-toggler-right collapsed nutclick" type="button" data-toggle="collapse" data-target="#navb" aria-expanded="false">
				    <span class="navbar-toggler-icon"></span>
				  </button>

				  <div class="navbar-collapse collapse" id="navb" style="">
				    <ul class="navbar-nav mr-auto">
				      <li class="nav-item sp">
				        <a class="nav-link ab a_menu" href="#">ABOUT</a>
				      </li>
				      <li class="nav-item sp">
				        <a class="nav-link new  a_menu" href="#">NEWS</a>
				      </li>
				      <li class="nav-item sp">
				        <a class="nav-link pro a_menu" href="#">PRODUCTS</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link cus a_menu" href="#">CUSTOMER</a>
				      </li>
				      <li class="nav-item">
				        <a class="nav-link ct a_menu" href="#">CONTACT</a>
				      </li>
				    </ul>
				  </div>
		 	</div>
		</nav>
	</div> <!-- end menuchinh -->
	<!-- slide -->
	<div class="slidemenu">
		<div id="demo" class="carousel slide" data-ride="carousel">

				 
				  <ul class="carousel-indicators">
				    <li data-target="#demo" data-slide-to="0" class="active slideactive"></li>
				    <li data-target="#demo" data-slide-to="1" class="slideactive"></li>
				    <li data-target="#demo" data-slide-to="2" class="slideactive"></li>
				  </ul>
				  
				  
				  <div class="carousel-inner">
				    <div class="carousel-item active">
				      <img src="<?php echo base_url(); ?>vendor/Image/slide1.jpg" style="width: 100%;height:auto;" class="imgslide">
				    </div>
				    <div class="carousel-item">
				      <img src="<?php echo base_url(); ?>vendor/Image/slide2.jpg" style="width: 100%;height:auto;" class="imgslide">
				    </div>
				    <div class="carousel-item">
				      <img src="<?php echo base_url(); ?>vendor/Image/slide3.jpg" style="width: 100%;height:auto;" class="imgslide">
				    </div>
				  </div>
				  
				  
				  <a class="carousel-control-prev" href="#demo" data-slide="prev">
				    <span class="carousel-control-prev-icon"></span>
				  </a>
				  <a class="carousel-control-next" href="#demo" data-slide="next">
				    <span class="carousel-control-next-icon"></span>
				  </a>
		</div>
		<div class="titleslide text-center">
			<p class="enjoy">ENJOY</p>
			<p class="under">THE BEST</p>
			<p class="tea">TEA</p>
			<div class="btn btn-primary btn-readslide">READ MORE</div>
		</div>
	</div>
	
		
				
	<!-- end slide -->

	<!-- ad -->
	<div class="ad">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 khoi1">				
				<div class="text-center">
					<img src="<?php echo base_url(); ?>vendor/Image/icon-1.png" class="text-center">
					<div class="advb">
						<span class="ttad">Thế giới đồ uống</span>
						<p class="pad">
							Cửa hàng chúng tôi với đầy đủ các loại đồ uống đáp ứng mọi yêu cầu của khách hàng!
						</p>
					</div>
					<!-- <div class="btn btn-ouline btn-primary btn-block btn-read">READ MORE</div> -->
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 khoi2">				
				<div class="text-center">
					<img src="<?php echo base_url(); ?>vendor/Image/icon-1.png" class="text-center">
					<div class="advb">
						<span class="ttad">Cửa hàng sang trọng</span>
						<p class="pad">
							Đến với cửa hàng chúng tôi, bạn sẽ được thưởng thức đồ uống với không gian yên tĩnh, rộng rãi, thoải mái cùng với sự phục vụ nhiệt tình chu đáo!
						</p>
					</div>
					<!-- <div class="btn btn-ouline btn-primary btn-block btn-read">READ MORE</div> -->
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 khoi1">				
				<div class="text-center">
					<img src="<?php echo base_url(); ?>vendor/Image/icon-1.png" class="text-center">
					<div class="advb">
						<span class="ttad">Ưu đãi cực nhiều!</span>
						<p class="pad">
						 Cửa hàng chúng tôi có rất nhiều chương trình ưu đãi! Thật tuyệt vời khi mà đồ uống vừa ngon lại rẻ!
						</p>
					</div>
					<!-- <div class="btn btn-ouline btn-primary btn-block btn-read">READ MORE</div> -->
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 khoi2">				
				<div class="text-center">
					<img src="<?php echo base_url(); ?>vendor/Image/icon-1.png" class="text-center">
					<div class="advb">
						<span class="ttad">Vận chuyển tận nơi! </span>
						<p class="pad">
						Cửa hàng chúng tôi hỗ trợ giao hàng từ 9-22h hàng ngày!
						</p>
					</div>
					<!-- <div class="btn btn-ouline btn-primary btn-block btn-read">READ MORE</div> -->
				</div>
			</div>

		</div>
	</div>
	</div>
	<div class="offer">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="ttoffer">
						WHAT WE OFFER
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
					<div class="_1khoioffer">
						<img src="<?php echo base_url(); ?>vendor/Image/offer1.jpg" class="imgoffer" width="100%" height="100%">
						<div class="nenxam"></div>
						<div class="ovuong">
						</div>
						<div class="ttoffer2">
							Đa dạng các loại trà!
						</div>
						<!-- <div class="textoffer">
							Trà sữa truyền thống, trà sữa vị hoa quả, trà đài loan, trà hoa quả.
						</div> -->
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
					<div class="_1khoioffer">
						<img src="<?php echo base_url(); ?>vendor/Image/offer1.jpg" class="imgoffer" width="100%" height="100%">
						<div class="nenxam"></div>
						<div class="ovuong">
						</div>
						<div class="ttoffer2">
							Thức uống đá xay mát lạnh!
						</div>
						<!-- <div class="textoffer">
							Phù hợp cho những bạn thích đồ uống thật nhiều đá.
						</div> -->
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
					<div class="_1khoioffer">
						<img src="<?php echo base_url(); ?>vendor/Image/offer1.jpg" class="imgoffer" width="100%" height="100%">
						<div class="nenxam"></div>
						<div class="ovuong">
						</div>
						<div class="ttoffer2">
							Sinh tố hoa quả và sữa chua! 
						</div>
						<!-- <div class="textoffer">
							
						</div> -->
					</div>
				</div>
				<div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
					<div class="_1khoioffer">
						<img src="<?php echo base_url(); ?>vendor/Image/offer1.jpg" class="imgoffer" width="100%" height="100%">
						<div class="nenxam"></div>
						<div class="ovuong">
						</div>
						<div class="ttoffer2">
							Đa dạng cafe và thức uống freshmilk!
						</div>
						<!-- <div class="textoffer">
							
						</div> -->
					</div>
				</div>
				
			</div>
		</div>
	</div>
	

	<!-- <div class="promotion">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<span class="ttpromotion">NEWS</span>
					<p class="detail_promotion">Thông qua news bạn có thể biết được tin tức mới nhất về : 
						<br>
						<span class="pr"><i class="fa fa-check" aria-hidden="true"></i>Giảm giá</span>
						<br>
						<span class="pr"><i class="fa fa-check" aria-hidden="true"></i>Chương trình khuyến mãi</span>
						<br>
						<span class="pr"><i class="fa fa-check" aria-hidden="true"></i>Thông tin mặt hàng mới</span>
					</p>
					<a href="<?php echo base_url() ?>Home_C/newsV" class="btn btn-primary btn-pr">READ MORE</a>
				</div>
			</div>
		</div>
	</div> -->
	<div class=" promotion">
		<div id="demo2" class="carousel slide" data-ride="carousel">

				 
				  <ul class="carousel-indicators">
						<li data-target="#demo2" data-slide-to="0" class="active slideactive"></li>
						<?php $i=1;foreach($news as $key=>$value):?>
						<li data-target="#demo2" data-slide-to="<?php $i?>" class="slideactive"></li>
						<?php $i+=1;?>
						<?php endforeach ?>
				  </ul>
				  
				  
				  <div class="carousel-inner">
				    <div class="carousel-item active">
				      <img src="<?php echo base_url(); ?>vendor/Image/banner_black_new.png" style="width: 100%;height:100%;" class="imgslide">
						</div>

						<div>
								<span class="ttpromotion">NEWS</span>
									<p class="detail_promotion">Thông qua news bạn có thể biết được tin tức mới nhất về : 
										<br>
										<span class="pr"><i class="fa fa-check" aria-hidden="true"></i>Giảm giá</span>
										<br>
										<span class="pr"><i class="fa fa-check" aria-hidden="true"></i>Chương trình khuyến mãi</span>
										<br>
										<span class="pr"><i class="fa fa-check" aria-hidden="true"></i>Thông tin mặt hàng mới</span>
									</p>
							<!-- <a href="<?php echo base_url() ?>Home_C/newsV" class="btn btn-primary btn-pr">READ MORE</a> -->
						</div>

				   <?php foreach($news as $key=>$value):?>
				    <div class="carousel-item">
				      <img src="<?= $value['info']?>" style="width: 100%;height:70%;" class="imgslide">
						</div>
						<?php endforeach?>
				  </div>
				  
				  
				  <a class="carousel-control-prev" href="#demo2" data-slide="prev">
				    <span class="carousel-control-prev-icon"></span>
				  </a>
				  <a class="carousel-control-next" href="#demo2" data-slide="next">
				    <span class="carousel-control-next-icon"></span>
				  </a>
		</div>
		<!-- <div class="titleslide text-center">
			<p class="enjoy">ENJOY</p>
			<p class="under">THE BEST</p>
			<p class="tea">TEA</p>
			<div class="btn btn-primary btn-readslide">READ MORE</div>
		</div> -->
	</div>
	
	<div class="products">	
		<div class="container-fluid">

			<div class="row text-center">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<p class="tt_products">OUR STORE</p>
				</div>
			</div>

			<div class="row text-center">
				<div class="col-xs-12 col-sm-8 col-md-6 col-lg-6 offset-lg-3 offset-sm-2 offset-md-3">
					<p class="detail_products">At our store, we have a wide range of fresh milkteas and drinks ! Our gourmet drinks assortments will suit any occasion and any taste.</p>
				</div>
			</div>

			<div class="row row1">
					<p class="group1">* Trà sữa truyền thống *</p>
				<div id="owl-demo" class="owl-carousel owl-theme">
				<?php foreach ($key1 as $key => $value):?>
				  <div class="item">
						<div class="product-item-image">
			          	
			          			<img src="<?= $value['URL_IMG'] ?>" alt="" width="123" height="193">
			          		
			      </div>
			      <div class="product-item-caption buynow">
			                <h6 class="product-title">
			                	<span><?= $value['proname'] ?></span>
			                </h6>
			                <h4 class="product-price"><span><?= $value['price'] ?> đ</span></h4>
											<span id="<?=$value['PID']?>" style="display: none;"><?= $value['PID'] ?></span>
										
											<a  href="#" 
											class="btn btn-primary btn-outline-danger btn-block buy<?=$value['PID']?>"  >
											Buy Now</a>
						</div>
						
					</div>
				<?php endforeach ?>	    
				</div>	
			</div>
		
			<div class="row row2">
			<p class="group2">* Trà sữa vị hoa quả *</p>
				<div id="owl-demo" class="owl-carousel owl-theme">
				<?php foreach ($key2 as $key => $value):?>
				  <div class="item">
						<div class="product-item-image">
			          		
			          			<img src="<?= $value['URL_IMG'] ?>" alt="" width="123" height="193">
			          	
			      </div>
			      <div class="product-item-caption">
			                <h6 class="product-title">
			                	<span><?= $value['proname'] ?></span>
			                </h6>
			                <h4 class="product-price"><span><?= $value['price'] ?> đ</span></h4>
			                <span id="<?=$value['PID']?>" style="display: none;"><?= $value['PID'] ?></span>
										
											<a  href="#" 
											class="btn btn-primary btn-outline-danger btn-block buy<?=$value['PID']?>"  >
											Buy Now</a>
			      </div>
					</div>
				<?php endforeach ?>	    
				</div>	
			</div>

			<div class="row row3">
			<p class="group3">* Thức uống đá xay *</p>
				<div id="owl-demo" class="owl-carousel owl-theme">
				<?php foreach ($key3 as $key => $value):?>
				  <div class="item">
						<div class="product-item-image">
			          			<img src="<?= $value['URL_IMG'] ?>" alt="" width="123" height="193">
			      </div>
			      <div class="product-item-caption">
			                <h6 class="product-title">
			                	<span><?= $value['proname'] ?></span>
			                </h6>
			                <h4 class="product-price"><span><?= $value['price'] ?> đ</span></h4>
											<span id="<?=$value['PID']?>" style="display: none;"><?= $value['PID'] ?></span>
										
											<a  href="#" 
											class="btn btn-primary btn-outline-danger btn-block buy<?=$value['PID']?>"  >
											Buy Now</a>
			      </div>
					</div>
				<?php endforeach ?>	    
				</div>	
			</div>

			<!-- <div class="row">
			<p class="group4">* Trà đài loan nguyên chất *</p>
				<div id="owl-demo" class="owl-carousel owl-theme">
				<?php foreach ($key4 as $key => $value):?>
				  <div class="item">
						<div class="product-item-image">
			          			<img src="<?= $value['URL_IMG'] ?>" alt="" width="123" height="193">
			      </div>
			      <div class="product-item-caption">
			                <h6 class="product-title">
			                	<span><?= $value['proname'] ?></span>
			                </h6>
			                <h4 class="product-price"><span><?= $value['price'] ?> đ</span></h4>
			                <a href="#ex1" class="btn btn-primary btn-outline-danger btn-block" rel="modal:open" >Buy Now</a>
			      </div>
					</div>
				<?php endforeach ?>	    
				</div>	
			</div>

			<div class="row">
			<p class="group5">* Thức uống đá xay *</p>
				<div id="owl-demo" class="owl-carousel owl-theme">
				<?php foreach ($key5 as $key => $value):?>
				  <div class="item">
						<div class="product-item-image">
			          			<img src="<?= $value['URL_IMG'] ?>" alt="" width="123" height="193">
			      </div>
			      <div class="product-item-caption">
			                <h6 class="product-title">
			                	<span><?= $value['proname'] ?></span>
			                </h6>
			                <h4 class="product-price"><span><?= $value['price'] ?> đ</span></h4>
			                <a href="#ex1" class="btn btn-primary btn-outline-danger btn-block" rel="modal:open" >Buy Now</a>
			      </div>
					</div>
				<?php endforeach ?>	    
				</div>	
			</div>

			<div class="row">
			<p class="group6">* Sinh tố hoa quả *</p>
				<div id="owl-demo" class="owl-carousel owl-theme">
				<?php foreach ($key6 as $key => $value):?>
				  <div class="item">
						<div class="product-item-image">
			          			<img src="<?= $value['URL_IMG'] ?>" alt="" width="123" height="193">
			      </div>
			      <div class="product-item-caption">
			                <h6 class="product-title">
			                	<span><?= $value['proname'] ?></span>
			                </h6>
			                <h4 class="product-price"><span><?= $value['price'] ?> đ</span></h4>
			                <a href="#ex1" class="btn btn-primary btn-outline-danger btn-block" rel="modal:open" >Buy Now</a>
			      </div>
					</div>
				<?php endforeach ?>	    
				</div>	
			</div> -->
		</div>
	</div>
	
	
	<div class="customer">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="ttcus">KHÁCH HÀNG THÂN THIẾT</div>
					<br>
					<p class="detail_cus">
						Đăng ký thành viên thân thiết, khách hàng sẽ được một số ưu đãi như :
						<p class="cs"><i class="fa fa-chevron-right" aria-hidden="true"></i> Cộng điểm tích lũy</p>
						<p class="cs"><i class="fa fa-chevron-right" aria-hidden="true"></i> Sử dụng thẻ để thanh toán</p>
						<p class="cs"><i class="fa fa-chevron-right" aria-hidden="true"></i> Mua một số mặt hàng với giá không tưởng</p>
					</p>
					<a href="<?php echo base_url() ?>Home_C/registerV" class="btn btn-outline-danger btn-tv">Register</a>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="thethanhvien">
						<img class="imgtv" src="<?php echo base_url(); ?>vendor/Image/logo.png"></img>
						<p class="tv">MEMBER CARD</p>
						<div class="details_tv">SO 1 - DAI CO VIET - DHBKHN</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="add">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<p class="add text-center">ADDRESS</p>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.6026520837013!2d105.84825301476288!3d21.008559186009304!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab8a922653a9%3A0x6c2ec19683313eab!2zMSDEkOG6oWkgQ-G7kyBWaeG7h3QsIEPhuqd1IEThu4FuLCBIYWkgQsOgIFRyxrBuZywgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1552407497453" width="100%" height="450" frameborder="0" style="" allowfullscreen></iframe>
				</div>
			</div>
		</div>
	</div>
	<div class="contact">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="line1">CONTACT US</div>
					<div class="line2">0987042556</div>
					<div class="line3">doandaitien260898@gmail.com</div>
					<div class="line4">So 1, Dai Co Viet, DHBKHN</div>
				</div>
				<!-- <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<div class="line1">SUBSCRIBE</div>
					<div class="line2">Enter your e-mail and content </div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="input-effect">
					        	<input class="effect-16" type="text" placeholder="">
					            <label>First Name</label>
					            <span class="focus-border"></span>
					        </div>
						</div>
					</div>
				</div> -->
				<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
					<div class="line1">SOCIAL LINKS</div>
					<div class="line2">Follow us on these social networks.</div>
					<div class="row">
						<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
							<div class="so_li"><i class="fa fa-instagram" aria-hidden="true"></i></div>
						</div>
						<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
						</div>
						<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
							<div class="so_li"><i class="fa fa-facebook-square" aria-hidden="true"></i></div>
						</div>
						<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
						</div>
						<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
							<div class="so_li"><i class="fa fa-twitter" aria-hidden="true"></i></div>
						</div>
						<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
						</div>
						<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
							<div class="so_li"><i class="fa fa-google-plus-official" aria-hidden="true"></i></div>
						</div>	
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<div class="copyr">
		<div class="container-fluid text-center">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					ChaXua Production © 2019.
				</div>
			</div>
		</div>
	</div>

	<!-- nút đi lên  -->
	<div class="nutdilen">
		<i class="fa fa-angle-up" aria-hidden="true"></i>
	</div>
	<!-- end nút đi lên  -->

	<!-- giỏ hàng -->
	<div class="nutgiohang">
		<a href="<?php echo base_url() ?>Home_C/cartV" data-toggle="tooltip" data-placement="top" title="ShoppingCart">
		<i class="fa fa-shopping-cart" aria-hidden="true"></i>
		<span class="badge badge-light sosp">
		<?php if(isset($_COOKIE["cart"])) {
			$cart=json_decode($_COOKIE['cart'], true);
			echo count($cart);
		}else {
			echo '0';
		}
		?>
		</span>
		</a>
	</div>
	<!-- end giỏ hàng -->
	
	<!-- phần thêm vào giỏ hàng thành công  -->
	<div class="thanhcong">
		<div class="icontick"><i class="fa fa-check" aria-hidden="true"></i></div>
		<p class="tc">Bạn đã thêm thành công sản phẩm vào giỏ hàng</p>
	</div>
	<!-- end thêm vào giỏ hàng thành công  -->

	<!-- <div class="to_dungyen modal" id="#ex1"> -->
	<div class="topppppp modal" id="ex1">
			<div class="multiple-items">
				<div class="tp">
					<div class="tp_img"><img src="<?php echo base_url(); ?>vendor/Image/bubble.jpg"></div>
					<div class="tp_name1 text-center">Bubble</div>
					<div class="tp_name2 text-center">Trân châu đen</div>
					<div class="tp_price text-center">+ 5.000 VNĐ</div>
					<div class="pretty p-image p-plain">
				        <input type="checkbox" />
				        <div class="state">
				            <img class="image" src="<?php echo base_url(); ?>vendor/Image/001.png">
				            <label>Agree</label>
				        </div>
				    </div>
				</div>
				<div class="tp">
					<div class="tp_img"><img src="<?php echo base_url(); ?>vendor/Image/bubble.jpg"></div>
					<div class="tp_name1 text-center">Bubble</div>
					<div class="tp_name2 text-center">Trân châu đen</div>
					<div class="tp_price text-center">+ 5.000 VNĐ</div>
					<div class="pretty p-image p-plain">
				        <input type="checkbox" />
				        <div class="state">
				            <img class="image" src="<?php echo base_url(); ?>vendor/Image/001.png">
				            <label>Agree</label>
				        </div>
				    </div>
				</div>
				<div class="tp">
					<div class="tp_img"><img src="<?php echo base_url(); ?>vendor/Image/bubble.jpg"></div>
					<div class="tp_name1 text-center">Bubble</div>
					<div class="tp_name2 text-center">Trân châu đen</div>
					<div class="tp_price text-center">+ 5.000 VNĐ</div>
					<div class="pretty p-image p-plain">
				        <input type="checkbox" />
				        <div class="state">
				            <img class="image" src="<?php echo base_url(); ?>vendor/Image/001.png">
				            <label>Agree</label>
				        </div>
				    </div>
				</div>
				<div class="tp">
					<div class="tp_img"><img src="<?php echo base_url(); ?>vendor/Image/bubble.jpg"></div>
					<div class="tp_name1 text-center">Bubble</div>
					<div class="tp_name2 text-center">Trân châu đen</div>
					<div class="tp_price text-center">+ 5.000 VNĐ</div>
					<div class="pretty p-image p-plain">
				        <input type="checkbox" />
				        <div class="state">
				            <img class="image" src="<?php echo base_url(); ?>vendor/Image/001.png">
				            <label>Agree</label>
				        </div>
				    </div>
				</div>
				<div class="tp">
					<div class="tp_img"><img src="<?php echo base_url(); ?>vendor/Image/bubble.jpg"></div>
					<div class="tp_name1 text-center">Bubble</div>
					<div class="tp_name2 text-center">Trân châu đen</div>
					<div class="tp_price text-center">+ 5.000 VNĐ</div>
					<div class="pretty p-image p-plain">
				        <input type="checkbox" />
				        <div class="state">
				            <img class="image" src="<?php echo base_url(); ?>vendor/Image/001.png">
				            <label>Agree</label>
				        </div>
				    </div>
				</div>
				<div class="tp">
					<div class="tp_img"><img src="<?php echo base_url(); ?>vendor/Image/bubble.jpg"></div>
					<div class="tp_name1 text-center">Bubble</div>
					<div class="tp_name2 text-center">Trân châu đen</div>
					<div class="tp_price text-center">+ 5.000 VNĐ</div>
					<div class="pretty p-image p-plain">
				        <input type="checkbox" />
				        <div class="state">
				            <img class="image" src="<?php echo base_url(); ?>vendor/Image/001.png">
				            <label>Agree</label>
				        </div>
				    </div>
				</div>
				<div class="tp">
					<div class="tp_img"><img src="<?php echo base_url(); ?>vendor/Image/bubble.jpg"></div>
					<div class="tp_name1 text-center">Bubble</div>
					<div class="tp_name2 text-center">Trân châu đen</div>
					<div class="tp_price text-center">+ 5.000 VNĐ</div>
					<div class="pretty p-image p-plain">
				        <input type="checkbox" />
				        <div class="state">
				            <img class="image" src="<?php echo base_url(); ?>vendor/Image/001.png">
				            <label>Agree</label>
				        </div>
				    </div>
				</div>
				<div class="tp">
					<div class="tp_img"><img src="<?php echo base_url(); ?>vendor/Image/bubble.jpg"></div>
					<div class="tp_name1 text-center">Bubble</div>
					<div class="tp_name2 text-center">Trân châu đen</div>
					<div class="tp_price text-center">+ 5.000 VNĐ</div>
					<div class="pretty p-image p-plain">
				        <input type="checkbox" />
				        <div class="state">
				            <img class="image" src="<?php echo base_url(); ?>vendor/Image/001.png">
				            <label>Agree</label>
				        </div>
				    </div>
				</div>
				
		
			</div>
		
		<div class="themvaogiohang">
			<button class="btn btn-outline-success">Thêm vào giỏ hàng</button>
		</div>
		<div class="boqua">
			<a href="">Bỏ qua</a>
		</div>
	</div>
	<!-- </div> -->

	<!-- <script type="text/javascript">
		$(document).ready(function() {
			$('.buynow1').click(function(event) {
				event.preventDefault();
				var PID=$('#pid');
				PID = PID[0].innerText;

				var soluongsp = $('.badge');
				soluong = soluongsp[0].innerText;
				Number(soluong);

				$.ajax({
						url: '<?php echo base_url(); ?>Home_C/addToCartC',
						type: 'POST',
						dataType: 'json',
						data: {PID: PID },
						success: function(result){  
										console.log(result);
				            if(result== '1' ){
											soluong ++;
				            	soluongsp.html(soluong);
											setTimeout(function(){
												window.location= "<?php echo base_url(); ?>index.php/SmartPhoneStore/GioHang";
						   	     	}, 1100);
				            }  
						}
				})
			});;
		});
	</script> -->

	<!-- duyệt toàn bộ danh sách sản phẩm -->
<?php $sql = $this->db->get('product');
			$product = $sql->result_array();
			foreach ($product as $key=>$value):?>
<script type="text/javascript">
	$(document).ready(function() {
				//xử lý sự kiện nhấn button buy
        $('.buy<?=$value['PID']?>').click(function(e) {
            e.preventDefault();
						var PID=$('#<?=$value['PID']?>');
						PID = PID[0].innerText;

						var soluongsp = $('.sosp');
						soluong = soluongsp[0].innerText;
						Number(soluong);
						console.log(PID);
						
            $.ajax({
                url: '<?php echo base_url(); ?>Home_C/addToCartC',
                type: 'POST',
                dataType: 'json',
								data: {PID: PID }
				          
						})
						soluong ++;
						console.log(soluong);
						soluongsp.html(soluong);

						// hiển thị thêm thành công
						setTimeout(hienradi, 500);
            setTimeout(toradi,700);

        });

				//hiển thị tick
				var hienradi = function(){
							$('.thanhcong').addClass('hienradi');
							setTimeout(function(){
									$('.thanhcong').removeClass('hienradi');
										console.log("thanhcong");
							}, 700);
				};
				//hiển thị giỏ hàng to lên
				var toradi = function () {
							$('.nutgiohang').addClass('giohangtora');
							setTimeout(function(){
									$('.nutgiohang').removeClass('giohangtora');
									console.log(2);
							}, 1000);
				};

    });
	</script>
	<?php endforeach ?>

</body>
</html>