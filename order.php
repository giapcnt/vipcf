<style>
	.order{
		font-size: 30px;
		font-weight: bold;
	}
</style>
<?php include'inc/header.php' ?>
<?php
   	$login_check = Session::get('cus_login');
   	if($login_check==false){
   		header('Location:login.php');
   	}
?>	 
<div class="main">
	<div class="order">Thanh toán</div>
</div>
<?php include'inc/footer.php' ?>
