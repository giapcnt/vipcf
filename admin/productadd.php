<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>
<?php
    $pd = new product();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $insertProduct = $pd->insert_product($_POST,$_FILES);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm sản phẩm mới</h2>
         <?php
                if(isset($insertProduct)){
                    echo $insertProduct;
                }
                ?>
        <div class="block">               
         <form action="productadd.php" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Tên</label>
                    </td>
                    <td>
                        <input type="text" name="productName" placeholder="Điền tên ..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Danh mục</label>
                    </td>
                    <td>
                        <select id="select" name="category">
                            <option>Chọn danh mục...</option>
                            <?php
                            $cat = new category();
                            $catlist = $cat->show_category();
                            if($catlist){
                                while($result=$catlist->fetch_assoc()){                                   
                            ?>
                            <option value="<?php echo $result['catID']?>"><?php echo $result['catName']?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
				<tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Đặc điểm</label>
                    </td>
                    <td>
                        <textarea name="productdesc" class="tinymce"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Giá</label>
                    </td>
                    <td>
                        <input type="text" name="price" placeholder="Giá..." class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Ảnh</label>
                    </td>
                    <td>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Tình trạng</label>
                    </td>
                    <td>
                        <select id="select" name="type">
                            <option>Chọn tình trạng</option>
                            <option value="1">Hoạt động</option>
                            <option value="0">Ngừng hoạt động</option>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Lưu" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


