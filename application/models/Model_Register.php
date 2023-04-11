<?php 
class Model_Register extends CI_Model 
{
	
	public function __construct()
	{
         parent::__construct();
	}
 
	function register($data)
	{
		$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

		$this->db->insert('tb_akun',$data);
	}
}
?>