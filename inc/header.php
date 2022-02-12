<?php
    include 'lib/session.php';
    Session::init();
?>
<?php
	include 'lib/database.php';
	include 'helpers/format.php';

	spl_autoload_register(function($className){
		include_once "classes/".$className.".php";
	});

	$db= new Database();
	$fm = new Format();
	$ct = new cart();
	$us = new user();
	$cat = new category();
	$product = new product();
	$cus = new customer();
?>
<?php
if(isset($_GET['cus_id'])){
	$deleteAll=$ct->deleteCartAll();
	Session::destroy();
}
?>
<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>
<!DOCTYPE HTML>
<head>
<title>Vip Coffee 290 Lạch Tray</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="css/menu.css" rel="stylesheet" type="text/css" media="all"/>
<script src="js/jquerymain.js"></script>
<script src="js/script.js" type="text/javascript"></script>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="js/nav.js"></script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script> 
<script type="text/javascript" src="js/nav-hover.js"></script>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
<script type="text/javascript">
  $(document).ready(function($){
    $('#dc_mega-menu-orange').dcMegaMenu({rowItems:'4',speed:'fast',effect:'fade'});
  });
</script>
</head>
<body>
  <div class="wrap">
		<div class="header_top">
			<div class="logo">
				<a href="index.php"><img src="images/logovip.png" alt="" /></a>
			</div>
			  <div class="header_top_right">
			    <div class="search_box">
				    <form>
				    	<input type="text" placeholder="Nhập tên sản phẩm cần tìm..."><input type="submit" value="Tìm">
				    </form>
			    </div>
			    <div class="shopping_cart">
					<div class="cart">
						<a href="#" title="View my shopping cart" rel="nofollow">
								<span class="cart_title">
								<?php
								$check_cart=$ct->check_cart();
								if($check_cart){
								$sl=Session::get("sl");
								echo 'Số lượng: '.$sl.' - ';
								$tongcong=Session::get("tongcong");
								echo 'Tổng tiền: '.$fm->format_tien($tongcong)." đ";									
								}else{
									echo'Trống';
								}
								?>
								</span>
								<span class="no_product"></span>
							</a>
						</div>
			      </div>
			      <br><br><br>
			      
		 <div class="clear"></div>
	 </div>
	 <div class="clear"></div>
 </div>
<div class="menu">
	<ul id="dc_mega-menu-orange" class="dc_mm-orange">
	  <li><a href="index.php">TRANG CHỦ</a></li>
	  <!-- <li><a href="products.php">SẢN PHẨM</a> </li> -->
	  <?php
	   	$check_cart = $ct->check_cart();
	   	if($check_cart){
	   		echo'<li><a href="cart.php">GIỎ HÀNG</a></li>';
	   	}else{
	   		echo'';
	   	}
	?>
	  
	  <!-- <li><a href="contact.php">LIÊN HỆ</a> </li> -->
	<?php
	   	$login_check = Session::get('cus_login');
	   	if($login_check==false){
	   		echo'';
	   	}else{
	   		echo'<li><a href="profile.php">Thông tin tài khoản</a></li>';
	   	}
	?>
	<?php
	   	$login_check = Session::get('cus_login');
	   	if($login_check==false){
	   		echo'<li><a href="login.php">Đăng nhập</a></li>';
	   	}else{
	   		echo'<li><a href="?cus_id='.Session::get('cus_id').'">Đăng xuất</a></li>';
	   	}
   	?>	  
	  <div class="clear"></div>
	</ul>
</div>