<?php
$filepath= realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once($filepath.'/../helpers/format.php');
include_once ($filepath.'/../classes/category.php');
?>
<?php
/**
 * 
 */
class product
{
	private $db;
	private $fm;
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function insert_product($data,$files){
		$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
		$category = mysqli_real_escape_string($this->db->link, $data['category']);
		$productdesc = mysqli_real_escape_string($this->db->link, $data['productdesc']);
		$price = mysqli_real_escape_string($this->db->link, $data['price']);
		$type = mysqli_real_escape_string($this->db->link, $data['type']);

		$permited = array('jpg','jpeg','png','gif');
		$file_name=$_FILES['image']['name'];
		$file_size=$_FILES['image']['size'];
		$file_temp=$_FILES['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext=strtolower(end($div));
		$unique_image=substr(md5(time()),0,10).'.'.$file_ext;
		$uploaded_image="uploads/".$unique_image;

		if($productName==""||$category==""||$productdesc==""||$price==""||$type==""||$file_name==""){
			$alert="<span class=error>Không được để trống !</span>";
			return $alert;
		}else{

			if(!empty($file_name)){
			if($file_size>1056882){
				$alert="<span class=success>Kích thước ảnh nên nhỏ hơn 4MB</span>";
				return $alert;
			}elseif (in_array($file_ext,$permited)===false) {
				$alert="<span class=error>Bạn chỉ có thể tải ảnh ở dạng: -".implode(', ', $permited)."</span>";
				return $alert;
			}

			move_uploaded_file($file_temp, $uploaded_image);
			$query ="INSERT tbl_product(productName,catID,productdesc,type,price,image) values ('$productName', '$category','$productdesc','$type','$price','$unique_image')";
			$result = $this->db->insert($query);
			if($result){
					$alert="<span class=success>Thêm sản phẩm thành công</span>";
					return $alert;
			}
			else{
					$alert="<span class=error>Thêm sản phẩm không thành công</span>";
					return $alert;
			}
	}
}
}

	public function show_product(){
		$query ="
		SELECT tbl_product.*, tbl_category.catName 
		FROM tbl_product INNER JOIN tbl_category ON tbl_product.catID = tbl_category.catID
		order by tbl_product.productID asc";
		$result = $this->db->select($query);
		return $result;
	}


	public function getProductDetail($id){
		$query ="SELECT tbl_product.*, tbl_category.catName 
		FROM tbl_product INNER JOIN tbl_category ON tbl_product.catID = tbl_category.catID where productID = '$id'";
		$result = $this->db->select($query);
		return $result;
	}


	public function getProductbyId($id){
		$query ="SELECT *FROM tbl_product where productID = '$id'";
		$result = $this->db->select($query);
		return $result;
	}
	public function getProductbyCatId($id){
		$query ="SELECT *FROM tbl_product where catID = '$id' order by catID desc";
		$result = $this->db->select($query);
		return $result;
	}

	public function getProductTea(){
		$query ="SELECT *FROM tbl_product where catID = '4'";
		$result = $this->db->select($query);
		return $result;
	}
	public function getProductCf(){
		$query ="SELECT *FROM tbl_product where catID = '1'";
		$result = $this->db->select($query);
		return $result;
	}
	public function getProductEp(){
		$query ="SELECT *FROM tbl_product where catID = '3'";
		$result = $this->db->select($query);
		return $result;
	}
	public function getProductSt(){
		$query ="SELECT *FROM tbl_product where catID = '2'";
		$result = $this->db->select($query);
		return $result;
	}



	public function getCfNew(){
		$query ="SELECT *FROM tbl_product where catID = '1' order by productID desc LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}
	public function getTeaNew(){
		$query ="SELECT *FROM tbl_product where catID = '4' order by productID desc LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}
	public function getEpNew(){
		$query ="SELECT *FROM tbl_product where catID = '3' order by productID desc LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}
	public function getStNew(){
		$query ="SELECT *FROM tbl_product where catID = '2' order by productID desc LIMIT 1";
		$result = $this->db->select($query);
		return $result;
	}

	

	public function getProductNew(){
		$query ="SELECT *FROM tbl_product order by productID desc LIMIT 4";
		$result = $this->db->select($query);
		return $result;
	}

	public function update_product($data,$files,$id){
		$productName = mysqli_real_escape_string($this->db->link, $data['productName']);
		$category = mysqli_real_escape_string($this->db->link, $data['category']);
		$productdesc = mysqli_real_escape_string($this->db->link, $data['productdesc']);
		$price = mysqli_real_escape_string($this->db->link, $data['price']);
		$type = mysqli_real_escape_string($this->db->link, $data['type']);

		$permited = array('jpg','jpeg','png','gif');
		$file_name=$_FILES['image']['name'];
		$file_size=$_FILES['image']['size'];
		$file_temp=$_FILES['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext=strtolower(end($div));
		$unique_image=substr(md5(time()),0,10).'.'.$file_ext;
		$uploaded_image="uploads/".$unique_image;

		if($productName==""||$category==""||$productdesc==""||$price==""||$type==""){
			$alert="<span class=error>Vui lòng điền đầy đủ thông tin !!!</span>";
			return $alert;
		}else{
			if(!empty($file_name)){
			if($file_size>1056882){
				$alert="<span class=success>Kích thước ảnh nên nhỏ hơn 4MB</span>";
				return $alert;
			}
			elseif (in_array($file_ext,$permited)===false) {
				$alert="<span class=error>Bạn chỉ có thể tải ảnh ở dạng: -".implode(', ', $permited)."</span>";
				return $alert;
			}
			$query ="UPDATE tbl_product
			SET productName='$productName',
			catID='$category',
			productdesc='$productdesc',
			type='$type',
			price='$price',
			image='$unique_image'
			WHERE productID='$id'";				
			}else{
			$query ="UPDATE tbl_product
			SET productName='$productName',
			catID='$category',
			productdesc='$productdesc',
			type='$type',
			price='$price'
			WHERE productID='$id'";
			}

			move_uploaded_file($file_temp, $uploaded_image);
			$result = $this->db->update($query);
			if($result){
					$alert="<span class=success>Cập nhật sản phẩm thành công</span>";
					return $alert;
			}
			else{
					$alert="<span class=error>Cập nhật sản phẩm không thành công</span>";
					return $alert;
			}

	}
}

	public function delete_product($id){
		$query ="DELETE FROM tbl_product where productID = '$id'";
		$result = $this->db->delete($query);
		if($result){
					$alert="<span class=success>Xóa sản phẩm thành công</span>";
					return $alert;
			}
			else{
					$alert="<span class=error>Xóa sản phẩm không thành công</span>";
					return $alert;
			}
	}

	public function insert_slider($data,$files){

		$sldName = mysqli_real_escape_string($this->db->link, $data['sldName']);
		$sldType = mysqli_real_escape_string($this->db->link, $data['sldType']);

		$permited = array('jpg','jpeg','png','gif');
		$file_name=$_FILES['image']['name'];
		$file_size=$_FILES['image']['size'];
		$file_temp=$_FILES['image']['tmp_name'];

		$div = explode('.', $file_name);
		$file_ext=strtolower(end($div));
		$unique_image=substr(md5(time()),0,10).'.'.$file_ext;
		$uploaded_image="uploads/".$unique_image;

		if($sldName==""||$sldType==""||$file_name==""){
			$alert="<span class=error>Không được để trống !</span>";
			return $alert;
		}else{
			if(!empty($file_name)){
			if($file_size>1056882){
				$alert="<span class=success>Kích thước ảnh nên nhỏ hơn 4MB</span>";
				return $alert;
			}
			elseif (in_array($file_ext,$permited)===false) {
				$alert="<span class=error>Bạn chỉ có thể tải ảnh ở dạng: -".implode(', ', $permited)."</span>";
				return $alert;
			}
			move_uploaded_file($file_temp, $uploaded_image);
			$query_sld ="INSERT tbl_slider(sldName,sldType,sldImage) values ('$sldName', '$sldType','$unique_image')";
			$result_sld = $this->db->insert($query_sld);
			if($result_sld){
					$alert="<span class=success>Thêm slider thành công</span>";
					return $alert;
			}
			else{
					$alert="<span class=error>Thêm slider không thành công</span>";
					return $alert;
			}
			}	
		}
	}

	public function show_slider(){
		$query ="SELECT *FROM tbl_slider WHERE sldType='1' order by sldID desc";
		$result = $this->db->select($query);
		return $result;
	}

}
?>