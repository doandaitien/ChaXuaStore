<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Thông tin hóa đơn</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/Bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>vendor/CSS/bill.css">
</head>
<body>
    <?php 
           $OID=(int)$OID;
            $sql="select * from orders where OID=".$OID;
            $order=$this->db->query($sql)->row(); 
    ?>
    <div class="container khungbill">
        <div class="row">
            <div  class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <a  href="<?php echo base_url();?>Home_C"><img src="<?php echo base_url(); ?>vendor/Image/logo.png" alt="" width="100px" height="100px"></a>
            </div>
            <div  class="col-xs-6 col-sm-6 col-md-6 col-lg-6 toright">
                <span>Invoice: #OD<?=$OID?></span><br>
                <span>Created: <?php echo $order->time ?></span><br>
                <span> Statement: order</span>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <span class="store">ChaXua Store</span><br>
                <span>Số 1 Đại Cồ Việt</span><br>
                <span> Contact us: 0987042556</span>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 toright">
                <span> Customer's phone number: <?php echo $order->phonecontact ?></span><br>
                <span>Address: <?php echo $order->addrcus ?></span><br>
                <span> Note: <?php echo $order->note?></span>
            </div>
        </div>

        <div class="row rt tb payment">
                <span>PM: <?php echo $order->typepay?></span>
        </div>
        <div class="row rt tb borderbot bordertop">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 xocdoc">
                <span>Item</span>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 xocdoc">
                <span>Amount</span>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 xocdoc">
                <span>Món thêm</span>
            </div>
            
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 xocdoc">
                <span>Đơn giá </span>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 ">
                <span>Thành tiền</span>
            </div>
        </div>

        <?php $sql="select * from product_order where OID=".$OID;
                $result=$this->db->query($sql)->result_array();
                foreach($result as $key => $value):
                    $PID=$value['PID'];
                    $sql="select * from product where PID=".$PID;
                    $item=$this->db->query($sql)->row();

                    $POID=$value['POID'];
                    
                    $amount=$value['amount'];
                    $price=$item->price;

                ?>
        <!-- item -->
        <div class="row item borderbot bordertop">
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 xocdoc">
                <span><?php echo $item->proname; ?></span>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 xocdoc">
                <span>x <?php echo $amount ?></span>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 xocdoc">
                <span></span>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 xocdoc">
                <span><?php echo $price?> đ</span>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 ">
                <span><?php echo $value['totalpriceItem']?> đ</span>
            </div>
        </div>

        <!-- độ ngọt -->
        <div class="row">
            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 xocdoc">
               
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 xocdoc">
               <span class="add"><?php echo $value['sugar']?></span>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 xocdoc">
                <span>0 đ</span>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 ">
                
            </div>
        </div>

        <!-- đá -->
        <div class="row">
            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 xocdoc">
               
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 xocdoc">
               <span class="add"><?php echo $value['ice']?></span>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 xocdoc">
                <span>0 đ</span>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                
            </div>
        </div>

        <?php $sql="select TID from topping_order where POID=".$POID;
            $arrayTID=$this->db->query($sql)->result_array();
            foreach($arrayTID as $key=> $valueTID):
                $sql="select * from topping where TID=".$valueTID['TID'];
                $topping=$this->db->query($sql)->row();
               
                
              
        ?>
        <!-- topping -->
        <div class="row">
            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 xocdoc">
               
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 xocdoc">
               <span class="add">+ <?php echo $topping->name;?></span>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 xocdoc">
                <span><?php echo $topping->price;?> đ</span>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                
            </div>
        </div>
            <?php endforeach?>
            <?php endforeach?>

        <!-- tạm tính -->
        <div class="row bordertop">
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 ">
               
            </div>
            
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 ">
                <span>Tạm tính:</span>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <span><?php echo $order->totalprice;?> đ </span>
            </div>
        </div>

        <!-- giảm giá -->
        <div class="row">
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 ">
               
            </div>
            
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 ">
                <span>Giảm giá: </span>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <span><?php echo $order->km;?> đ </span>
            </div>
        </div>

        
        <!-- tổng giá -->
        <div class="row">
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 ">
               
            </div>
            
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 ">
                <span>Tổng giá: </span>
            </div>
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <span><?php echo $order->totalpriceafter;?> đ </span>
            </div>
        </div>
        
    </div>
</body>
</html>    
       
          
            
            
       
      
