<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include_once '../classes/product.php';?>
<!-- <?php include_once '../helpers/format.php';?> -->

<?php
$pd = new product();
// $fm= new Format();
 if(isset($_GET['delpd'])){
        $id=$_GET['delpd'];
    	$delprd = $pd->delete_product($id);
        }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Danh sách sản phẩm</h2>
        <div class="block">
        <?php
        if(isset($delprd)){
            echo $delprd;
        }
        ?>   
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th>STT</th>
					<th>Tên sản phẩm</th>
					<th>Danh mục</th>
					<!-- <th>Đặc điểm</th> -->
					<th>Giá</th>
					<th>Hình ảnh</th>
					<th>Tình trạng</th>
					<th>Hành động</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$pd = new product();
				$show_pd = $pd->show_product();
				if($show_pd){
					$i=0;
					while($result=$show_pd->fetch_assoc()){
						$i++;
				?>
				<tr class="odd gradeX" >
					<td><?php echo $i; ?></td>
					<td><?php echo $result['productName'] ?></td>
					<td><?php echo $result['catName'] ?></td>
					<!-- <td><?php echo $result['productdesc'] ?></td> -->
					<td><?php echo $result['price'] ?></td>
					<td><img src="uploads/<?php echo $result['image'] ?>" width="66" height="66"></td>
					<td>
					<?php
					if($result['type']==1){
						echo'Hoạt động';
					}else{
						echo'Không hoạt động';
					}
					 ?>
					 </td>
					<td><a href="productedit.php?productid=<?php echo $result['productID']?>">Cập nhật</a> || <a onclick="return confirm ('Bạn có muốn xóa không?')" href="?delpd=<?php echo $result['productID']?>">Xóa</a></td>
				</tr>
				<?php
					}
				}
				?>
			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
