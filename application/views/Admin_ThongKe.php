<!DOCTYPE html>
<html lang="en">
<head>
	<title>Thống kê</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.0/dist/jquery.validate.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
 	<script src="https://code.highcharts.com/highcharts.src.js"></script>

 	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/Css/Admin_ThongKe.css">
	<script type="text/javascript" src="<?php echo base_url(); ?>vendor/Js/Admin_Cashier.js"></script>
	<!-- <script type="text/javascript" src="ckeditor_finder/ckeditor.js"></script> -->
 	<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
</head>
<body>
	<?php 
	if(isset($this->session->userdata['admin_username'])){
		
	}
	else{
		redirect('http://localhost:81/Project3/Home_C');
	}
	?>
	<div class="container-fluid">
		<div class="row">
			<!-- menu trái -->
			<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 menutrai" id="sidebar-wrapper">
				
				<div id="abc" >
					<div class="icon-main">
						<a href="<?php echo base_url(); ?>Admin/thongKe"><img src="<?php echo base_url(); ?>/vendor/image/anhmain/trasua.png" alt=""></a>
						<!-- <a href="" id="menu-close" class="btn btn-default btn-lg pull-right toggle">
							<i class="fas fa-times"></i>
						</a> -->
						<button type="button" id="menu-close" class="close pull-right " ><i class="fas fa-times"></i></button>
					</div>
					<!-- top -->
					<div class="profile clearfix">
			            <div class="profile_pic">
			                <img src="<?php echo base_url(); ?>/vendor/image/anhmain/person.png" width="70px" height="70px" alt="..." class="img-circle profile_img">
			            </div>
		                <div class="profile_info">
			                <span>Welcome,</span>
			                <h2><?php echo $this->session->userdata['admin_username']; ?></h2>
		            	</div>
	           		 </div>
					<!-- end top -->
					<!-- nav-sidebar -->
					<div class="list-menu">
						<ul >
							<li>
								<a href="<?php echo base_url(); ?>Admin/quanLySP" class="menuchinh" >
									<i class="fab fa-product-hunt icontrai"></i>
									<span>Quản lý thông tin trà sữa</span>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>Admin/quanLyThuNgan" class="menuchinh ">
									<i class="fas fa-users icontrai"></i>
									<span>Quản lý Cashier</span>
								</a>
							</li>
							<!-- <li>
								<a href="" class="menuchinh">
									<i class="fas fa-info-circle icontrai"></i>
									<span>Quản lý thông tin khuyến mãi</span>
								</a>
							</li> -->
							<li>
								<a href="<?php echo base_url(); ?>Admin/quanLyTopping" class="menuchinh">
									<i class="fas fa-grin-hearts icontrai"></i>
									<span>Quản lý topping</span>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>Admin/quanLyHoaDon" class="menuchinh">
									<i class="fas fa-grip-horizontal icontrai"></i>
									<span>Quản lý hóa đơn</span>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>Admin/quanLyDonDatHang" class="menuchinh">
									<i class="fas fa-building icontrai"></i>
									<span>Quản lý đơn đặt hàng</span>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>Admin/thongKe" class="menuchinh visitted">
									<i class="fas fa-building icontrai"></i>
									<span>Thống kê</span>
								</a>
							</li>
							
						</ul>
					</div>
					<!-- end nav-sidebar -->
					<!-- footer -->
					<div class="footer">
						<p class="fot text-center"><i class="fa fa-copyright" aria-hidden="true"></i> Copyright 2019</p>
					</div>
					<!-- end footer -->
				</div>
			</div>
			<!-- end menu trái -->
			<!-- Phần nội dung -->
			<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 noidungchinh">
				<!-- Phần menu trên -->
				<div class="menutren">
					<a id="menu-toggle" href="#" class="btn btn-default btn-lg toggle"><i class="fa fa-bars"></i></a>
					<a class="admin" style="cursor: pointer;">
						<i class="fa fa-user icon"></i>
						<span><?php echo $this->session->userdata['admin_username']; ?></span>
						<i class="fas fa-angle-down icon"></i>
					</a>
					<ul class="admin-management">
						<li><a href="#admin" data-toggle="modal" class="detail_admin">
							<span>Thông tin tài khoản</span>
							<i class="fas fa-user-circle"></i>								
						</a></li>
						<li class="sign_out"><a href="">
							<span>Đăng xuất</span>
							<i class="fas fa-sign-out-alt"></i>								
						</a></li>
					</ul>
				</div>	
				<!-- end phần menu trên -->
				<!-- phần quản trị -->
				<div class="thongke">
					<div class="container">
						<div class="doanhthuthangnay">
							<div class="row">
								<h3 class="text-center tieude">Doanh thu tháng này</h3>
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 chart">
									<div id="chart1" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
									<div class="dulieu7ngay" hidden="true">
										<?php foreach($dulieu7ngay as $key => $value): ?>
											<span><?= $value['totalprice'] + $value['tientichluy']?></span>
										<?php endforeach ?>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 chitiet">
									<div class="row">
										<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
											<span class="total1">Tổng tiền hàng:</span>
											<h3><?=number_format($monCurrent['totalprice'] + $monCurrent['tientichluy'])?> VND</h3>
										</div>
										<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
											<span class="total2">Tổng tiền tích lũy đã thanh toán:</span>
											<h3><?= number_format($monCurrent['tientichluy'])?> VND</h3>
										</div>
										<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
											<span class="total3">Tổng thu:</span>
											<h3><?= number_format($monCurrent['totalprice'])?> VND</h3>
										</div>
									</div>
								</div>
							</div>
							
						</div>
						<div class="doanhthucanam">
							<div class="row">
								<h3 class="text-center tieude">Doanh thu cả năm</h3>
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 chart">
									<div id="chart2" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
									<div class="dulieutungthang" hidden="true">
										<?php foreach($dulieutungthang as $key => $value): ?>
											<span><?= $value['totalprice'] + $value['tientichluy']?></span>
										<?php endforeach ?>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 chitiet">
									<div class="row">
										<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
											<span class="total1">Tổng tiền hàng:</span>
											<h3><?=number_format($dulieucanam['totalprice'] + $dulieucanam['tientichluy'])?> VND</h3>
										</div>
										<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
											<span class="total2">Tổng tiền tích lũy đã thanh toán:</span>
											<h3><?= number_format($dulieucanam['tientichluy'])?> VND</h3>
										</div>
										<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
											<span class="total3">Tổng thu:</span>
											<h3><?= number_format($dulieucanam['totalprice'])?> VND</h3>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- end phần quản trị -->
			</div>
			<!-- end phần nội dung -->
		</div>
	</div>

	<!-- Phần thêm mới thu ngân -->
	<div id="admin" class="modal fade" role="dialog">
	  	<div class="modal-dialog">
	    <!-- Modal content-->
		    <div class="modal-content">
		      	<div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title text-center">Thông tin admin</h4>
		      	</div>
		      	<div class="modal-body">			      		
		        	<form  method="POST" role="form" id="infoadmin" class="ad">	
	        		<?php foreach ($dulieuadmin as $key4 => $value4):?>
						<?php if($value4['role'] == "admin"): ?>
		        		<div class="form-group">
							<label for="">Tên đăng nhập</label>
							<input type="text" class="form-control" id="adminid" name="tendn" value="<?= $value4['userid']?>"  placeholder="Enter name" required disabled>
							<label for="" hidden="true" id="checkId" style="color: red;">Tài khoản đã tồn tại</label>
						</div>
						<div class="form-group">
							<label for="">Tên admin</label>
							<input type="text" class="form-control" id="adminname" value="<?= $value4['username']?>" name="tentn" minlength="2" placeholder="Enter name">
							<label for="" hidden="true" id="checkUsername" style="color: red;">Không được phép để trống</label>
						</div>
						<div class="form-group">
							<label for="">Email</label>
							<input type="email" class="form-control" id="adminemail" value="<?= $value4['email']?>" name="email" placeholder="@gmail.com">
						</div>
						<?php endif ?>
					<?php endforeach ?>
						<div class="form-group">
							<label for="">Đổi mật khẩu</label>
						</div>
						<div class="form-group">
							<label for="">Mật khẩu cũ</label>
							<input type="password" class="form-control" id="oldpassword1"  minlength="6"  name="mkcu" placeholder="Enter password">
						</div>
						<div class="form-group">
							<label for="">Mật khẩu mới</label>
							<input type="password" class="form-control" id="newpassword1" minlength="6"  name="mkmoi" placeholder="Enter password">
						</div>
						<div class="form-group">
							<label for="">Nhập lại mật khẩu</label>
							<input type="password" class="form-control" id="renewpassword1" minlength="6"  name="mkmoi1" placeholder="repeat password">
						</div> 				
				        <div class="button">
				        	<button type="submit" class="btn btn-primary" id="submit_admin">Chỉnh sửa</button>
				        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        </div>
					</form>
		      	</div>
		    </div>
	  	</div>
	</div>
	<!-- end phần thêm thu ngân -->

	<script type="text/javascript">
		$(function () {
			var a = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
		                'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
		    var b = [];
		    var d = new Date();
		    var day = d.getDate();
		    var month = d.getMonth();
		    var dulieu = [];
		    var dulieutungthang = [];

		    for(var i = 0; i < 7; i++){
		    	b[i] = (day - 7 + i) + '/' + "0" + (month + 1);
		    	dulieu[i] = Number($('.dulieu7ngay span')[i].innerText);
		    }

		    for(var i = 0; i < 12; i++){
		    	dulieutungthang[i] = Number($('.dulieutungthang span')[i].innerText);
		    }

		    console.log(dulieutungthang);
		    Highcharts.chart('chart1', {
		        title: {
		            text: 'Thống kê 7 ngày',
		        },
		        xAxis: {
		            categories: b
		        },
		        yAxis: {
		            title: {
		                text: 'VND'
		            },
		            plotLines: [{
		                value: 0,
		                width: 1,
		                color: '#808080'
		            }]
		        },
		        tooltip: {
		            valueSuffix: ' VND'
		        },
		        legend: {
		            layout: 'vertical',
		            align: 'right',
		            verticalAlign: 'middle',
		            borderWidth: 0
		        },
		        series: [{
		            data: dulieu,
		            name: "Doanh thu"
		        }]
		    });

		    Highcharts.chart('chart2', {
		        title: {
		            text: 'Thống kê cả năm',
		        },
		        xAxis: {
		            categories: a
		        },
		        yAxis: {
		            title: {
		                text: 'VND'
		            },
		            plotLines: [{
		                value: 0,
		                width: 1,
		                color: '#808080'
		            }]
		        },
		        tooltip: {
		            valueSuffix: ' VND'
		        },
		        legend: {
		            layout: 'vertical',
		            align: 'right',
		            verticalAlign: 'middle',
		            borderWidth: 0
		        },
		        series: [{
		            data: dulieutungthang,
		            name: "Doanh thu"
		        }]
		    });

		    
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function() {
			$(document).ready(function() {

			$(document).on('click', '.sign_out', function(event) {
				event.preventDefault();
				window.location = "http://localhost:81/Project3/Home_C/Login";
			});
		});
		});
	</script>
</body>
</html>