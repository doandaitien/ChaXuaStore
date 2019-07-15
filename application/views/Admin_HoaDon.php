<!DOCTYPE html>
<html lang="en">
<head>
	<title>Quản lý hóa đơn</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
 	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/Css/Admin_HoaDon.css">
 	<script type="text/javascript" src="<?= base_url();?>vendor/Js/Admin_QlyHoaDon.js"></script>
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
								<a href="<?php echo base_url(); ?>Admin/quanLySP" class="menuchinh">
									<i class="fab fa-product-hunt icontrai"></i>
									<span>Quản lý thông tin trà sữa</span>
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>Admin/quanLyThuNgan" class="menuchinh">
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
								<a href="<?php echo base_url(); ?>Admin/quanLyHoaDon" class="menuchinh visitted">
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
						<p class="fot text-center"><i class="fa fa-copyright" aria-hidden="true"></i> Copyright 2018</p>
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
							<h2>Danh sách hóa đơn</h2>
						</div>
						<div class="timkiem">
							<input class="form-control" id="search-key" type="text" placeholder="Nhập mã hóa đơn" aria-label="Search" name="key">
							<button class="btn btn-default" type="submit" id="search">
								<i class="fa fa-search" aria-hidden="true"></i>
							</button>
						</div>
						<!-- phần danh sách hóa đơn -->
						<div class="danhsachhoadon">
							<table class="table">
								<thead class="header">
									<tr>
										<th>Mã hóa đơn</th>
										<th>Thu ngân</th>
										<th>Thời gian</th>
										<th class="right">Tổng tiền hàng</th>
									</tr>
								</thead>
								<tbody class="body">
									<?php if($sotrang != 0) { ?>
									<tr>
										<td></td>
										<td></td>
										<td></td>
										<td align="right"><?= number_format($tongtienhang)?></td>
									</tr>
									<?php foreach ($dulieuhoadon as $key => $value) :?>
									<tr class="hoadon">
										<td>HD<?= $value['BID']?></td>
										<td><?= $value['userid']?></td>
										<td><?= $value['time']?></td>
										<td align="right"><?= number_format($value['totalprice'])?></td>
									</tr>
									<!-- chi tiết đơn hàng -->
									<tr class="chitietdonhang" >
										<td colspan="4">
											<div class="tieude">
												<h3>Chi tiết đơn hàng</h3>
											</div>
											<div class="chitiet form-wrapper">
												<div class="row">
													<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
														<div class="form-group form-control">
															<label for="" class="form-label control-label ">Mã hóa đơn:</label>
															<strong>HD<?= $value['BID']?></strong>
														</div>
														<fieldset disabled>
															<div class="form-group form-control">
																<label for="disabledInput" class="form-label control-label ">Thời gian:</label>
																<strong><?= $value['time']?></strong>
															</div>
														</fieldset>
														<div class="form-group form-control">
															<label for="" class="form-label control-label ">Khách hàng:</label>
															<strong><?= $value['phone']?></strong>
														</div>
														<?php if($value['phonecontact'] != ''): ?>
															<div class="form-group form-control">
																<label for="" class="form-label control-label ">Số DT:</label>
																<strong><?= $value['phonecontact']?></strong>
															</div>
														<?php endif ?>
													</div>
													<div class='col-xs-6 col-sm-6 col-md-4 col-lg-4'>
														<?php if($value['addrcus'] != ''): ?>
															<div class="form-group form-control">
																<label for="" class="form-label control-label ">Địa chỉ:</label>
																<strong><?= $value['addrcus']?></strong>
															</div>
														<?php endif ?>
														<div class="form-group form-control">
															<label for="" class="form-label control-label ">Người bán:</label>
															<strong><?= $value['username']?></strong>
														</div>
														<div class="form-group form-control">
															<label for="" class="form-label control-label ">Ca trực:</label>
															<strong><?= $value['location']?></strong>
														</div>
														<div class="form-group form-control">
															<label for="" class="form-label control-label ">Thanh toán:</label>
															<strong><?= $value['typepay']?></strong>
														</div>
													</div>
													<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
														<div class="form-group">
									        				<textarea class="bl" rows="5" cols="5" name="des" placeholder="ghi chú..."></textarea>
															<p class="help-block text-danger"></p>
															
												        </div>
													</div>
													<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 dssanpham">
														<table class="table">
															<thead class="header">
																<tr>
																	<th>Mã sản phẩm</th>
																	<th>Tên sản phẩm</th>										
																	<th class="right">Số lượng</th>
																	<th class="right">Giá</th>
																	<th class="right">Topping</th>
																	<th class="right">Thành tiền</th>
																</tr>
															</thead>
															<tbody class="body">
																<?php foreach( $dulieusanpham[$key] as $key1 =>$value1):?>
																<tr>
																	<td><?= $value1['PID']?></td>
																	<td><?= $value1['proname']?></td>
																	<td align="right"><?= $value1['quantity']?></td>
																	<td align="right"><?= number_format($value1['price'])?></td>
																	<td align="right"><?= $value1['namet']?></td>
																	<td align="right"><?= number_format($value1['amount'])?></td>
																</tr>
																<?php endforeach ?>
															</tbody>
														</table>
													</div>
													<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
														
													</div>
													<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
														
													</div>
													<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
														<div class="form-wrapper">
															<div class="table-responsive">
																<table class="table" cellspacing="0" cellpadding="0">
																	<tbody>
																		<tr>
																			<td align="right">Tổng số lượng:</td>
																			<td align="right"><?= $value['sumQuantity']?></td>														
																		</tr>
																		<tr>
																			<td align="right">Tổng tiền hàng:</td>
																			<td align="right"><?= number_format($value['totalprice'])?></td>
																		</tr>
																		<tr>
																			<td align="right">Sử dụng tiền tích lũy:</td>
																			<td align="right"><?= number_format($value['tientichluy'])?></td>
																		</tr>
																		<tr>
																			<td align="right">Khách cần trả:</td>
																			<td align="right"><?= number_format($value['totalprice'] + $value['tientichluy'])?></td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</div>
													</div>					
												</div>
												<!-- phần nút bấm -->
												<div class="nut">
													<p class="BID" hidden="true"><?= $value['BID']?></p>
													<a href="" class="btn btn-default print">In<i class="fas fa-print"></i></a>
													<a class="btn btn-default delete">Hủy<i class="fas fa-times"></i></a>
												</div>
												<!-- end phần nút bấm -->
											</div>
										</td>
									</tr>
									<!-- end phần chi tiết đơn hàng -->
									<?php endforeach ?>
									<?php } else { ?>
									<tr class="text-center">
										<td colspan="4"><h3>Không có hóa đơn cần Kiểm duyệt</h3></td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<!-- end phần danh sách hóa đơn -->
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
	<div class="xoathanhcong">
		<i class="fas fa-check"></i>
		<p>Xóa thành công</p>
	</div>\
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