	<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<?php
				$getCf=$product->getCfNew();
				if($getCf){
					while($resultCf=$getCf->fetch_assoc()){
					?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proid=<?php echo $resultCf['productID']?>"> <img src="admin/uploads/<?php echo $resultCf['image']?>" width="66" height="66"></a>
					</div>
				    <div class="text list_2_of_1">
						<h2><?php echo $resultCf['productName']?></h2>
						<p><?php echo $fm->format_tien($resultCf['price']) ?> đ</p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultCf['productID']?>">Chi tiết</a></span></div>
				   </div>
			   </div>	
			   <?php	
				}
			}
				?>

				<?php
				$getTea=$product->getTeaNew();
				if($getTea){
					while($resultTea=$getTea->fetch_assoc()){
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="details.php?proid=<?php echo $resultTea['productID']?>"><img src="admin/uploads/<?php echo $resultTea['image']?>" width="66" height="66"></a>
					</div>
					<div class="text list_2_of_1">
						  <h2><?php echo $resultTea['productName']?></h2>
						  <p><?php echo $fm->format_tien($resultTea['price']) ?> đ</p>
						  <div class="button"><span><a href="details.php?proid=<?php echo $resultTea['productID']?>">Chi tiết</a></span></div>
					</div>
				</div>
			</div>
			<?php
		}
	}
			?>


			<?php
				$getSt=$product->getStNew();
				if($getSt){
					while($resultSt=$getSt->fetch_assoc()){
			?>
			<div class="section group">
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="details.php?proid=<?php echo $resultSt['productID']?>"> <img src="admin/uploads/<?php echo $resultSt['image']?>" width="66" height="66"></a>
					</div>
				    <div class="text list_2_of_1">
						<h2><?php echo $resultSt['productName']?></h2>
						<p><?php echo $fm->format_tien($resultSt['price']) ?> đ</p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultSt['productID']?>">Chi tiết</a></span></div>
				   </div>
			   </div>			   
			<?php
		}
	}
			?>

			<?php
				$getEp=$product->getEpNew();
				if($getEp){
					while($resultEp=$getEp->fetch_assoc()){
			?>		
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="details.php?proid=<?php echo $resultEp['productID']?>"><img src="admin/uploads/<?php echo $resultEp['image']?>" width="66" height="66"></a>
					</div>
					<div class="text list_2_of_1">
						  <h2><?php echo $resultEp['productName']?></h2>
						  <p><?php echo $fm->format_tien($resultEp['price']) ?> đ</p>
						  <div class="button"><span><a href="details.php?proid=<?php echo $resultEp['productID']?>">Chi tiết</a></span></div>
					</div>
				</div>

			<?php
		}
	}
			?>

			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
					<?php
					$getImage=$product->show_slider();
					if($getImage){
						while($result_sld = $getImage->fetch_assoc()){
					?>
						<li><img src="admin/uploads/<?php echo $result_sld['sldImage'] ?>" ></li>
				    <?php			
						}
					}
				    ?>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>