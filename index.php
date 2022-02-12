<?php
	include'inc/header.php';
	include'inc/slider.php';
?>
<div class="main">
    <div class="content">
    	<div class="content_top">

    		<div class="heading">
    		<h3>Sản phẩm mới</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
    	<div class="section group">
	      	<?php
	      	$productnew = $product->getProductNew();
	      	if($productnew){
	      		while($result = $productnew->fetch_assoc()){
	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $result['productID']?>" class="details"><img src="admin/uploads/<?php echo $result['image'] ?>" width="200" height="200"></a>
					 <h2><?php echo $result['productName'] ?> </h2>
					 <p><span class="price">Giá: <?php echo $fm->format_tien($result['price']) ?> đ</span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productID']?>" class="details">Chi tiết</a></span></div>
				</div>
				<?php
				}
	      	}
				?>		
			</div>
			<div class="content_bottom">


    		<div class="heading">
    		<h3>Cafe</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
    	<div class="section group">
	      	<?php
	      	$productcf = $product->getProductCf();
	      	if($productcf){
	      		while($result = $productcf->fetch_assoc()){
	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $result['productID']?>" class="details"><img src="admin/uploads/<?php echo $result['image'] ?>" width="200" height="200"></a>
					 <h2><?php echo $result['productName'] ?> </h2>
					 <p><span class="price">Giá: <?php echo $fm->format_tien($result['price']) ?> đ</span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productID']?>" class="details">Chi tiết</a></span></div>
				</div>
				<?php
				}
	      	}
				?>		
			</div>
			<div class="content_bottom">


			<div class="heading">
    		<h3>Trà</h3>
    		</div>
    		<div class="clear"></div>
	      <div class="section group">
	      	<?php
	      	$producttea = $product->getProductTea();
	      	if($producttea){
	      		while($result = $producttea->fetch_assoc()){
	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $result['productID']?>" class="details"><img src="admin/uploads/<?php echo $result['image'] ?>" width="200" height="200"></a>
					 <h2><?php echo $result['productName'] ?> </h2>
					 <p><span class="price">Giá: <?php echo $fm->format_tien($result['price']) ?> đ</span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productID']?>" class="details">Chi tiết</a></span></div>
				</div>
				<?php
				}
	      	}
				?>		
			</div>			
			<div class="content_bottom">


			<div class="heading">
    		<h3>Nước ép</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
    	<div class="section group">
	      	<?php
	      	$productep = $product->getProductEp();
	      	if($productep){
	      		while($result = $productep->fetch_assoc()){
	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $result['productID']?>" class="details"><img src="admin/uploads/<?php echo $result['image'] ?>" width="200" height="200"></a>
					 <h2><?php echo $result['productName'] ?> </h2>
					 <p><span class="price">Giá: <?php echo $fm->format_tien($result['price']) ?> đ</span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productID']?>" class="details">Chi tiết</a></span></div>
				</div>
				<?php
				}
	      	}
				?>		
			</div>
			<div class="content_bottom">


				<div class="heading">
    		<h3>Sinh tố</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
    	<div class="section group">
	      	<?php
	      	$productst = $product->getProductSt();
	      	if($productst){
	      		while($result = $productst->fetch_assoc()){
	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $result['productID']?>" class="details"><img src="admin/uploads/<?php echo $result['image'] ?>" width="200" height="200"></a>
					 <h2><?php echo $result['productName'] ?> </h2>
					 <p><span class="price">Giá: <?php echo $fm->format_tien($result['price']) ?> đ</span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productID']?>" class="details">Chi tiết</a></span></div>
				</div>
				<?php
				}
	      	}
				?>		
			</div>
			<div class="content_bottom">

    </div>
 </div>
<?php
	include'inc/footer.php';
?>