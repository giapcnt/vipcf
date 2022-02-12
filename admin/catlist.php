<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php'; ?>
<?php
    $cat = new category();
    if(isset($_GET['catdel'])){
        $id=$_GET['catdel'];
    	$delCat = $cat->delete_category($id);
        }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Danh sách danh mục</h2>
                <div class="block">
                <?php
                if(isset($delCat)){
                    echo $delCat;
                }
                ?>        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>STT</th>
							<th>Tên danh mục</th>
							<th>Hành động</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$show_cat = $cat->show_category();			
						if($show_cat)
							{$i = 0;
							while($result = $show_cat->fetch_assoc()){
								$i++;
						?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?> </td>
							<td><?php echo $result['catName'] ?></td>
							<td><a href="catedit.php?catid=<?php echo $result['catID'] ?>">Sửa</a> || <a onclick="return confirm ('Bạn có muốn xóa không?')" href="?catdel=<?php echo $result['catID']?>">Xóa</a></td>
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

