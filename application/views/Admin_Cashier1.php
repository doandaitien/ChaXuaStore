<!DOCTYPE html>
<html>
<head>
	<title>Quản lý thu ngân</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
 	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/Css/Admin_Cashier.css">
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
	<?php 
		$uri = $_SERVER['REQUEST_URI'];
		$uri = explode('/',$uri);
		$trangHienTai = end($uri);
		if(!is_numeric($trangHienTai)) {
			$trangHienTai = 1;
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
								<a href="<?php echo base_url(); ?>Admin/quanLyThuNgan" class="menuchinh visitted">
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
								<a href="<?php echo base_url(); ?>Admin/thongKe" class="menuchinh">
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

				<!-- phần sản phẩm -->
				<div class="list-product">				
					<div class="container">
						<div class="tieude text-center">
							<h2>Danh sách thu ngân</h2>
						</div>
						<div class="timkiem">
							<div class="button-add">
								<a href="#myModal" id="menu-add" class="btn btn-default portfolio-link" data-toggle="modal"><i class="fas fa-plus"></i>Thêm mới</a>
							</div>
							<!-- <input class="form-control" type="text" placeholder="Search" aria-label="Search">
							<button class="btn btn-default" type="submit">
								<i class="fa fa-search" aria-hidden="true"></i>
							</button> -->
						</div>
						<!-- phần danh sách thu ngân -->
						<div class="dsthungan" >
							<table class="table">
								<thead class="header">
									<tr id="1">
										<th>Tên đăng nhập</th>
										<th>Tên thu ngân</th>
										<th>Email</th>
										<th>Vị trí</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($dulieusanpham as $key => $value):?>
										<?php if($value['role'] == "thu ngân"): ?>
										<tr role="row">
											<td role="gridcell" class="userid1"><?= $value['userid']?></td>
											<td class="nameCashier1"><?= $value['username']?></td>
											<td class="emailCashier1"><?= $value['email']?></td>
											<td class="location1"><?= $value['location']?></td>
											<td>
												<div class="nut">
													<a href="#myModal1" class="btn btn-default edit" title="<?php echo $value['AID']?>" data-toggle="modal">Chỉnh sửa <i class="fas fa-pencil-alt"></i> </a>
													<a class="btn btn-default delete">Xóa <i class="fas fa-times"></i></a>
												</div>
											</td>
										</tr>
										<?php endif ?>
									<?php endforeach ?>

									<!-- <tr>
										<td><img src="../mono.png" alt=""></td>
										<td>Thu ngân 1</td>
										<td>TN1@chaxua.bknet.com</td>
										<td>
											<div class="nut">
												<a href="#myModal1" class="btn btn-default edit" data-toggle="modal">Chỉnh sửa <i class="fas fa-pencil-alt"></i> </a>
												<a href="" class="btn btn-default delete">Xóa <i class="fas fa-times"></i></a>
											</div>
										</td>
									</tr>
									<tr>
										<td><img src="../mono.png" alt=""></td>
										<td>Thu ngân 1</td>
										<td>TN1@chaxua.bknet.com</td>
										<td>
											<div class="nut">
												<a href="#myModal1" class="btn btn-default edit" data-toggle="modal">Chỉnh sửa <i class="fas fa-pencil-alt"></i> </a>
												<a href="" class="btn btn-default delete">Xóa <i class="fas fa-times"></i></a>
											</div>
										</td>
									</tr>
									<tr>
										<td><img src="../mono.png" alt=""></td>
										<td>Thu ngân 1</td>
										<td>TN1@chaxua.bknet.com</td>
										<td>
											<div class="nut">
												<a href="#myModal1" class="btn btn-default edit" data-toggle="modal">Chỉnh sửa <i class="fas fa-pencil-alt"></i> </a>
												<a href="" class="btn btn-default delete">Xóa <i class="fas fa-times"></i></a>
											</div>
										</td>
									</tr>
									<tr>
										<td><img src="../mono.png" alt=""></td>
										<td>Thu ngân 1</td>
										<td>TN1@chaxua.bknet.com</td>
										<td>
											<div class="nut">
												<a href="#myModal1" class="btn btn-default edit" data-toggle="modal">Chỉnh sửa <i class="fas fa-pencil-alt"></i> </a>
												<a href="" class="btn btn-default delete">Xóa <i class="fas fa-times"></i></a>
											</div>
										</td>
									</tr>
									<tr>
										<td><img src="../mono.png" alt=""></td>
										<td>Thu ngân 1</td>
										<td>TN1@chaxua.bknet.com</td>
										<td>
											<div class="nut">
												<a href="#myModal1" class="btn btn-default edit" data-toggle="modal">Chỉnh sửa <i class="fas fa-pencil-alt"></i> </a>
												<a href="" class="btn btn-default delete">Xóa <i class="fas fa-times"></i></a>
											</div>
										</td>
									</tr> -->
									
								</tbody>
								<!-- phần chỉnh sửa thông tin -->
								<div id="myModal1" class="modal fade" role="dialog">
								  	<div class="modal-dialog">
								    <!-- Modal content-->
									    <div class="modal-content">
									      	<div class="modal-header">
										        <button type="button" class="close" data-dismiss="modal">&times;</button>
										        <h4 class="modal-title text-center">Chỉnh sửa thông tin</h4>
									      	</div>
									      	<div class="modal-body">			      		
									        	<form  method="POST" role="form" id="editform">
									        		<div class="form-group">
														<label for="">Tên đăng nhập</label>
														<input type="text" class="form-control" minlength="3" name="tendn" id="userid2" placeholder="Enter name" disabled>
													</div>
													<div class="form-group">
														<label for="">Tên thu ngân</label>
														<input type="text" class="form-control" minlength="2" id="nameCashier2" name="tentn" placeholder="Enter name">
													</div>
													<div class="form-group">
														<label for="">Email</label>
														<input type="email" class="form-control" id="emailCashier2" name="email" placeholder="@gmail.com">
													</div>
													<div class="form-group">
														<label for="">Vị trí</label>
														<select id="company1" class="form-control" name="location2">
														    <option>Ca sáng</option>
														    <option>Tăng cường ca sáng</option>
														    <option>ca chiều</option>
														    <option>Tăng cường ca chiều</option>
														    <option>ca tối</option>
														    <option>Tăng cường ca tối</option>
														</select>
													</div>
													<div class="form-group">
														<label for="">Đổi mật khẩu</label>
													</div>
													<div class="form-group">
														<label for="">Mật khẩu cũ</label>
														<input type="password" class="form-control" id="oldpassword" minlength="6"  name="mkcu" placeholder="Enter password">
													</div>
													<div class="form-group">
														<label for="">Mật khẩu mới</label>
														<input type="password" class="form-control" minlength="6" id="newpassword" name="mkmoi" placeholder="Enter password">
													</div>
													<div class="form-group">
														<label for="">Nhập lại mật khẩu</label>
														<input type="password" class="form-control" minlength="6" id="renewpassword" name="mkmoi1" placeholder="repeat password">
													</div> 
													<div class="button">
														<button type="submit" class="btn btn-primary" id="submit_edit" >Chỉnh sửa</button>
									        			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
													</div>
												</form>
									      	</div>
									    </div>
								  	</div>
								</div>
								<!-- end phần chỉnh sửa thông tin -->
							</table>
						</div>
						<!-- end phần danh sách thu ngân -->
						<!-- phần phân trang  -->
						<?php if($sotrang > 1) { ?>
						<div class="row text-center page">
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<ul class="pagination justify-content-center" style="margin: 30px 0">
									<?php for($i = 0; $i < $sotrang; $i++) {?>
										<?php if($i+1 == $trangHienTai) {?>
											<li class="page-item active"><a class="page-link"><?= $i+1?></a></li>
										<?php } else {?>
											<li class="page-item"><a class="page-link"><?= $i+1?></a></li>
										<?php } ?>
									<?php } ?>										
								</ul>
							</div>
						</div>
						<?php } ?>
						<!-- end phần phân trang -->
					</div>
				</div>
				<!-- end phần sản phẩm -->
				<!-- <div class="text-center thongbao justify-content-center">
					<div class="alert" >
						<i class="fa fa-check" aria-hidden="true"></i>
						    Thêm thành công
					</div>
				</div> -->
			</div>
			<!-- end phần nội dung -->
		</div>
	</div>
	
	<!-- Phần thêm mới thu ngân -->
	<div id="myModal" class="modal fade" role="dialog">
	  	<div class="modal-dialog">
	    <!-- Modal content-->
		    <div class="modal-content">
		      	<div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title text-center">Thêm mới thu ngân</h4>
		      	</div>
		      	<div class="modal-body">	      		
		        	<form  method="POST" role="form" id="addform" class="add">
		        		<div class="form-group">
							<label for="">Tên đăng nhập</label>
							<input type="text" id="userid" class="form-control" name="tendn"  placeholder="Enter name" required>
							<label for="" hidden="true" id="checkId" style="color: red;">Tài khoản đã tồn tại</label>
						</div>
						<div class="form-group">
							<label for="">Tên thu ngân</label>
							<input type="text" class="form-control" id="username" name="tentn" minlength="2" placeholder="Enter name">
							<label for="" hidden="true" id="checkUsername" style="color: red;">Không được phép để trống</label>
						</div>
						<div class="form-group">
							<label for="">Mật khẩu</label>
							<input type="password" class="form-control" id="password" name="mk" id="inputPassword" minlength="6"  placeholder="Enter password" required>
							<label for="" hidden="true" id="checkPassword" style="color: red;">Không được phép để trống</label>
						</div>
						<div class="form-group">
							<label for="">Email</label>
							<input type="email" class="form-control" id="email" name="email" placeholder="@gmail.com" required>
							<label for="" hidden="true" id="checkEmail" style="color: red;">Không được phép để trống</label>
						</div>
						<div class="form-group">
	        				<label class="control-label" for="company">Vị trí</label>
							<select id="company" class="form-control" name="location">
							    <option>Ca sáng</option>
							    <option>Tăng cường ca sáng</option>
							    <option>ca chiều</option>
							    <option>Tăng cường ca chiều</option>
							    <option>ca tối</option>
							    <option>Tăng cường ca tối</option>
							</select> 
				        </div>						
				        <div class="button">
				        	<button type="submit" class="btn btn-primary" id="submit_add">Thêm mới</button>
				        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        </div>
					</form>
		      	</div>
		    </div>
	  	</div>
	</div>
	<!-- end phần thêm thu ngân -->

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
	        		<?php foreach ($dulieusanpham as $key1 => $value1):?>
						<?php if($value1['role'] == "admin"): ?>
		        		<div class="form-group">
							<label for="">Tên đăng nhập</label>
							<input type="text" class="form-control" id="adminid" name="tendn" value="<?= $value1['userid']?>"  placeholder="Enter name" required disabled>
							<label for="" hidden="true" id="checkId" style="color: red;">Tài khoản đã tồn tại</label>
						</div>
						<div class="form-group">
							<label for="">Tên admin</label>
							<input type="text" class="form-control" id="adminname" value="<?= $value1['username']?>" name="tentn" minlength="2" placeholder="Enter name">
							<label for="" hidden="true" id="checkUsername" style="color: red;">Không được phép để trống</label>
						</div>
						<div class="form-group">
							<label for="">Email</label>
							<input type="email" class="form-control" id="adminemail" value="<?= $value1['email']?>" name="email" placeholder="@gmail.com">
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

	<div class="themthanhcong">
		<i class="fas fa-check"></i>
		<p>Thêm thành công</p>
	</div>

	<div class="editthanhcong">
		<i class="fas fa-check"></i>
		<p>Chỉnh sửa thành công</p>
	</div>
	
	<div class="xoathanhcong">
		<i class="fas fa-check"></i>
		<p>Xóa thành công</p>
	</div>

	<script type="text/javascript" >
		$(document).ready(function() {
			$(document).on('click', '.sign_out', function(event) {
				event.preventDefault();
				window.location = "http://localhost:81/Project3/Home_C/Login";
			});
		});
	</script>
</body>
</html>