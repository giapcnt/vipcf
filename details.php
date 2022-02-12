<?php
	include'./inc/header.php';
	// include'./inc/slider.php';
?>
<?php
    $cat = new category();
     if(!isset($_GET['proid']) || $_GET['proid']==NULL){
        echo "<script> window.location = '404.php'</script>";
        }  else{
        $id=$_GET['proid'];
        }
?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $quantity = $_POST['quantity'];
    $addtocart = $ct->addtoCart($quantity,$id);
}
?>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<?php
    		$productdetail = $product->getProductDetail($id);
	      	if($productdetail){
	      		$result_detail = $productdetail->fetch_assoc();
    		?>
				<div class="cont-desc span_1_of_2">				
					<div class="grid images_3_of_2">
						<img src="admin/uploads/<?php echo $result_detail['image'] ?>" width="200" height="200">
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $result_detail['productName'] ?></h2>
					<p><?php echo $result_detail['productdesc'] ?></p>					
					<div class="price">
						<p>Giá: <span><?php echo $fm->format_tien($result_detail['price']) ?> đ</span></p>
						<p>Danh mục: <span><?php echo $result_detail['catName'] ?></span></p>
					</div>
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="quantity" min="1" value="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Mua"/>
					</form><br>
					<?php
					if(isset($addtocart)){
						echo '<span style="color:red;">Sản phẩm đã được thêm !</span>';
					}
					?>				
				</div>
			</div>
			<div class="product-desc">
			<h2>Mô tả chi tiết</h2>
			<p><?php echo $result_detail['productdesc'] ?></p>
	    </div>
	    <?php
	}
	    ?>
				
	</div>
		<div class="rightsidebar span_3_of_1">
		<h2>Danh sách danh mục</h2>
		<?php
			$categorylist = $cat->show_cat_details();
			if($categorylist){
			while($result_cat = $categorylist->fetch_assoc()){
		?>
		<ul>
	      <li><a href="productbycat.php?catID=<?php echo $result_cat['catID'] ?>"><?php echo $result_cat['catName'] ?></a></li>
		</ul>
		<?php
		}
	}
		?>
		</div>
 	</div>

 	</div>
<?php
 	include'./inc/footer.php';
 ?>
