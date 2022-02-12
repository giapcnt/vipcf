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
class customer
{
	private $db;
	private $fm;
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function insert_customer($data){
		$cusUser = mysqli_real_escape_string($this->db->link, $data['cusUser']);
		$cusPass = mysqli_real_escape_string($this->db->link, md5($data['cusPass']));
		$cusName = mysqli_real_escape_string($this->db->link, $data['cusName']);
		$cusPhone = mysqli_real_escape_string($this->db->link, $data['cusPhone']);
		$cusAdd = mysqli_real_escape_string($this->db->link, $data['cusAdd']);


		if($cusUser==""||$cusPass==""||$cusName==""||$cusPhone==""||$cusAdd==""){
			$alert="<span class=error>Không được để trống !</span>";
			return $alert;
		}else{
			$checkUser = "SELECT *FROM tbl_customer WHERE cusUser='$cusUser' LIMIT 1";
			$result_check= $this->db->select($checkUser);
			if($result_check){
				$alert="<span class=error>Tài khoản đã tồn tại ! Vui lòng chọn tên tài khoản khác.</span>";
				return $alert;
			}else{
				$query ="INSERT tbl_customer(cusUser,cusPass,cusName,cusPhone,cusAdd) values ('$cusUser', '$cusPass','$cusName','$cusPhone','$cusAdd')";
			$result = $this->db->insert($query);
			if($result){
					$alert="<span class=success>Thêm tài khoản thành công</span>";
					return $alert;
			}
			else{
					$alert="<span class=error>Thêm tài khoản không thành công</span>";
					return $alert;
			}
			}		
		}		
	}


	public function login_customer($data){
		$cusUser = mysqli_real_escape_string($this->db->link, $data['cusUser']);
		$cusPass = mysqli_real_escape_string($this->db->link, md5($data['cusPass']));

		if($cusUser==""||$cusPass==""){
			$alert="<span class=error>Không được để trống !</span>";
			return $alert;
		}else{
			$checkLogin = "SELECT *FROM tbl_customer WHERE cusUser='$cusUser' AND cusPass='$cusPass'";
			$result_login= $this->db->select($checkLogin);
			if($result_login !=false){
				$value= $result_login->fetch_assoc();
				Session::set('cus_login',true);
				Session::set('cus_id',$value['cusID']);
				Session::set('cus_name',$value['cusName']);
				header('Location:order.php');
			}else{
				$alert="<span class=error>Tài khoản hoặc mật khẩu không chính xác ...</span>";
				return $alert;
			}
		}

	}

	public function getProfile($cusID){
		$query = "SELECT *FROM tbl_customer WHERE cusID='$cusID'";
		$result = $this->db->select($query);
		return $result;
	}
}
?>