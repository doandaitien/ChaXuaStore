<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>THU NGÂN</title>
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
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/Css/thungan.css">
	
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Js/thungan.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Js/keyboard.js"></script>
	
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Js/tab_ui.js"></script>
	
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Js/thungan_ng.js"></script>
	<script type="text/javascript" src="<?= base_url(); ?>vendor/Js/thanhtoan_ajax.js"></script>
</head>
<body>
	<?php 
	if(isset($this->session->userdata['user_username'])){
		
	}
	else{
		redirect('http://localhost:81/Home_C');
	}
	?>
	<div class="header-right">
		<ul>
			<li title="ON/OFF PRINT" class="li_print" data-print=true><a href=""><i class="fa fa-print"></i></a></li>
			<li><div class="tenthungan"><?php echo $this->session->userdata['user_username']; ?></div></li>
			<li hidden="true"><div class="AID">50</div></li>
			<li class="dangxuat"><a href=""><i class="fa fa-sign-out"></i></a></li>
		</ul>
	</div>

	<div id="tabs">

		<ul>
			<li><a href="#tabs-1" class="tieude_tab">Hóa đơn 1</a> <i class="fa fa-times ui-icon-close-x" role="presentation" aria-hidden="true"></i></li>
			<button id="add_tab" style="margin-top: 2px;">+</button>
		</ul>
		<div id="tabs-1" class="content_tabs">
			<div class="row" style="margin-right: 0;">
				<div class="content-left col-md-9">
					<!-- thông tin -->
					<div class="content-left-top">
						<table class="striped">
							<tbody class="content_body">
								
							</tbody>
						</table>
					</div>
					<div class="congtac"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
					<div class="content-left-bottom">
						<ul class="nav nav-tabs">
							<?php foreach ($categories as $key => $value):?>
								<li class="nav-item tab_sp">
									<a class="nav-link" data-toggle="tab" href="#menu<?= $key ?>"><?= $value["categories"] ?></a>
								</li>
							<?php endforeach ?>

							<li class="nav-item mnTopping">
								<a class="nav-link aTopping" data-toggle="tab" href="#menu_topping">TOPPING
								</a>
							</li>
						</ul>
						<div class="row">
							<!-- Tab panes -->
							<div class="tab-content">
								<?php foreach ($categories as $key => $value):?>
									<div id="menu<?= $key ?>" class="tab-pane container" >
										<div class="row">
											<?php foreach ($product as $key => $value1):?>
												<?php if($value1["categories"] == $value["categories"]){ ?>
													<div class="_1sp_search">
														<div class="thongtindongkhung">
															<div class="pid" hidden="true"><?= $value1["PID"] ?></div>
															<img src="<?= $value1["URL_IMG"] ?>">
															<p class="tien_1sp_search"><?= number_format($value1["price"]) ?></p>
														</div>
														<p class="ten_1sp_search"><?= $value1["proname"] ?></p>
													</div>
													
												<?php }?>
											<?php endforeach ?>
										</div>
									</div>
								<?php endforeach ?>
								<div id="menu_topping" class="container tab-pane fade"><br>
									<div class="row">
										<?php foreach ($topping as $key => $value):?>
											<div class="_1sp_search_tp _1sp_topping">
												<div class="thongtindongkhung">
													<div class="tid" hidden="true"><?= $value["TID"] ?></div>
													<img src="<?= $value["URL_IMG"] ?>">
													<p class="tien_1sp_search"><?= number_format($value["price"]) ?></p>
												</div>
												<p class="ten_1sp_search"><?= $value["name"] ?></p>
											</div>
										<?php endforeach ?>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
				<div class="content-right col-md-3">
					<div class="row hang1">
						<div class="col-md-5">
							<i class="fa fa-user-circle-o" aria-hidden="true"></i>
							<div class="fullnamethungan">Thu ngân 4</div>
						</div>
						<div class="col-md-2"></div>
						<div class="col-md-3 ngaythanhtoan">25/03/2019</div>
						<div class="col-md-2 giothanhtoan">08:47</div>
					</div>
					<div class="row hang2">
						<i class="fa fa-search"></i>
						<input type="" name="" placeholder="Tìm khách hàng" class="timkhachhang" onFocus='this.select()' id="myInput">
						<div class="khachhang" >
							<ul class="danhsachtimthay" id="myUL" style="display: none;">
								<?php foreach ($customer as $key => $value):?>
									<li>
										<div class="ten"><?= $value["name"]; ?></div>
										<div class="thongtin">
											<div class="sdt"><?= $value["phone"]; ?></div>
											<div class="diem">Điểm : <?= floor($value["point"]); ?></div>
											<div class="aid" hidden="true"><?= $value["CID"]; ?></div>
										</div>
									</li>
								<?php endforeach ?>
							</ul>
							<div class="not_found" style="display: none;">
								Không tìm thấy khách hàng phù hợp !
							</div>
						</div>
					</div>
					<div class="row hang2_2" hidden="true">
						<i class="fa fa-user user"></i>
						<div class="khachhanguudai">
							<div class="aid_kh" hidden="true"></div>
							<a href="" title=""></a>
							<b hidden="true"></b>
						</div>
						<i class="fa fa-times times"></i>
					</div>
					<div class="row hang2_3" hidden="true">
						Điểm : 3
					</div>
					<div class="row hang3">
						<div class="hang3_tieude">Hóa đơn</div>
					</div>
					<div class="row hang4">
						<div class="col-md-6 tongtienhang">Tổng tiền hàng</div>
						<div class="col-md-6 pricetongtienhang">0</div>	
					</div>
					<div class="row hang5">
						<div class="col-md-6 giamgia">Giảm giá</div>
						<div class="col-md-6 pricegiamgia">
							<input class="input_giamgia" placeholder="0" onFocus='this.select()' disabled="true"></input>
						</div>
					</div>
					<div class="row hang6">
						<div class="col-md-6 khachcantra">Khách cần trả</div>
						<div class="col-md-6 pricekhachcantra">0</div>
					</div>
					<div class="row hang10">
						<div class="col-md-6 khachthanhtoan">Khách thanh toán <div class="diemtichluy"><i class="fa fa-credit-card" hidden="true"></i></div></div>

						<div class="col-md-6 pricekhachthanhtoan">
							<input class="input_khachthanhtoan" placeholder="0" onFocus="this.select()" disabled="true"></input>
							<div class="tiendungtichluy" hidden="true"></div>
						</div>
					</div>

					<div class="row hang7">
						<div class="col-md-6 tienthuatrakhach">Tiền thừa trả khách</div>
						<div class="col-md-6 pricetienthuatrakhach">0</div>
					</div>
					<div class="row hang8">
						<div class="btn btn-success btn-block">THANH TOÁN</div>
					</div>
					<div class="row hang9">
						<i class="fa fa-phone" aria-hidden="true"></i> Hỗ trợ khách hàng : 0384419922@hust.edu.vn
					</div>
				</div>
			</div>
			<div class="thanhtoantichluy">
				<div class="tl_td">
					<div class="ten_td">Khách thanh toán</div>
					<div class="dongtichluy"><i class="fa fa-window-close-o" aria-hidden="true"></i></div>
				</div>
				<div class="tl_content">
					<div class="thongtintichluy">
						<label>Phone: </label>
						<div class="tl_sdt">0987042556</div>
						<label>| Point: </label>
						<div class="tl_diem">5</div>
					</div>
					<div class="sotiencantra">
						<label>Tiền cần trả</label>
						<input class="input_sotiencantra" value="60,000" disabled="true"></input>
					</div>
					<div class="sotientrutichluy">
						<label>Sử dụng số điểm tích lũy</label>
						<input class="input_sotientrutichluy" placeholder="0"></input>
					</div>
					<div class="sotiencantraconlai">
						<label>Số tiền cần trả còn lại</label>
						<div class="label_tiencantra">0</div>
					</div>
				</div>
				<div class="td_foot">
					<button class="btn btn-success xong">
						<i class="fa fa-check-square"></i> Xong
					</button> 
					<button class="btn btn-default boqua">
						<i class="fa fa-ban"></i> Bỏ qua
					</button>
				</div>
			</div>
			<div class="nendonghoadon">

			</div>
		</div>

	</div>
	
	<div class="donghoadon">
		<div class="tieudedong">
			<div class="tddong">Đóng <b>hóa đơn 2</b></div>
			<div class="huy">
				<i class="fa fa-times close_hoadon" aria-hidden="true"></i>
			</div>
		</div>
		<div class="thongtindonghoadon">
			<div class="thongtinclose">Thông tin của <b>Hóa đơn 2</b> sẽ không được lưu lại. Bạn có chắc chắn muốn đóng không? </div>
			<div class="close_cancel text-right">
				<button class="btn btn-danger btn-confirm" ng-hide="noYes"><i class="fa fa-check-square"></i> Đồng ý</button>
				<button class="btn btn-default btn-cancel"><i class="fa fa-ban"></i> Bỏ qua</button>
			</div>
		</div>
	</div>
	<div class="phieutrong">
		
	</div>
	<div class="thongbaothanhtoankhongthanhcong btn btn-danger btn-block">
		<i class="fa fa-exclamation-triangle canhbao" aria-hidden="true"></i>
		<p class="thongbaoloi">Phiếu hàng đang trống </p>
	</div>
	<div class="thongbaothanhtoanthanhcong btn btn-info btn-block">
		<i class="fa fa-check tich" aria-hidden="true"></i>
		<p class="thongbaoloi">Thanh toán thành công </p>
	</div>
	
	<div class="bill" style="height: auto;" id="printJS-form">
		<div class="container-fluid">
			<!-- <div class="logo"><img src="logo.png"></div> -->
			<div class="tencuahang">ChaXua BK</div>
			<div class="diachicuahang">Số 1, Đại Cồ Việt, Hai Bà Trưng, Hà Nội</div>
			<hr>
			<div class="ngaygioban">
				Ngày bán : <div class="ngaythangnam"></div> <div class="giophut"></div>
			</div>
			<div class="tieude">HÓA ĐƠN BÁN HÀNG</div>
			<div class="hoadonso">HD12346</div>
			<div class="thongtinkhachhang">
				<div class="tenkhachhang">Khách hàng : <div class="tenkhachhangct"></div></div>
				<div class="sodienthoai">Điện thoại : <div class="sodienthoaict"></div></div>
				<div class="diemkhachhang" style="font-size: 12px;">Điểm : <div class="diemkhachhangct"></div></div>
			</div>
			<div class="thongtinthungan">Người bán :<div class="thongtinthunganct"></div></div>
			<table class="table">
				<thead class="thead-light">
					<tr>
						<th>Tên món</th>
						<th>SL</th>
						<th>Đơn giá</th>
						<th>Thành tiền</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
			<div class="thanhtien">
				Tổng tiền hàng : <div class="thanhtienct"></div>
			</div>
			<div class="thanhtoanbangtichluy">
				Tiền dùng điểm lũy : <div class="tichluyct"></div>
			</div>
			<div class="khachtra">
				Tiền khách đưa : <div class="khachtract"></div>
			</div>
			<div class="tienthua">
				Tiền trả lại : <div class="tienthuact"></div>
			</div>
			<!-- <div class="ghichu">
				Ghi chú : Đây là thông tin ghi chú
			</div> -->
			<div class="thongtincuahang text-center">
				Freeship quanh bán kính 200m<br>
				ĐT đặt hàng : 01234567 / Phản ảnh dịch vụ : 76543210 <br>
				Cảm ơn Quý khách & Hẹn gặp lại
			</div>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function() {
			$(document).on('click', '.li_print', function(event) {
				event.preventDefault();
				var status = $(this)[0]['attributes']['data-print']['value'];
				if(status == 'true')
				{
					$(this).attr('data-print', 'false');
					$(this).children('a').children('i').css('color', 'gray');
				}
				else
				{
					$(this).attr('data-print', 'true');
					$(this).children('a').children('i').css('color', 'white');
				}
			});
			var userid = $(".tenthungan")[0].innerText;
			$.ajax({
				url: 'http://localhost:81/Project3/Thungan_controller/getName',
				type: 'POST',
				data: {userid: userid},
				success: function(res)
				{
					$(".AID")[0].innerText = res;
				}
			})

			$.ajax({
				url: 'http://localhost:81/Project3/Thungan_controller/getFullName',
				type: 'POST',
				data: {userid: userid},
				success: function(res)
				{
					$(".fullnamethungan")[0].innerText = res;
				}
			})

			

			$.ajax({
				url: 'http://localhost:81/Project3/Thungan_controller/getLastBill',
				type: 'POST',
				success: function(res)
				{
					$(".hoadonso")[0].innerText = "HD"+(Number(res)+1);
				}
			})

			$(document).on('click', '.dangxuat', function(event) {
				event.preventDefault();
				window.location = "http://localhost:81/Project3/Home_C/Login";
			});

			
		});
	</script>
</body>
</html>