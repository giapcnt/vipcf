<?php
$filepath= realpath(dirname(__FILE__));
include_once ($filepath.'/../lib/database.php');
include_once($filepath.'/../helpers/format.php');
?>
<?php
/**
 * 
 */
class category
{
	private $db;
	private $fm;
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function insert_category($catName)
	{
		$catName = $this->fm->validation($catName);

		$catName = mysqli_real_escape_string($this->db->link, $catName);

		if(empty($catName)){
			$alert="<span class=error>Tên danh mục không được để trống !</span>";
			return $alert;
		}else{
			$query ="INSERT tbl_category(catName) values ('$catName')";
			$result = $this->db->insert($query);
			if($result){
					$alert="<span class=success>Thêm danh mục thành công</span>";
					return $alert;
			}
			else{
					$alert="<span class=error>Thêm danh mục không thành công</span>";
					return $alert;
			}
		}
	}

	public function show_category(){
		$query ="SELECT *FROM tbl_category order by catID asc";
		$result = $this->db->select($query);
		return $result;
	}

	public function show_cat_details(){
		$query ="SELECT *FROM tbl_category order by catID asc";
		$result = $this->db->select($query);
		return $result;
	}

	public function getcatbyId($id){
		$query ="SELECT *FROM tbl_category where catID = '$id'";
		$result = $this->db->select($query);
		return $result;
	}

	public function update_category($catName,$id){
		$catName = $this->fm->validation($catName);

		$catName = mysqli_real_escape_string($this->db->link, $catName);
		$id = mysqli_real_escape_string($this->db->link, $id);

		if(empty($catName)){
			$alert="<span class=error>Tên danh mục không được để trống !</span>";
			return $alert;
		}else{
			$query ="UPDATE tbl_category SET catName=('$catName') WHERE catID='$id'";
			$result = $this->db->update($query);
			if($result){
					$alert="<span class=success>Cập nhật danh mục thành công</span>";
					return $alert;
			}
			else{
					$alert="<span class=error>Cập nhật danh mục không thành công</span>";
					return $alert;
			}
		}
	}

	public function delete_category($id){
		$query ="DELETE FROM tbl_category where catID = '$id'";
		$result = $this->db->delete($query);
		if($result){
					$alert="<span class=success>Xóa danh mục thành công</span>";
					return $alert;
			}
			else{
					$alert="<span class=error>Xóa danh mục không thành công</span>";
					return $alert;
			}
	}
}
?>