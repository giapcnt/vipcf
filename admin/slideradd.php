<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php'; ?>
<?php
    $sl = new product();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    $insert_slider = $sl->insert_slider($_POST,$_FILES);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Thêm slider mới</h2>
        <?php
        if(isset($insert_slider)){
            echo $insert_slider;
        }
        ?>
    <div class="block">               
         <form action="slideradd.php" method="POST" enctype="multipart/form-data">
            <table class="form">     
                <tr>
                    <td>
                        <label>Tên</label>
                    </td>
                    <td>
                        <input type="text" name="sldName" placeholder="Tên slider ..." class="medium" />
                    </td>
                </tr>           

                <tr>
                    <td>
                        <label>Trạng thái</label>
                    </td>
                    <td>
                        <select name="sldType">
                            <option value="1">Hiển thị</option>
                            <option value="0">Ẩn</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>
                        <label>Hình ảnh</label>
                    </td>
                    <td>
                        <input type="file" name="image"/>
                    </td>
                </tr>
               
				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" value="Lưu" />
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