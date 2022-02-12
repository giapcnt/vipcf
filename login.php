<?php
	include'./inc/header.php';
	//include'./inc/slider.php';
?>
<?php
   	$login_check = Session::get('cus_login');
   	if($login_check){
   		header('Location:order.php');
   	}
   	?>	 
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $insert_cus = $cus->insert_customer($_POST);
}
?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $login_cus = $cus->login_customer($_POST);
}
?>
 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Đăng nhập</h3>
        	<?php
        	if(isset($login_cus)){
        		echo $login_cus;
        	}
        	?>
        	<form action="" method="POST">
	        	<input name="cusUser" type="text" value="" placeholder="Tên tài khoản ...">
	            
	            <br><br><input name="cusPass" type="password" value="" placeholder="Mật khẩu ...">
	         <!-- 
	         <p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p> -->
	            <br><br><div class="buttons"><div><button name="login" class="grey">Đăng nhập</button></div></div>
	            </div>
            </form>
    	<div class="register_account">
    		<h3>Đăng kí tài khoản</h3>
    		<?php
			    if (isset($insert_cus)){
			    	echo $insert_cus;
			    }
			?>
    		<form action="" method="POST">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
								<input type="text" name="cusUser" placeholder="Tên tài khoản ...">
							</div>
						    <div>
								<input type="text" name="cusPass" placeholder="Mật khẩu ...">
						    </div>
						    <div>
								<input type="text" name="cusName" placeholder="Tên ...">
						    </div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="cusAdd" placeholder="Địa chỉ ...">
						</div>
						<div>
			            	<input type="text" name="cusPhone" placeholder="Số điện thoại ...">
			            </div>   			  
		    	</td>
		    </tr> 
		    </tbody>
		</table>
		    <input type="submit" name="submit" value="Tạo tài khoản"> 
		    <!-- <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p> -->
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php
	include'inc/footer.php';
?>