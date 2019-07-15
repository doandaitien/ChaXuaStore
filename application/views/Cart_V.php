<!DOCTYPE html>
<html lang="en" style="height: auto;">
	<head>
		<meta charset="UTF-8">
		<title>Giỏ hàng</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<!-- load jquery -->
		<script type="text/javascript" src="<?php echo base_url(); ?>vendor/JS/jquery-3.3.1.min.js"></script>
		<!-- load bootstrap  -->
		<script type="text/javascript" src="<?php echo base_url(); ?>vendor/Bootstrap/js/bootstrap.min.js"></script>
		<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/Bootstrap/css/bootstrap.min.css"> -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		
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

		<!-- <script type="text/javascript" src="<?php echo base_url(); ?>vendor/Carousel/jquery.min.js"></script> -->
		<script type="text/javascript" src="<?php echo base_url(); ?>vendor/Carousel/owl.carousel.min.js"></script>
		<!-- https://place-hold.it/1900x700 -->
		<!-- load file dinh kem -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/CSS/giohang.css">
		<script type="text/javascript" src="<?php echo base_url(); ?>vendor/JS/giohang.js"></script>

		<!-- checkbox -->
		
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/slick-master/slick/slick.css">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/slick-master/slick/slick-theme.css">

		<script type="text/javascript" src="<?php echo base_url(); ?>vendor/slick-master/slick/slick.js"></script>

		<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pretty-checkbox@3.0/dist/pretty-checkbox.min.css">

		<!-- jQuery Modal -->
		<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script> -->
		<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" /> -->
	</head>
	<body>
		<div class="ndgiohang">
			<div class="container">
				<div class="row ">
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
						<span class="tieude">GIỎ HÀNG</span>
						<span class="sl">
						<?php if(isset($_COOKIE["cart"])) {
							$cart=json_decode($_COOKIE['cart'], true);
							echo "(".count($cart)." sản phẩm)";
						}
						else {
							echo "(0 sản phẩm)";
						} ?>
						</span>
					</div>
					<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
						<div>
							<a href="<?php echo base_url();?>Home_C"><span class="btn btn-warning ttms2">Tiếp tục mua sắm</span></a>
						</div>
						</div>	
				</div>

				<div class="row">
					<?php $totalprice=0;
					if(!isset($_COOKIE["cart"])) {?>
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<div class="nentrang text-center">
								<span class="kocosp">Không có sản phẩm nào trong giỏ hàng của bạn.</span>
								<a href="<?php echo base_url();?>Home_C"><span class="btn btn-warning ttms">Tiếp tục mua sắm</span></a>
							</div>
						</div> 
					<?php }else { 
					$cart=json_decode($_COOKIE["cart"], true);?>
					<!-- nội dụng giỏ hàng -->
					 <div class="noidunggiohang">
					</div> 
					<?php foreach ($cart as $key=>$value):
						$grouptopping=$key; //phân biệt topping giữa các sản phẩm trong giỏ hàng
						$sql = "select * from product where PID = ".$value."";
						$row = $this->db->query($sql)->row();
						$totalprice+=$row->price;?>
						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 khungsp">
							<div class="row _1sp">
								<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 anh_tensp_xoa">
									<div class="row">
										<p class="image">
											<img src="<?php echo $row->URL_IMG ?>" width="160" height="160" class="img-responsive">
										</p>
									</div>
									<div class="row text-center">
										<div class="ten"><?php echo $row->proname?></div>
									</div>
									<div class="row text-center">
										<?php $intkey=(int)$key; ?>
										<a href="<?php echo base_url();?>Home_C/removeFromCartC/<?= $intkey ?>" title="Xóa" class="xoasp"><i class="fa fa-times" aria-hidden="true"></i></a>
									</div>
								</div>
								<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 add_topping">
									<div class="row">
									<span id="<?=$grouptopping?>" style="display: none;"><?= $value['PID'] ?></span>
									<?php 
									//các sản phẩm có topping
									if($row->GID=="tstt"||$row->GID=="tsvhq"||$row->GID=="thq"){
									$sql = $this->db->get('topping');
									$toppings = $sql->result_array();
									foreach ($toppings as $key=>$value):?>
										<div class="_1add_topping">
											<div class="pretty p-default p-round">
												<input type="checkbox" class="<?=$grouptopping?> " name="<?=$value['TID']?>" value="<?=$value['price']?>"/>
												<div class="state p-success-o">
													<?php $price=$value["price"]/1000;?>
													<label class="pricetopping"><?= $value["name"]." ".$price."K"?></label>
												</div>
											</div>
										</div>
									<?php endforeach ?>
									<?php }?>
									</div>
								</div>
								<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 ">
									<div class="row ">
										<select class="sugar form-control" id="sugar<?=$grouptopping?>">
											<option value="100">100% vị ngọt</option>
											<option value="70">70% vị ngọt</option>
											<option value="50">50% vị ngọt</option>
											<option value="30">30% vị ngọt</option>
											<option value="30">không đường</option>
										</select>
									</div>
									
									<div class="row giatien_catopping<?=$grouptopping?> giatien_catopping">
									<?php echo $row->price." đ" ?>
									</div>
								</div>
								<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 ">
									<div class="row ">
										<select class="ice form-control" id="ice<?=$grouptopping?>">
											<option value="100">100% đá</option>
											<option value="70">70% đá</option>
											<option value="50">50% đá</option>
											<option value="30">30% đá</option>
											<option value="30">không đá</option>
										</select>
									</div>

									<div class=" row qty">
										<span class="minus minus<?=$grouptopping?> bg-dark">-</span>
										<div class="quantity<?=$grouptopping?> count" >1</div>
										<span  class="plus plus<?=$grouptopping?> bg-dark">+</span>
									</div>

								</div>
							</div>
						</div>
						<?php endforeach ?>
						<?php }  ?>	  
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 khungtt">
							<div class="row diachi">
								<span>Địa chỉ giao hàng: </span>
							</div>

							<div class="row ">
								<textarea id="diachi" class="nhapdiachi form-control" ></textarea>
							</div>

							<div class="row">
							<small class ="warning1" >Vui lòng nhập địa chỉ !</small>
							</div>

							<div class="row sdt">
								<span>Số điện thoại liên hệ: </span>
							</div>

							<div class="row ">
								<input type="text" id="sdt" class="nhapsdt form-control">
							</div>

							<div class="row">
							<small class ="warning2">Vui lòng nhập số điện thoại !</small>
							</div>

							<div class="row ghichu">
								<span>Ghi chú : </span>
							</div>

							<div class="row ">
									<textarea id="ghichu" class="nhapghichu form-control" placeholder="thời gian nhận hàng,..."></textarea>
							</div>

							<div class="row code">
								<span>Nhập mã khách hàng (nếu có) : </span>
							</div>

							<div class="row ">
								<input type="text" id="code" class="nhapcode form-control" placeholder="số điện thoại đã đăng ký">
								<button class="btn btn-success xacnhancode">Xác nhận</button>
							</div>

							<div class="row httt">
								<span>Hình thức thanh toán : </span>
							</div>

							<div class="row httt2">
								<form>
									<div class="radio">
									<label><input type="radio" id="pay1" name="optradio" checked>Thanh toán khi nhận hàng</label>
									</div>
									<div class="radio">
									<label><input type="radio" id="pay2" name="optradio">Thanh toán qua thẻ ngân hàng</label>
									</div>
								</form>
							</div>

							<div class="row tamtinh">
									<span>Tạm tính:</span>
									<strong class="tamtinh2"><?php echo $totalprice?>&nbsp;₫</strong>
							</div>

							<div class="row giamgia">
									<span>Giảm giá:</span>
									<strong class="giamgia2">-0&nbsp;₫</strong>
							</div>

							<div class="row thanhtien">
								<span>Thành tiền :</span>
								<div class="amount">
									<p>
										<strong class="thanhtien2"><?php echo $totalprice?>&nbsp;₫ </strong>
									</p>
									<p class="text-right">
										<small>(Đã bao gồm VAT)</small>
									</p>
								</div>
							</div>

							<div class="row thtt">
								<div class="btn btn-large btn-block btn-danger btn-checkout xndh">XÁC NHẬN ĐẶT HÀNG</div>
							</div>
							


						</div>
				</div>
				<!-- end ndgiohang -->
			</div>
		</div>
		
		<div class="thanhcong">
			<div class="icontick"><i class="fa fa-check" aria-hidden="true"></i></div>
			<p class="tc">Bạn đã đặt hàng thành công!</p>
		</div>

		 <!-- Modal -->
		 <div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog">
			
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div><div >Số điểm của khách hàng</div> <div class="point" style="color:coral"></div></div>
				</div>
				<div class="modal-body">
				<p>Nhập vào số điểm muốn sử dụng</p>
				<div>
					<input type="text" class="form-control pointUse" name="pointUse">
					<button type="submit" class="btn btn-default submitPoint "  data-dismiss="modal" style="background-color: greenyellow">Submit</button>
				</div>
				</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal" style="background-color: cornflowerblue">Close</button>
				</div>
			</div>
			
			</div>
		</div>
		
		
		<script type="text/javascript">
			$(document).ready(function() {
				
				//duyệt toàn bộ các checkbox và +,-
				<?php if(isset($_COOKIE["cart"])) {
				$cart=json_decode($_COOKIE["cart"], true);
				foreach ($cart as $key=>$value):?>
					//xử lý khi checkbox được chọn or bỏ chọn
					$("input:checkbox.<?=$key?>").click(function() {
						//lấy số tiền hiện tại
						var price = $('.giatien_catopping<?=$key?>');
						price = price[0].innerText;
						mang = price.split(" ");
						priceadd=parseInt(mang[0]);
						
						//lấy số lượng hiện tại
						var quantity=$('.quantity<?=$key?>');
						quantity=quantity[0].innerText;
						quantity=parseInt(quantity);

						if($(this).is(":checked")){
							add=$(this).val();
							add=parseInt(add);
							add=add*quantity;//lưu ý số lượng hiện tại
							priceadd+=add;
							priceadd=priceadd.toString()+"&nbsp;đ";
							$('.giatien_catopping<?=$key?>').html(priceadd);
						}else{
							add=$(this).val();
							add=parseInt(add);
							add=add*quantity;
							priceadd-=add;
							priceadd=priceadd.toString()+"&nbsp;đ";
							$('.giatien_catopping<?=$key?>').html(priceadd);
						}
						tinhtongtien();
							
					}); 

					//xử lý button -
					$('.minus<?=$key?>').click(function(event) {
						event.preventDefault();
						var quantity=$('.quantity<?=$key?>');
						quantity=quantity[0].innerText;
						quantity=parseInt(quantity);
						
						if(quantity == 1){
							
						}else{
							var price = $('.giatien_catopping<?=$key?>');
							price = price[0].innerText;
							mang = price.split(" ");
							price=parseInt(mang[0]);
							priceminus=price/quantity;
							price=price-priceminus;
							quantity -=1;
							$('.quantity<?=$key?>').html(quantity);
							price=price.toString()+"&nbsp;đ";
							$('.giatien_catopping<?=$key?>').html(price);
							tinhtongtien();
						}
					});

					//xử lý button +
					$('.plus<?=$key?>').click(function(event) {
						event.preventDefault();

						//lấy số lượng hiện có
						var quantity=$('.quantity<?=$key?>');
						quantity=quantity[0].innerText;
						quantity=parseInt(quantity);

						//lấy giá tiền hiện tại
						var price = $('.giatien_catopping<?=$key?>');
						price = price[0].innerText;
						mang = price.split(" ");
						price=parseInt(mang[0]);

						//tính toán số tiền mới 
						priceadd=price/quantity;
						price+=priceadd;

						//hiển thị số lượng mới và số tiền mới
						quantity +=1;
						$('.quantity<?=$key?>').html(quantity);
						price=price.toString()+"&nbsp;đ";
						$('.giatien_catopping<?=$key?>').html(price);
						tinhtongtien();
					});
				<?php endforeach ?>
				<?php }?>

				function tinhtongtien() { 
					var total=0;
					var a=$('.sugar');
					var b=$('.giatien_catopping');

					//dựa vào số class .sugar có trong giỏ hàng, làm bằng foreach dựa theo $key không được
					for (var i = 0; i < a.length; i++) {
						var k = parseInt(b[i].innerText);
						total+=k;
					}

					var giamgia=$('.giamgia2').html();
					giamgia=parseInt(giamgia);
					console.log("giamgia: "+giamgia);
					var thanhtien=total-giamgia;
					total=total.toString()+" ₫";
					$('.tamtinh2').html(total);
					$('.thanhtien2').html(thanhtien);
				}

				//xử lý button xác nhận thanh toán
				$('.xndh').click(function(event){
					event.preventDefault;
					var diachi=document.getElementById("diachi").value; 
					var sdt=document.getElementById("sdt").value; 
					var ghichu=document.getElementById("ghichu").value; 
					var code=document.getElementById("code").value; 
					var pay="";
					var statement="";
					var tamtinh=parseInt($('.tamtinh2')[0].innerText); 
					var giamgia=parseInt($('.giamgia2')[0].innerText); 
					var thanhtien=parseInt($('.thanhtien2')[0].innerText); 
					if(tamtinh==0){
						alert("Không có sản phẩm trong giỏ hàng!")
					}else{
					if(diachi==''){
						$('.warning1').addClass('hienra');
					}
					if(sdt==''){
						$('.warning2').addClass('hienra');
					}
					if(diachi!=''&&sdt!=''){
						//xử lý trường hợp thanh toán khi nhận được hàng
						if($('#pay1').is(":checked")){
							pay="Thanh toán khi nhận hàng";
							statement="Order";
							$.ajax({
								//thêm dữ liệu vào bảng orders
								url: '<?php echo base_url(); ?>Home_C/addOrderC',
								type: 'POST',
								dataType: 'json',
								data: {addrcus:diachi, phonecontact:sdt, note: ghichu, code:code, typepay:pay,statement:statement, totalprice:tamtinh, km:giamgia, totalpriceafter:thanhtien},
								success: function(OID){  
									//thêm dữ liệu vào bảng product_order
									OID=parseInt(OID);
									<?php if(isset($_COOKIE["cart"])) {
									$cart=json_decode($_COOKIE["cart"], true);
									foreach ($cart as $key=>$value):?>
										var PID=<?=$value?>;
										var e = document.getElementById("sugar<?=$key?>");
										var sugar = e.options[e.selectedIndex].text;
										e = document.getElementById("ice<?=$key?>");
										var ice = e.options[e.selectedIndex].text;
										var qty=$('.quantity<?=$key?>')[0].innerText;
									 	qty=parseInt(qty);
										var totalpriceItem=$('.giatien_catopping<?=$key?>')[0].innerText;
										totalpriceItem=parseInt(totalpriceItem);
										$.ajax({
											async: false,
											url: '<?php echo base_url(); ?>Home_C/addProductOrderC',
											type: 'POST',
											dataType: 'json',
											data: {PID:PID, OID:OID, sugar:sugar, ice:ice, amount:qty, totalpriceItem:totalpriceItem},
											//thêm dữ liệu vào bảng topping_order
											success:function(POID){
												var POID=parseInt(POID);
												//duyệt các checkbox được tick lấy TID
												$.each($("input:checkbox.<?=$key?>:checked"),function(){            
													var TID=$(this).attr("name");
													TID=parseInt(TID);
													console.log(TID,POID);
													$.ajax({
														async: false,
														url: '<?php echo base_url(); ?>Home_C/addToppingProductOrderC',
														type: 'POST',
														dataType: 'json',
														data: {POID:POID, TID:TID}
													})
												});
											}
										})
									<?php endforeach ?>
									<?php }?>
										console.log(OID);
										
									//chuyển sang trang hóa đơn
									var url="Home_C/BillV/"+OID;
									window.location= "<?php echo base_url(); ?>"+url;

								}
							})
						}else{
							//xử lý thanh toán qua thẻ ngân hàng
							pay="Thanh toán qua thẻ ngân hàng";
							statement="Đang xử lý";
							$.ajax({
								//thêm dữ liệu vào bảng orders
								url: '<?php echo base_url(); ?>Home_C/addOrderC',
								type: 'POST',
								dataType: 'json',
								data: {addrcus:diachi, phonecontact:sdt, note: ghichu, code:code, typepay:pay, statement:statement, totalprice:tamtinh, km:giamgia, totalpriceafter:thanhtien},
								success: function(OID){  
									//thêm dữ liệu vào bảng product_order
									OID=parseInt(OID);
									<?php if(isset($_COOKIE["cart"])) {
									$cart=json_decode($_COOKIE["cart"], true);
									foreach ($cart as $key=>$value):?>
										var PID=<?=$value?>;
										var e = document.getElementById("sugar<?=$key?>");
										var sugar = e.options[e.selectedIndex].text;
										e = document.getElementById("ice<?=$key?>");
										var ice = e.options[e.selectedIndex].text;
										var qty=$('.quantity<?=$key?>')[0].innerText;
									 	qty=parseInt(qty);
										var totalpriceItem=$('.giatien_catopping<?=$key?>')[0].innerText;
										totalpriceItem=parseInt(totalpriceItem);
										$.ajax({
											async: false,
											url: '<?php echo base_url(); ?>Home_C/addProductOrderC',
											type: 'POST',
											dataType: 'json',
											data: {PID:PID, OID:OID, sugar:sugar, ice:ice, amount:qty, totalpriceItem:totalpriceItem},
											//thêm dữ liệu vào bảng topping_order
											success:function(POID){
												var POID=parseInt(POID);
												//duyệt các checkbox được tick lấy TID
												$.each($("input:checkbox.<?=$key?>:checked"),function(){            
													var TID=$(this).attr("name");
													TID=parseInt(TID);
													console.log(TID,POID);
													$.ajax({
														async: false,
														url: '<?php echo base_url(); ?>Home_C/addToppingProductOrderC',
														type: 'POST',
														dataType: 'json',
														data: {POID:POID, TID:TID}
													})
												});
											}
										})
									<?php endforeach ?>
									<?php }?>

									console.log(OID);
										
									//chuyển sang trang onepay
									var url="Home_C/onepayV/"+OID;
									window.location= "<?php echo base_url(); ?>"+url;

								}
							})
							
						}

					}
					}

				});

				$('.xacnhancode').click(function(){
					var sdt=$('#code').val();
					console.log(sdt);
					$.ajax({
						url: '<?php echo base_url(); ?>Home_C/validateCodeC',
						type: 'POST',
						dataType: 'json',
						data: {sdt:sdt},
						success: function(data){
							$('#myModal').modal();
							$('.point').html(data);
						},
						error: function (jqXHR, textStatus, errorThrown) {
							alert('Mã khách hàng không đúng! Vui lòng thử lại!');
						}
					})
				});

				$('.submitPoint').click(function(){
					var point1=$('.point').html();
					var point2=$('.pointUse').val();
					point1=parseInt(point1);
					point2=parseInt(point2);
					if(point2>0 &&Number.isInteger(point2)){
						if(point2>point1){
							alert("Bạn đã nhập quá số điểm bạn có");
						}else{
							var tamtinh=$('.tamtinh2').html();

							thanhtien=parseInt(tamtinh)-point2*1000;
							$('.thanhtien2').html(thanhtien);

							point2=point2.toString()+"000 ₫";
							$('.giamgia2').html(point2);
							
						}
					}else{
						alert("Bạn nhập không đúng định dạng");
					}
					
				});

				 //bỏ thông báo
				$('#diachi').click(function(event){
					event.preventDefault;
					$('.warning1').removeClass('hienra');
				});

				//bỏ thông báo
				$('#sdt').click(function(event){
					event.preventDefault;
					$('.warning2').removeClass('hienra');
				});

			});

		</script>
		
	</body>
</html>