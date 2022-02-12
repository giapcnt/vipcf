<?php
	include'./inc/header.php';
	//include'./inc/slider.php';
?>
<?php
    if(!isset($_GET['catID']) || $_GET['catID']==NULL){
        echo "<script> window.location = '404.php'</script>";
        }  else{
        $id=$_GET['catID'];
        }
?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    			<?php
    			$getCat = $cat->getcatbyId($id);
    			if($getCat){
    				while($result_cart = $getCat->fetch_assoc()){			
    			?>
    		<h3>Danh mục <?php echo $result_cart['catName'] ?></h3>
    		<?php
    		}
		} 
    		?>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php
	      	$getProduct = $product->getProductbyCatId($id);
	      		if($getProduct){
	      			while($result_product = $getProduct->fetch_assoc()){
	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="details.php?proid=<?php echo $result_product['productID']?>"><img src="admin/uploads/<?php echo $result_product['image'] ?>" width="120" height="120"></a>
					 <h2><?php echo $result_product['productName'] ?></h2>
					 <p><span class="price"><?php echo $fm->format_tien($result_product['price']) ?> đ</span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result_product['productID']?>" class="details">Chi tiết</a></span></div>
				</div>
			<?php			
	      			}
	      		}else{
	      			?>
	      			<div class="error">
	      				<h3><?php
	      			echo '------------------------------  Danh mục sản phẩm trống  ------------------------------';
	      			}
					?></h3>
	      			</div>
	      			
	      			
		  </div>
    </div>
 </div>
<?php
	include'inc/footer.php';
?>