<?php
	include'./inc/header.php';
	// include'./inc/slider.php';
?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $quantity = $_POST['quantity'];
    $catID = $_POST['catID'];
    $update_quantity_cart = $ct->update_quantity_cart($quantity,$catID);
}
?>
<?php
    if(isset($_GET['delete'])){
        $catID=$_GET['delete'];
    	$delete = $ct->delete_quantity_cart($catID);
        }
?>
<?php
if(!isset($_GET['id'])){
	echo "<meta http-equiv='refresh' content='0;URL=?id=live'";
}
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
		    	<h2>Giỏ hàng</h2><?php
			    	if(isset($update_quantity_cart)){
			    		echo $update_quantity_cart;
			    	}
			    	?>
			    	<?php
	                if(isset($delete)){
	                    echo $delete;
	                }
	                ?>   
					<table class="tblone">
							<tr>
								<th width="20%">Tên sản phẩm</th>
								<th width="10%">Ảnh</th>
								<th width="15%">Giá</th>
								<th width="25%">Số lượng</th>
								<th width="20%">Thành tiền</th>
								<th width="10%">Hành động</th>
							</tr>
							<?php
							$get_product_cart = $ct->get_product_cart();
							if($get_product_cart){
								$tongcong=0;
								$sl=0;
								while($result_product_cart=$get_product_cart->fetch_assoc()){			
							?>
							<tr>
								<td><?php echo $result_product_cart['productName']?></td>
								<td><img src="admin/uploads/<?php echo $result_product_cart['image']?>" width="200" height="200"></td>
								<td><?php echo $fm->format_tien($result_product_cart['price']) ?> đ</td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="catID" value="<?php echo $result_product_cart['catID']?>"/>
										<input type="number" name="quantity" min="0" value="<?php echo $result_product_cart['quantity']?>"/>
										<input type="submit" name="submit" value="Cập nhật"/>
									</form>
								</td>
								<td><?php
								$tong= $result_product_cart['quantity']*$result_product_cart['price'];
								echo $fm->format_tien($tong)." đ";
								?></td>
								<td><a onclick="return confirm ('Bạn có muốn xóa không?')" href="?delete=<?php echo $result_product_cart['catID'] ?>">Xóa</a></td>
							</tr>
							<?php
							$tongcong+=$tong;						
							$sl+=$result_product_cart['quantity'];
							}
						}
							?>					
						</table>
						<table style="float:right;text-align:center;" width="27%">
							<tr>
								<?php
								$check_cart=$ct->check_cart();
								if($check_cart){
								?>
								<th>Số lượng:
									<?php
									echo $sl;
									Session::set('sl',$sl);
								?>
								</th>
								<th>Tổng cộng:</th>
								<td>
									<?php
									echo  $fm->format_tien($tongcong)." đ";
									Session::set('tongcong',$tongcong);
									?>
								</td>
									<?php }else{
									echo'Giỏ hàng trống';
									}		
									?>
							</tr>
					   </table>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="login.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
 <?php
 	include'./inc/footer.php';
 ?>