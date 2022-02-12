</div>
   <div class="footer">
   	  <div class="wrapper">	
	     <div class="section group">
				<div class="col_1_of_4 span_1_of_4">
						<h4>Tên cửa hàng</h4>
						<h5>Vip Coffee</h5><br>
				</div>
				<div class="col_1_of_4 span_1_of_4">
						<h4>Địa chỉ</h4>
						<h5>290 Lạch Tray</h5><br>
						<h5>Hải Phòng</h5>
				</div>
				<!-- <div class="col_1_of_4 span_1_of_4">
					<h4>Lý do chọn cửa hàng</h4>
						<ul>
						<li><a href="about.php">About Us</a></li>
						<li><a href="faq.php">Customer Service</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="contact.php"><span>Site Map</span></a></li>
						<li><a href="details.php"><span>Search Terms</span></a></li>
						</ul>
				</div>
				<div class="col_1_of_4 span_1_of_4">
					<h4>Tài khoản</h4>
						<ul>
							<li><a href="contact.php">Sign In</a></li>
							<li><a href="index.php">View Cart</a></li>
							<li><a href="#">My Wishlist</a></li>
							<li><a href="#">Track My Order</a></li>
							<li><a href="faq.php">Help</a></li>
						</ul>
				</div> --> 
				<div class="col_1_of_4 span_1_of_4">
						<h4>Mạng xã hội</h4>
						<div class="social-icons">
					   		<ul>
								<li class="facebook"><a href="https://www.facebook.com/vipcoffee.lachtray" target="_blank"> </a></li>
								<div class="clear"></div>
						    </ul>
   	 					</div>
				</div>
				
				<div class="col_1_of_4 span_1_of_4">
					<h4>Liên hệ</h4>
						<ul>
							<li><span>Chủ: 0906051566</span></li>
							<li><span>Quảng cáo: 0962706298</span></li>
						</ul>
				</div>
			</div>
			<div class="copy_right"><!-- 
				<p>Training with live project &amp; All rights Reseverd </p> -->
		   </div>
     </div>
    </div>
    <script type="text/javascript">
		$(document).ready(function() {
			/*
			var defaults = {
	  			containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
	 		};
			*/
			
			$().UItoTop({ easingType: 'easeOutQuart' });
			
		});
	</script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
    <link href="css/flexslider.css" rel='stylesheet' type='text/css' />
	  <script defer src="js/jquery.flexslider.js"></script>
	  <script type="text/javascript">
		$(function(){
		  SyntaxHighlighter.all();
		});
		$(window).load(function(){
		  $('.flexslider').flexslider({
			animation: "slide",
			start: function(slider){
			  $('body').removeClass('loading');
			}
		  });
		});
	  </script>
</body>
</html>