<?php
	include'./inc/header.php';
?>
<?php
   	$login_check = Session::get('cus_login');
   	if($login_check==false){
   		header('Location:login.php');
   	}
?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Thông tin tài khoản</h3>
    		</div>
    		<table class="tblone">
    			<?php
    			$cusID = Session::get('cus_id');
				$getInfo = $cus->getProfile($cusID);
				if($getInfo){
					while($result_getPf = $getInfo->fetch_assoc()){
    			?>
    			<tr>
    				
    				<td>Tên User</td>
    				<td>:</td>
    				<td><?php echo $result_getPf['cusUser'] ?></td>
    			</tr>
    			<tr>
    				
    				<td>Tên người dùng</td>
    				<td>:</td>
    				<td><?php echo $result_getPf['cusName'] ?></td>
    			</tr>
    			<tr>
    				
    				<td>Số điện thoại</td>
    				<td>:</td>
    				<td><?php echo $result_getPf['cusPhone'] ?></td>
    			</tr>
    			<tr>	
    				<td>Địa chỉ</td>
    				<td>:</td>
    				<td><?php echo $result_getPf['cusAdd'] ?></td>
    			</tr>
    			<?php
    					}
    				}
    			?>
    		</table>
    		<div class="clear">			
    		</div>
    	</div>
    </div>
 </div>
<?php
	include'inc/footer.php';
?>