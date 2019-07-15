<!DOCTYPE html>
<html lang="en">
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 	<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script> -->
 	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
 	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/Css/Admin_qlysp.css">
 	<script type="text/javascript" src="<?php echo base_url(); ?>vendor/Js/Admin_qlysp.js"></script>
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
								<a href="<?php echo base_url(); ?>Admin/quanLySP" class="menuchinh visitted" >
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
			<!-- phần nội dung -->
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
					<!-- phần tab-list -->
					<div class="container">
						<div class="row main-content"> 
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 tieude">
								<h2>Danh sách sản phẩm</h2>
								<div class="button-add">
									<a href="#myModal" id="menu-add" class="btn btn-default portfolio-link" data-toggle="modal"><i class="fas fa-plus"></i>Thêm mới</a>
								</div>
							</div>
							<!-- Nav tabs -->
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 list-tab">
								<ul class="nav nav-tabs">
									<?php foreach ($category as $key => $value) :?>							
									<li><a data-toggle="tab" href="#<?=$key?>"><?= $value['categories']?></a></li>
									<?php endforeach ?>
								</ul>
							</div>
							<?php unset($key); ?>
							<?php unset($value); ?>
							<!-- end phần nav tabs -->
							
							<!-- phần tab-content -->
							<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
								<!-- Tab panes -->
								<div class="tab-content">
									<?php foreach ($category as $key => $value) :?>
										<div id="<?=$key?>" class="tab-pane fade">
											<div class="row text-center">
											<?php foreach ($dulieusanpham as $key1 => $value1) :?>
												<?php if(strcmp($value1['categories'], $value['categories']) == 0): ?>
													<!-- 1 sản phẩm -->
										    		<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4 dsbaihat">
														<div class="_1sp">
															<div class="avt">
																<img src="<?= $value1['URL_IMG']?>" alt="" class="img-responsive">
															</div>
															<div class="thongtin">
																<div class="tensp"><?= $value1['proname']?></div>
																<div class="gt"><?= $value1['price']?></div>
															</div>
															<div class="nut">
																<a href="#editModal" class="btn btn-default edit" title="<?php echo $key.' '.$value1['PID']?>" data-toggle="modal">Chỉnh sửa <i class="fas fa-pencil-alt"></i> </a>
																<a class="btn btn-default delete">Xóa <i class="fas fa-times"></i></a>
															</div>
														</div>
													</div>
													<!-- end 1 sản phẩm -->
												<?php endif ?>
											<?php endforeach ?>
											</div>
										</div>
									<?php endforeach ?>
									
								</div>
								<!-- end tab panes -->
								<!-- phần chỉnh sửa sản phẩm -->
								<div id="editModal" class="modal fade" role="dialog">
								  	<div class="modal-dialog">
								    <!-- Modal content-->
									    <div class="modal-content">
									      	<div class="modal-header">
										        <button type="button" class="close" data-dismiss="modal">&times;</button>
										        <h4 class="modal-title text-center">Chỉnh sửa sản phẩm</h4>
									      	</div>
									      	<div class="modal-body">			      		
									        	<form action="" role="form" method="POST" id="editForm">
													<div class="form-group">
														<label for="">Tên sản phẩm</label>
														<input type="text" class="form-control" id="namep" name="tensp" placeholder="Enter name">
													</div>
													<div class="form-group">
														<label for="">Giá tiền</label>
														<input type="text" class="form-control" id="price" name="gt" placeholder="Enter name">
													</div>
													<div class="form-group">
									        				<label for="">Ảnh</label>
									        				<input type="file" class="form-control" id="avtp" name="avt" placeholder="Choose image">
									        		</div>
													<div class="form-group">
								        				<label class="control-label" for="company">Categories</label>
														<select id="company" class="form-control" name="category">
														    <option>TRÀ ĐÀI LOAN NGUYÊN CHẤT</option>
														    <option>TRÀ SỮA TRUYỀN THỐNG</option>
														    <option>TRÀ SỮA VỊ HOA QUẢ</option>
														    <option>TRÀ HOA QUẢ</option>
														    <option>ĐÁ XAY</option>
														    <option>HOA QUẢ TƯƠI</option>
														    <option>CÀ PHÊ</option>
															<option>SỮA CHUA</option>
														    <option>SPECIALS FOR WINTER</option>
														    <option>FRESH MILK</option>
														</select> 
											        </div>
											        <button type="submit" class="btn btn-primary" id="submit_edit">Chỉnh sửa</button>
												</form>
									      	</div>
									      	<div class="modal-footer">
									        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									      	</div>
									    </div>
								  	</div>
								</div>
								<!-- end phần chỉnh sửa sản phẩm -->
							</div>
							<!-- end phần tab-content -->
						</div>
					</div>
					<!-- end phần tab-list -->
				</div>
				<!-- end phần sản phẩm -->
			</div>
			<!-- end phần nội dung -->
		</div>
	</div>
	<!-- Phần thêm mới sản phẩm -->
	<div id="myModal" class="modal fade" role="dialog">
	  	<div class="modal-dialog">
	    <!-- Modal content-->
		    <div class="modal-content">
		      	<div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title text-center">Thêm mới sản phẩm</h4>
		      	</div>
		      	<div class="modal-body">			      		
		        	<form role="form" method="POST" id="addForm">
						<div class="form-group">
							<label for="">Tên sản phẩm</label>
							<input type="text" class="form-control" id="tensp" name="tensp" placeholder="Enter name" minlength="4" required>
						</div>
						<div class="form-group">
							<label for="">Giá tiền</label>
							<input type="text" class="form-control" id="gt" name="gt" placeholder="Enter name" required>
						</div>
						<div class="form-group">
	        				<label for="">Ảnh</label>
	        				<input type="file" class="form-control" id="avt" name="avt" placeholder="Choose image">
		        		</div>
						<div class="form-group">
	        				<label class="control-label" for="company1">Categories</label>
							<select id="company1" class="form-control" name="category">
							    <option>TRÀ ĐÀI LOAN NGUYÊN CHẤT</option>
							    <option>TRÀ SỮA TRUYỀN THỐNG</option>
							    <option>TRÀ SỮA VỊ HOA QUẢ</option>
							    <option>TRÀ HOA QUẢ</option>
							    <option>ĐÁ XAY</option>
							    <option>HOA QUẢ TƯƠI</option>
							    <option>CÀ PHÊ</option>
							    <option>SỮA CHUA</option>
							    <option>SPECIALS FOR WINTER</option>
							    <option>FRESH MILK</option>
							</select> 
				        </div>
				        <button type="submit" class="btn btn-primary" id="submit_add">Thêm mới</button>
					</form>
		      	</div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      	</div>
		    </div>
	  	</div>
	</div>
	<!-- end phần thêm mới sản phẩm -->

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