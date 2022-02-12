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
class cart
{
	private $db;
	private $fm;
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}
	public function addtoCart($quantity,$id){
		$quantity =$this->fm->validation($quantity);
		$quantity = mysqli_real_escape_string($this->db->link, $quantity);
		$id = mysqli_real_escape_string($this->db->link, $id);
		$sID = session_id();

		$query="SELECT *FROM tbl_product WHERE productID='$id'";
		$result = $this->db->select($query)->fetch_assoc();

		$productName = $result['productName'];
		$price=$result['price'];
		$image=$result['image'];
		// $kiemtra="SELECT *FROM tbl_cart WHERE productID='$id' AND sID='$sID'";
		// if($kiemtra){
		// 	$thongbao="Sản phẩm đã được thêm !";
		// 	return $thongbao;
		// }else{
		$query_cart="INSERT INTO tbl_cart(productID,sID,productName,price,quantity,image) values ('$id', '$sID','$productName','$price','$quantity','$image')";
			$result_cart = $this->db->insert($query_cart);
			if($result_cart){
				header('Location:cart.php');
				echo "<meta http-equiv='refresh' content='0'";
			}else{
				header('Location:404.php');
			}		
		// }
	}
	public function get_product_cart(){
		$sID = session_id();
		$query="SELECT *FROM tbl_cart WHERE sID='$sID'";
		$result= $this->db->select($query);
		return $result;
	}
	public function update_quantity_cart($quantity,$catID){
		$quantity = mysqli_real_escape_string($this->db->link, $quantity);
		$catID = mysqli_real_escape_string($this->db->link, $catID);
		$query="UPDATE tbl_cart
			SET quantity='$quantity'
			WHERE catID='$catID'";
		$result = $this->db->update($query);
		if($result){
			header('Location:cart.php');
			echo "<meta http-equiv='refresh' content='0'";
		}else{
			header('Location:404.php');
		}
	}
	public function delete_quantity_cart($catID){
		$catID = mysqli_real_escape_string($this->db->link, $catID);
		$query="DELETE FROM tbl_cart WHERE catID='$catID'";
		$result=$this->db->delete($query);
		if($result){
			header('Location:cart.php');
			echo "<meta http-equiv='refresh' content='0'";
		}else{	
			header('Location:404.php');
		}
	}
	public function check_cart(){
		$sID = session_id();
		$query="SELECT *FROM tbl_cart WHERE sID='$sID'";
		$result = $this->db->select($query);
		return $result;
	}

	public function deleteCartAll(){
		$sID = session_id();
		$query="DELETE FROM tbl_cart WHERE sID='$sID'";
		$result = $this->db->delete($query);
		return $result;
	}
}
?>